<?php

namespace App\Http\Controllers;

use App\Services\OrderServie;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;

class PaymentController extends Controller
{

    function paymentSuccess(): View
    {
        return view('frontend.page.payment-success');
    }

    function paymentError(): View
    {
        return view('frontend.page.payment-error');
    }

    function setPaypalConfig(): array
    {
        return [
            'mode'    => config('gatewaySettings.paypal_account_mode'), // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
            'sandbox' => [
                'client_id'         => config('gatewaySettings.paypal_client_id'),
                'client_secret'     => config('gatewaySettings.paypal_client_secret'),
                'app_id'            => 'APP-80W284485P519543T',
            ],
            'live' => [
                'client_id'         => config('gatewaySettings.paypal_client_id'),
                'client_secret'     => config('gatewaySettings.paypal_client_secret'),
                'app_id'            => config('gatewaySettings.paypal_app_id'),
            ],

            'payment_action' => 'Sale', // Can only be 'Sale', 'Authorization' or 'Order'
            'currency'       => config('gatewaySettings.paypal_country_currency'),
            'notify_url'     => '', // Change this accordingly for your application.
            'locale'         => 'en_US', // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
            'validate_ssl'   => env('PAYPAL_VALIDATE_SSL', true), // Validate SSL when creating api client.
        ];
    }
    function paywithPaypal()
    {

        //dd(config('gatewaySettings.paypal_country_currency'));
        $config = $this->setPaypalConfig();

        $provider = new PayPalClient($config);
        $provider->getAccessToken();

        // Calculate Payable Amount
        $payableAmount = round(Session::get('selected_plan')['price'] * config('gatewaySettings.paypal_country_rate'));
        //dd($payableAmount);

        $response = $provider->createOrder([
            'intent' => 'CAPTURE',
            'application_context' => [
                'return_url' => route('company.paypal.success'),
                'cancel_url' => route('company.paypal.cancel')
            ],
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => config('gatewaySettings.paypal_country_currency'),
                        'value' => $payableAmount
                    ]
                ]
            ]
        ]);
        //dd($response);
        //dd(config('gatewaySettings.paypal_country_currency'));

        if (isset($response['id']) && $response['id'] !== NULL) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        }
    }

    function paypalSuccess(Request $request)
    {
        $config = $this->setPaypalConfig();
        $provider = new PayPalClient($config);
        $provider->getAccessToken();
        //dd($request->all());
        $response = $provider->capturePaymentOrder($request->token);
        // dd($response);

        if (isset($response['status']) && $response['status'] === 'COMPLETED') {
            $capture = $response['purchase_units'][0]['payments']['captures'][0];
            try {
                OrderServie::storeOrder($capture['id'], 'payPal', $capture['amount']['value'], $capture['amount']['currency_code'], 'paid');
                OrderServie::setUserPlan();

                Session::forget('selected_plan');
                return redirect()->route('company.payment.success');
            } catch (\Exception $e) {
                logger('Payment errors >>' . $e);
            }
        }

        return redirect()->route('company.payment.error')->withErrors(['error' => $response['error']['message']]);
    }

    function paypalCancel()
    {
        return redirect()->route('company.payment.error')->withErrors(['error' => 'something went wrong please try again']);
    }

    // Stripe Payment

    function paywithStripe()
    {
        Stripe::setApiKey(config('gatewaySettings.stipe_secret_id'));

        // Calculate Payable Amount
        $payableAmount = round(Session::get('selected_plan')['price'] * config('gatewaySettings.stripe_country_rate')) * 100;
        //dd($payableAmount);

        $response = StripeSession::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => config('gatewaySettings.stripe_country_currency'),
                        'product_data' => [
                            'name' => Session::get('selected_plan')['label'] . 'Package',
                        ],
                        'unit_amount' => $payableAmount
                    ],
                    'quantity' => 1
                ]
            ],
            'mode' => 'payment',
            'success_url' => route('company.stripe.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('company.stripe.cancel')
        ]);

        //dd($response);

        return redirect()->away($response->url);
    }

    function stripeSuccess(Request $request) {
        Stripe::setApiKey(config('gatewaySettings.stipe_secret_id'));
        $sessionId = $request->session_id;

        $response = StripeSession::retrieve($sessionId);
        //dd($response);

        if($response->payment_status == 'paid'){
            try {
                OrderServie::storeOrder($response->payment_intent, 'stripe' , ($response->amount_total / 100), $response->currency, 'paid');
                OrderServie::setUserPlan();

                Session::forget('selected_plan');
                return redirect()->route('company.payment.success');
            } catch (\Exception $e) {
                logger('Payment errors >>' . $e);
            }
        }
        else{
            redirect()->route('company.payment.error')->withErrors(['error' => 'Payment failed']);
        }
    }

    function stipeCancel(){
        redirect()->route('company.payment.error')->withErrors(['error' => 'Payment failed']);
    }
}
