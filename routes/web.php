<?php

use App\Http\Controllers\Frontend\CandidateDashboardController;
use App\Http\Controllers\Frontend\CandidateEducationController;
use App\Http\Controllers\Frontend\CandidateExperienceController;
use App\Http\Controllers\Frontend\CandidateProfileController;
use App\Http\Controllers\Frontend\CheckOutController;
use App\Http\Controllers\Frontend\CheckoutPageController;
use App\Http\Controllers\Frontend\CompanyDashboardController;
use App\Http\Controllers\Frontend\CompanyProfileController;
use App\Http\Controllers\Frontend\FrontendCandidatePageController;
use App\Http\Controllers\Frontend\FrontendCompanyPageController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LocationController;
use App\Http\Controllers\Frontend\PricingPageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
// routes/web.php

require __DIR__.'/admin.php';

Route::get('get-states/{country_id}',[LocationController::class,'getStates'])->name('get-states');
Route::get('get-cities/{state_id}',[LocationController::class,'getCities'])->name('get-cities');



/* Candidate Dashboard Route */

Route::group(
    [
    'middleware' => 'auth','verified','user.auth:candidate',
    'prefix' =>'/candidate',
    'as' => 'candidate.',
    ],
    function () {
    Route::get('/dashboard', [CandidateDashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [CandidateProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/basic-info-update', [CandidateProfileController::class, 'basicInfoUpdate'])->name('profile.basic-info.update');
    Route::post('/profile/profile-info-update', [CandidateProfileController::class, 'profileInfoUpdate'])->name('profile.profile-info.update');
    Route::resource('experience', CandidateExperienceController::class);
    Route::resource('education', CandidateEducationController::class);
    Route::post('/profile/account-info-update', [CandidateProfileController::class, 'accountInfoUpdate'])->name('profile.account-info.update');
    Route::post('/profile/account-email-update', [CandidateProfileController::class, 'accountEmailUpdate'])->name('profile.account-email.update');
    Route::post('/profile/account-password-update', [CandidateProfileController::class, 'accountPasswordUpdate'])->name('profile.account-password.update');

});

/* Company Dashboard Route */

Route::group(
    [
    'middleware' => 'auth','verified','user.auth:company',
    'prefix' =>'/company',
    'as' => 'company.',
    ],
    function () {

    // Dashboard
    Route::get('/dashboard', [CompanyDashboardController::class, 'index'])->name('dashboard');

    // Company Profile Controller
    Route::get('/profile', [CompanyProfileController::class, 'index'])->name('profile');

    Route::post('/profile/company-info', [CompanyProfileController::class, 'updateCompanyInfo'])->name('profile.company-info');

    Route::post('/profile/founding-info', [CompanyProfileController::class, 'updateFoundingInfo'])->name('profile.founding-info');

    Route::post('/profile/account-info', [CompanyProfileController::class, 'updateAccountInfo'])->name('profile.account-info');
    Route::post('/profile/password-update', [CompanyProfileController::class, 'updatePassword'])->name('profile.password-update');

    /** Paypal Payment Routes */

    Route::get('paypal/payment',[PaymentController::class,'paywithPaypal'])->name('paypal.payment');
    Route::get('paypal/success',[PaymentController::class,'paypalSuccess'])->name('paypal.success');
    Route::get('paypal/cancel',[PaymentController::class,'paypalCancel'])->name('paypal.cancel');

});


Route::get('companies',[FrontendCompanyPageController::class,'index'])->name('companies.index');
Route::get('companies/{slug}',[FrontendCompanyPageController::class,'show'])->name('companies.show');

Route::get('candidates',[FrontendCandidatePageController::class,'index'])->name('candidates.index');
Route::get('candidates/{slug}',[FrontendCandidatePageController::class,'show'])->name('candidates.show');

Route::get('pricing',PricingPageController::class)->name('pricing.index');
Route::get('checkout/{plan_id}',CheckoutPageController::class)->name('checkout.index');

