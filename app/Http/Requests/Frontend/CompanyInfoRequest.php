<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Company;

class CompanyInfoRequest extends FormRequest
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
        $rules = [
            'logo' => ['image','max:2048'],
            'banner'=> ['image','max:2048'],
            'name'=> ['required','string','max:255'],
            'bio'=> ['required'],
            'vision'=> ['required']
        ];

        $company = Company::where('user_id',auth('web')->user()->id)->first();

        if(empty($company) || !$company?->logo){
            $rules['logo'][] = ['required'];
        }

        if(empty($company) || !$company?->banner){
            $rules['banner'][] = ['required'];
        }
        return $rules;
    }
}
