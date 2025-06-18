<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CheckoutPageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $id): View
    {
        //dd($request->all());
        $plan = Plan::findOrFail($id);
        return view("frontend.page.checkout-index",compact('plan'));
    }
}
