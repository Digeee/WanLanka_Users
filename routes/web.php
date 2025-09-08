<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AccountController;

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


});
