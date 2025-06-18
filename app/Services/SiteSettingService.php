<?php

namespace App\Services;


use App\Models\SiteSettings;
use Cache;

class SiteSettingService{

    function getSetting(){
        return Cache::rememberForever('Setting', function()
        {
            return SiteSettings::pluck('value','key')->toArray() ;
        });
    }

    function setGlobalSetting(){
        $settings = $this->getSetting();
        config()->set('Setting',$settings);
    }

    function clearCacheSettings(): void{
        Cache::forget('Setting');
    }
}
