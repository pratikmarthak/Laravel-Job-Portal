<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class CandidateAccountInfoUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'country' => ['required','integer'],
            'state' => ['nullable','integer'],
            'city' => ['nullable','integer'],
            'address' => ['nullable','string'],
            'phone' => ['nullable','string'],
            'secondary_phone' => ['nullable','string'],
            'email' => ['nullable','string'],
        ];
    }
}
