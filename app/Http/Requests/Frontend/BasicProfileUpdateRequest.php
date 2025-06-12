<?php

namespace App\Http\Requests\Frontend;

use App\Models\Candidate;
use Illuminate\Foundation\Http\FormRequest;

class BasicProfileUpdateRequest extends FormRequest
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
        $roles = [
            'profile_picture' => ['image','max:2048'],
            'cv' => ['nullable', 'mimes:pdf,csv,epub,doc,docx', 'max:10000'],
            'full_name' => ['required','max:50'],
            'title' => ['nullable','string','max:255'],
            'experince_level' => ['nullable','integer'],
            'website' => ['nullable','url'],
            'date_of_birth' => ['required','date'],
        ];

        $candidate = Candidate::where('user_id',auth('web')->user()->id)->first();

        if(empty($candidate) || !$candidate?->profile_picture){
            $rules['profile_picture'][] = ['required'];
        }

        return $roles;
    }
}
