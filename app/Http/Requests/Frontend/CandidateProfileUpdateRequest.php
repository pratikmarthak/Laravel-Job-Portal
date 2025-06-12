<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class CandidateProfileUpdateRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'gender' => ['required','in:male,female'],
            'marital_status' => ['required','in:unmarried,married'],
            'profession' => ['required'],
            'availability' => ['required','in:available,not_available'],
            'skills_you_have' => ['required'],
            'language_you_know' => ['required'],
            'biography' => ['required'],
        ];
    }
}
