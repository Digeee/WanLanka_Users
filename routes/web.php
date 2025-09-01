<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;

// Redirect root to login
Route::get('/', function () {
    return redirect('/login');
});

// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Registration
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Forgot Password - Step 1: Request OTP
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendOtpForReset'])->name('password.email');

// Step 2: OTP Verification
Route::get('/verify-reset-otp', [AuthController::class, 'showVerifyResetOtpForm'])->name('password.otp');
Route::post('/verify-reset-otp', [AuthController::class, 'verifyResetOtp'])->name('password.otp.verify');

// Step 3: Reset password
Route::get('/reset-password', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

// Dashboard (after login)
Route::get('/dashboard', function () {
    return view('layouts.app');
})->middleware('auth');



// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');



