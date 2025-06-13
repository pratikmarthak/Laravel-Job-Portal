<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontendCandidatePageController extends Controller
{
    function index():View{
        $candidates = Candidate::where(['profile_complete' => 1, 'visibilty' => 1])->get();
        return view("frontend.page.candidate-index",compact('candidates'));
    }

    function show(string $slug):View{
        $candidates = Candidate::where(['profile_complete' => 1, 'visibilty' => 1,'slug'=> $slug])->firstOrFail();
        return view("frontend.page.candidate-details",compact("candidates"));
    }
}
