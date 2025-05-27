<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Frontend\CompanyFoundingUpdateRequest;
use App\Models\Company;
use App\Http\Requests\Frontend\CompanyInfoRequest;
use App\Traits\FileUploadTrait;
use Auth;
use Illuminate\Validation\Rules;
use Illuminate\Http\RedirectResponse;
use App\Services\Notify;
use App\Http\Controllers\Frontend\notifyController;

class CompanyProfileController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        $companyInfo = Company::where('user_id', auth('web')->user()->id)->first();
        return view('frontend.company-dashboard.profile.index', compact('companyInfo'));
    }

    public function updateCompanyInfo(CompanyInfoRequest $request): RedirectResponse
    {
        $userId = auth('web')->id();

        // Get existing company profile (if any)
        $company = Company::where('user_id', $userId)->first();

        // Upload files and delete old ones if present
        $logoPath = $this->uploadFile($request, 'logo', $company->logo ?? null);
        $bannerPath = $this->uploadFile($request, 'banner', $company->banner ?? null);

        // Prepare data
        $data = [
            'name' => $request->name,
            'bio' => $request->bio,
            'vision' => $request->vision,
        ];

        if (!empty($logoPath)) $data['logo'] = $logoPath;
        if (!empty($bannerPath)) $data['banner'] = $bannerPath;

        // Create or update company profile
        Company::updateOrCreate(
            ['user_id' => $userId],
            $data
        );
        notify()->success('Upadated Successfully','Success');
        return redirect()->back()->with('success', 'Company profile updated.');
    }

    function updateFoundingInfo(CompanyFoundingUpdateRequest $request) : RedirectResponse {

        Company::updateOrCreate(
            ['user_id' => auth('web')->user()->id],
            [
                'industry_type_id' => $request->industry_type,
                'organization_type_id' => $request->organization_type,
                'team_size_id' => $request->team_size,
                'establishement_date' => $request->establishment_date,
                'website' => $request->website,
                'email' => $request->email,
                'phone' => $request->phone,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'address' => $request->address,
                'map_link' => $request->map_link,
            ]
        );

        notify()->success('Upadated Successfully','Success');
        return redirect()->back();
    }

    function updateAccountInfo(Request $request) : RedirectResponse {
        $vadlidateData = $request->validate([
            'name' => ['required','string','max:50'],
            'email' => ['required','email'],
        ]);

        Auth::user()->update($vadlidateData);
        notify()->success('Upadated Successfully','Success');
        return redirect()->back();
    }

    function updatePassword(Request $request) : RedirectResponse {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        Auth::user()->update(['password' => bcrypt($request->password)]);
        notify()->success('Upadated Successfully','Success');
        return redirect()->back();
    }
}
