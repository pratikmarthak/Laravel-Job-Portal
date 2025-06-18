<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiteSettingUpdateRequest;
use App\Models\SiteSettings;
use App\Services\Notify;
use App\Services\SiteSettingService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteSettingsController extends Controller
{
    function index(): View {
        return view('admin.site-setting.index');
    }

    function updateGeneralSetting(SiteSettingUpdateRequest $request) : RedirectResponse {
        $validatedData = $request->validated();

        foreach($validatedData as $key => $value){
            SiteSettings::updateOrCreate(
                ['key' => $key],
                ['value'=> $value]
            );
        }

        $setting = app(SiteSettingService::class);
        $setting->clearCacheSettings();
        Notify::updatedNotification();
        return redirect()->back();
    }
}
