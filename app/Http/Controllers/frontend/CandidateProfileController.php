<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\BasicProfileUpdateRequest;
use App\Http\Requests\Frontend\CandidateAccountInfoUpdateRequest;
use App\Http\Requests\Frontend\CandidateProfileUpdateRequest;
use App\Models\Candidate;
use App\Models\CandidateEducation;
use App\Models\CandidateExperience;
use App\Models\CandidateLanguages;
use App\Models\CandidateSkills;
use App\Models\City;
use App\Models\Country;
use App\Models\Experience;
use App\Models\Language;
use App\Models\Profession;
use App\Models\Skill;
use App\Models\State;
use App\Services\Notify;
use App\Traits\FileUploadTrait;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\Rules;

class CandidateProfileController extends Controller
{

    use FileUploadTrait;
    public function index(): View
    {
        $candidate = Candidate::with(['skill'])->where('user_id', auth('web')->user()->id)->first();
        $candidateExperiences = CandidateExperience::where('candidate_id', $candidate?->id)->orderBy('id', 'DESC')->get();
        $candidateEducations = CandidateEducation::where('candidate_id', $candidate?->id)->orderBy('id', 'DESC')->get();
        $experineces = Experience::all();
        $countries = Country::all();
        $states = State::where('country_id', $candidate?->country)->get();
        $cities = City::where('state_id', $candidate?->state)->get();
        $professions = Profession::all();
        $skills = Skill::all();
        $languages = Language::all();

        return view("frontend.candidate-dashboard.profile.index", compact('candidate', 'experineces', 'professions', 'skills', 'languages', 'candidateExperiences', 'candidateEducations', 'countries', 'states', 'cities'));
    }

    public function basicInfoUpdate(BasicProfileUpdateRequest $request): RedirectResponse
    {
        //dd($request->all());

        $imagePath = $this->uploadFile($request, 'profile_picture');
        $cvPath = $this->uploadFile($request, 'cv');

        $data = [];
        if (!empty($imagePath)) $data['image'] = $imagePath;
        if (!empty($cvPath)) $data['cv'] = $cvPath;

        $data['full_name'] = $request->full_name;
        $data['title'] = $request->title;
        $data['experience_id'] = $request->experince_level;
        $data['website'] = $request->website;
        $data['birth_date'] = $request->date_of_birth;

        Candidate::updateOrCreate(
            ['user_id' => auth('web')->user()->id],
            $data,
        );

        $this->updateProfileStatus();
        Notify::updatedNotification();
        return redirect()->back();
    }

    public function profileInfoUpdate(CandidateProfileUpdateRequest $request): RedirectResponse
    {
        //dd($request->all());

        $data = [];
        $data['gender'] = $request->gender;
        $data['marital_status'] = $request->marital_status;
        $data['profession_id'] = $request->profession;
        $data['status'] = $request->availability;
        $data['bio'] = $request->biography;

        Candidate::updateOrCreate(
            ['user_id' => auth('web')->user()->id],
            $data,
        );

        $candidate = Candidate::where('user_id', auth('web')->user()->id)->first();

        CandidateLanguages::where('candidate_id', $candidate->id)?->delete();

        foreach ($request->language_you_know as $language) {
            $candidateLang = new CandidateLanguages();
            $candidateLang->candidate_id = $candidate->id;
            $candidateLang->language_id = $language;
            $candidateLang->save();
        }

        CandidateSkills::where('candidate_id', $candidate->id)?->delete();
        foreach ($request->skills_you_have as $skill) {
            $candidateskill = new CandidateSkills();
            $candidateskill->candidate_id = $candidate->id;
            $candidateskill->skill_id = $skill;
            $candidateskill->save();
        }

        $this->updateProfileStatus();
        Notify::updatedNotification();
        return redirect()->back();
    }

    function accountInfoUpdate(CandidateAccountInfoUpdateRequest $request): RedirectResponse
    {
        // dd($request->all());

        Candidate::updateOrCreate(
            ['user_id' => auth('web')->user()->id],
            [
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'address' => $request->address,
                'phone_one' => $request->phone,
                'phone_two' => $request->secondary_phone,
                'email' => $request->email,
            ],
        );

        $this->updateProfileStatus();
        Notify::updatedNotification();
        return redirect()->back();
    }

    function accountEmailUpdate(Request $request): RedirectResponse
    {
        $request->validate([
            'account_email' =>  ['required', 'email'],
        ]);
        Auth::user()->update(['email' => $request->account_email]);
        Notify::updatedNotification();
        return redirect()->back();
    }

    function accountPasswordUpdate(Request $request): RedirectResponse
    {
        //dd($request->all());
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        Auth::user()->update(['password' => bcrypt($request->password)]);
        Notify::updatedNotification();
        return redirect()->back();
    }

    function updateProfileStatus():void{
        if(isCandidateProfileComplete()){
            $candidate = Candidate::where('user_id',auth('web')->user()->id)->first();
            $candidate->profile_complete = 1;
            $candidate->visibilty = 1;
            $candidate->save();
        }
    }
}
