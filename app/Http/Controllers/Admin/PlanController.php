<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PlanCreateRequest;
use App\Models\Plan;
use App\Services\Notify;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $plans = Plan::all();
        return view('admin.plan.index',compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('admin.plan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlanCreateRequest $request):RedirectResponse
    {
        $plan = new Plan();
        $plan->label = $request->label;
        $plan->price = $request->price;
        $plan->job_limit = $request->job_limit;
        $plan->feature_job_limit = $request->feature_job_limit;
        $plan->highlight_job_limit = $request->highlight_job_limit;
        $plan->profile_verify = $request->profile_verify;
        $plan->recommended = $request->recommended;
        $plan->frontend_show = $request->frontend_show;
        $plan->show_at_home = $request->show_at_home;
        $plan->save();

        Notify::createdNotification();
        return to_route('admin.plans.index');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id):View
    {
        $plan = Plan::findOrFail($id);
        return view('admin.plan.edit',compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PlanCreateRequest $request, string $id)
    {
        $plan = Plan::findOrFail($id);
        $plan->label = $request->label;
        $plan->price = $request->price;
        $plan->job_limit = $request->job_limit;
        $plan->feature_job_limit = $request->feature_job_limit;
        $plan->highlight_job_limit = $request->highlight_job_limit;
        $plan->profile_verify = $request->profile_verify;
        $plan->recommended = $request->recommended;
        $plan->frontend_show = $request->frontend_show;
        $plan->show_at_home = $request->show_at_home;
        $plan->save();

        Notify::updatedNotification();
        return to_route('admin.plans.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            Plan::findOrFail($id)->delete();
            Notify::deletedNotification();
            return response(['message' => 'success'],200);
        }
        catch(\Exception $e){
            logger($e);
            return response(['message' => 'error'],500);
        }
    }
}
