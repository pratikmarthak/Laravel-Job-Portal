<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\IndustryTypeController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\OrganizationTypeController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\ProfessionController;
use App\Http\Controllers\Admin\SkillController;
use App\Models\Organization;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Guest Routes
|--------------------------------------------------------------------------
*/
Route::group([
    'middleware' => 'guest:admin',
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login');

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

/*
|--------------------------------------------------------------------------
| Admin Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::group([
    'middleware' => 'auth:admin',
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {

        // Logout
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    // Dashboard Route
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Industry Type Routes
    Route::resource('industry-types', IndustryTypeController::class);

    // Organization Routes
    Route::resource('organization-types', OrganizationTypeController::class);

    // Country Routes
    Route::resource('country', CountryController::class);

    // State Routes
    Route::resource('states', StateController::class);

    // City Routes
    Route::resource('cities', CityController::class);

    Route::get('get-states/{country_id}', [LocationController::class, 'getStatesOfCountry'])->name('get-states');

    // Language Routes
    Route::resource('languages', LanguageController::class);

    // Profession Routes
    Route::resource('professions', ProfessionController::class);

    // Skills Routes
    Route::resource('skills', SkillController::class);
});

