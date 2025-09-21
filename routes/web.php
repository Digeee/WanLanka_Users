<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\User\PlaceController;
use App\Http\Controllers\User\ProvinceController;
use App\Http\Controllers\GuiderAuthController;

/* -------------------- Public pages (no login required) -------------------- */
Route::view('/', 'home')->name('home'); // landing page
Route::view('/about', 'pages.about')->name('about');
Route::view('/destinations', 'pages.destinations')->name('destinations');
Route::view('/offers', 'pages.offers')->name('offers');
Route::view('/info', 'pages.info')->name('info');

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

Route::get('/provinces', [ProvinceController::class, 'index'])->name('provinces');
Route::get('/search', [SearchController::class, 'index'])->name('search');

/* -------------------- Guest-only (must be logged OUT) -------------------- */
Route::middleware('guest')->group(function () {
    Route::get('/login',    [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login',   [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register',[AuthController::class, 'register']);

    // Forgot/Reset via OTP
    Route::get('/forgot-password',  [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendOtpForReset'])->name('password.email');
    Route::get('/verify-reset-otp', [AuthController::class, 'showVerifyResetOtpForm'])->name('password.otp');
    Route::post('/verify-reset-otp',[AuthController::class, 'verifyResetOtp'])->name('password.otp.verify');
    Route::get('/reset-password',   [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('/reset-password',  [AuthController::class, 'resetPassword'])->name('password.update');
});

/* -------------------- Auth-only (must be logged IN) -------------------- */
Route::middleware('auth')->group(function () {
    // No dashboard view — redirect to home instead
    Route::get('/dashboard', fn() => redirect()->route('home'))->name('dashboard');

    Route::get('/account', [AccountController::class, 'index'])->name('account');
    Route::put('/account', [AccountController::class, 'update'])->name('account.update');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});



Route::get('/packages/fix', [PackageController::class, 'fix'])->name('packages.fix'); // Route for fixed packages
Route::get('/packages/{id}', [PackageController::class, 'show'])->name('packages.show');


/* -------------------- Guider Auth -------------------- */


Route::prefix('guider')->group(function() {
    Route::get('/login', [GuiderAuthController::class, 'showLoginForm'])->name('guider.login');
    Route::post('/login', [GuiderAuthController::class, 'login'])->name('guider.login.submit');
    Route::post('/logout', [GuiderAuthController::class, 'logout'])->name('guider.logout');

    Route::get('/dashboard', function() {
        return view('guider.dashboard');
    })->middleware('auth:guider');
});

// 9 province cards page
Route::get('/provinces', [ProvinceController::class, 'index'])->name('province.index');


// Province details page (places inside province)
Route::get('/province/{slug}', [ProvinceController::class, 'show'])->name('province.show');

// ✅ Single place details page
Route::get('/place/{slug}', [PlaceController::class, 'show'])->name('places.show');

//archaga
Route::get('/about', function () {
    return view('about');
});
Route::get('/add-place', function () {
    return view('add_place'); // the form you created earlier
});