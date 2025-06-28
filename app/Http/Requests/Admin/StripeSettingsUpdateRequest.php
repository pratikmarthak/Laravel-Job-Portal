<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StripeSettingsUpdateRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'paypal_status' => ['required','in:active,inactive'],
            'stripe_country_name' => ['required'],
            'stripe_country_currency' => ['required'],
            'stripe_country_rate' => ['required','numeric'],
            'stripe_publishable_key' => ['required'],
            'stipe_secret_id' => ['required']
        ];
    }
}
