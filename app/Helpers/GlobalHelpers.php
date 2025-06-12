<?php

use App\Models\Candidate;
use App\Models\Company;

if(!function_exists('hasError')){
    function hasError($errors,string $name):?String{
        return $errors->has($name) ? 'is-invalid' : '';
    }
}


// Dynamic Sidebar Activated
if(!function_exists('setSidebarActive')){
    function setSidebarActive(array $routes): ?String
    {
        foreach($routes as $route){
            if(request()->routeIs($route)){
                return 'active';
            }
        }
        return null;
    }
}

// Check Profile Compelet or not
if(!function_exists('isCompanyProfileComplete')){
    function isCompanyProfileComplete():bool
    {
        $requiredFields = ['logo','banner','name','bio','vision','industry_type_id','organization_type_id','team_size_id','establishement_date','phone','email','country'];
        $companyProfile = Company::where('user_id', auth('web')->user()->id)->first();
        foreach($requiredFields as $field){
            if(empty($companyProfile->{$field})){
                return false;
            }
        }
        return true;
    }
}

// Check Candidae Profile Compelet or not
if(!function_exists('isCandidateProfileComplete')){
    function isCandidateProfileComplete():bool
    {
        $requiredFields = ['experience_id','profession_id','image','full_name','gender','bio','marital_status','birth_date','country','status'];
        $candidateProfile = Candidate::where('user_id', auth('web')->user()->id)->first();
        foreach($requiredFields as $field){
            if(empty($candidateProfile->{$field})){
                return false;
            }
        }
        return true;
    }
}

// Format Date
if(!function_exists('formatDate')){
    function formatDate(string $date):?string
    {
        return date('d M Y',strtotime($date));
    }
}
