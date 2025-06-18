<?php

namespace App\Services;

use App\Models\PaymentSetting;
use Cache;

class PaymentGatewaySettingsService{

    function getSetting(){
        return Cache::rememberForever('gatewaySettings', function()
        {
            return PaymentSetting::pluck('value','key')->toArray() ;
        });
    }

    function setGlobalSetting(){
        $settings = $this->getSetting();
        config()->set('gatewaySettings',$settings);
    }

    function clearCacheSettings(): void{
        Cache::forget('gatewaySettings');
    }
}
