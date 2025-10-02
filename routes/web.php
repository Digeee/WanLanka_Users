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
Route::view('/', 'home')->name('home');
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
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendOtpForReset'])->name('password.email');
    Route::get('/verify-reset-otp', [AuthController::class, 'showVerifyResetOtpForm'])->name('password.otp');
    Route::post('/verify-reset-otp', [AuthController::class, 'verifyResetOtp'])->name('password.otp.verify');
    Route::get('/reset-password', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});

/* -------------------- Auth-only (must be logged IN) -------------------- */
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn() => redirect()->route('home'))->name('dashboard');

    Route::get('/account', [AccountController::class, 'index'])->name('account');
    Route::put('/account', [AccountController::class, 'update'])->name('account.update');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/add-place', [PlaceController::class, 'create'])->name('places.create');
    // No POST route - submission via JS to admin API
});

/* -------------------- Guider Auth -------------------- */
Route::get('/guider/login', [GuiderAuthController::class, 'showLogin'])->name('guider.login');
Route::post('/guider/send-otp', [GuiderAuthController::class, 'sendOtp'])->name('guider.sendOtp');
Route::post('/guider/verify-otp', [GuiderAuthController::class, 'verifyOtp'])->name('guider.verifyOtp');
Route::post('/guider/logout', [GuiderAuthController::class, 'logout'])->name('guider.logout');

Route::get('/guider/dashboard', function() {
    return view('guider.dashboard');
})->name('guider.dashboard')->middleware('auth.guider');

Route::get('/packages/fix', [PackageController::class, 'fix'])->name('packages.fix');
Route::get('/packages/{id}', [PackageController::class, 'show'])->name('packages.show');

Route::get('/provinces', [ProvinceController::class, 'index'])->name('province.index');
Route::get('/province/{slug}', [ProvinceController::class, 'show'])->name('province.show');
Route::get('/place/{slug}', [PlaceController::class, 'show'])->name('places.show');
