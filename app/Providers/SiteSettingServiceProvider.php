<?php

namespace App\Providers;

use App\Http\Controllers\Admin\SiteSettingsController;
use App\Models\SiteSettings;
use App\Services\SiteSettingService;
use Illuminate\Support\ServiceProvider;

class SiteSettingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(SiteSettingService::class,function(){
            return new SiteSettingService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $setting = $this->app->make(SiteSettingService::class);
        $setting->setGlobalSetting();
    }
}
