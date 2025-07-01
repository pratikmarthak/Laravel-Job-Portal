<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Razorpay Payment</title>
    <style>
        .razorpay-payment-button{
            display: none;
        }
    </style>
</head>
<body>
    @php
        $payableamount = (session('selected_plan')['price'] * config('gatewaySettings.razorpay_country_rate')) * 100;
    @endphp
    <form action="{{ route('company.razorpay.payment') }}" method="POST">
        @csrf
        <script src="https://checkout.razorpay.com/v1/checkout.js"
            data-key="{{ config('gatewaySettings.razorpay_key') }}"
            data-currency="{{ config('gatewaySettings.razorpay_country_currency') }}"
            data-amount="{{ $payableamount }}"
            data-buttontext="Pay"
            data-name="{{ session('selected_plan')['label'] . 'Plan' }}"
            data-desciption="payment for the product"
            data-theme.color="#1ca774"
        >

        </script>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded",function(){
            var button = document.querySelector(".razorpay-payment-button");
            button.click();
        })
    </script>
</body>
</html>
