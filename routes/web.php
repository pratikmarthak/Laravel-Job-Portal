<?php

use App\Http\Controllers\Frontend\CandidateDashboardController;
use App\Http\Controllers\Frontend\HomeController;
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

/* Candidate Dashboard Route */

Route::group(
    [
    'middleware' => 'auth','verified','user.auth:candidate',
    'prefix' =>'/candidate',
    'as' => 'candidate.',
    ],
    function () {
    Route::get('/dashboard', [CandidateDashboardController::class, 'index'])->name('dashboard');
});

/* Company Dashboard Route */

Route::group(
    [
    'middleware' => 'auth','verified','user.auth:company',
    'prefix' =>'/company',
    'as' => 'company.',
    ],
    function () {
        Route::get('/dashboard', function () {
            return view('frontend.company-dashboard.dashboard');
        })->name('dashboard');
});
