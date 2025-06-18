<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PaypalSettingsUpdateRequest;
use App\Models\PaymentSetting;
use App\Services\Notify;
use App\Services\PaymentGatewaySettingsService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PaymentSettingController extends Controller
{
    public function index():View{
        return view("admin.payment-setting.index");
    }

    public function updatePaypalSetting(PaypalSettingsUpdateRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        foreach($validatedData as $key => $value){
            PaymentSetting::updateOrCreate(
                ['key' => $key],
                ['value'=> $value]
            );
        }

        $settingsService = app(PaymentGatewaySettingsService::class);
        $settingsService->clearCacheSettings();
        Notify::updatedNotification();
        return redirect()->back();
    }
}
