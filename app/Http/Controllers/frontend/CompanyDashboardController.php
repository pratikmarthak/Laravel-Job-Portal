<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompanyDashboardController extends Controller
{
    function index(Request $request):View{
        return view('frontend.company-dashboard.dashboard');
    }
}
