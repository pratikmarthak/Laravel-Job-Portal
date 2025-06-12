<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontendCompanyPageController extends Controller
{
    public function index():View{
        $companies = Company::where(['profile_completion' => 1,'visibility' => 1 ])->get();
        return view('frontend.page.company-index',compact('companies'));
    }

    public function show(string $slug):View{
        $company = Company::where(['profile_completion' => 1,'visibility' => 1,'slug'=> $slug])->first();
        return view('frontend.page.company-details',compact('company'));
    }
}
