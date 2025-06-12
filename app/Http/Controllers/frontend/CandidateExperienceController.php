<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CandidateExperienceStoreRequest;
use App\Models\CandidateExperience;
use App\Services\Notify;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CandidateExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidateExperiences = CandidateExperience::where('candidate_id', auth('web')->user()->candidateProfile->id)->orderBy('id', 'desc')->get();
        return view('frontend.candidate-dashboard.profile.sections.ajax-experience-table', compact('candidateExperiences'))->render();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CandidateExperienceStoreRequest $request): Response
    {
        $experience = new CandidateExperience();
        $experience->candidate_id = auth('web')->user()->candidateProfile->id;
        $experience->company = $request->company;
        $experience->department = $request->department;
        $experience->designation = $request->designation;
        $experience->start = $request->start;
        $experience->end = $request->end;
        $experience->responsibility = $request->responsibility;
        $experience->currently_working = $request->filled('currently_working') ? 1 : 0;
        $experience->save();

        return response(['message' => 'Created Successfully'], 200);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        $experience = CandidateExperience::findOrFail($id);
        return response($experience);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CandidateExperienceStoreRequest $request, string $id):Response
    {

        $experience = CandidateExperience::findOrFail($id);
        if (auth('web')->user()->candidateProfile->id !== $experience->candidate_id) {
            abort(404);
        }
        $experience->company = $request->company;
        $experience->department = $request->department;
        $experience->designation = $request->designation;
        $experience->start = $request->start;
        $experience->end = $request->end;
        $experience->responsibility = $request->responsibility;
        $experience->currently_working = $request->filled('currently_working') ? 1 : 0;
        $experience->save();

        return response(['message' => 'Updated Successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $experience = CandidateExperience::findOrFail($id);
            if (auth('web')->user()->candidateProfile->id !== $experience->candidate_id) {
                abort(404);
            }
            $experience->delete();
            return response(['message' => 'Deleted Succssfully'], 200);
        } catch (\Exception $e) {
            logger($e);
            return response(['message' => 'error'], 500);
        }
    }
}
