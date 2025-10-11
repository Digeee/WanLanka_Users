<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\CustomPackageController; // Add this import
use App\Http\Controllers\User\PlaceController;
use App\Http\Controllers\User\ProvinceController;
use App\Http\Controllers\GuiderAuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FixedBookingController;
use App\Http\Controllers\TravelLockerController;

/* -------------------- Public pages (no login required) -------------------- */
Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/destinations', 'pages.destinations')->name('destinations');
Route::view('/offers', 'pages.offers')->name('offers');
Route::view('/info', 'pages.info')->name('info');

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

Route::get('/provinces', [ProvinceController::class, 'index'])->name('provinces');
Route::get('/search', [SearchController::class, 'index'])->name('search');

// Add these public custom package routes
Route::get('/custom-packages', [CustomPackageController::class, 'index'])->name('custom-packages.index');
Route::get('/custom-packages/{id}', [CustomPackageController::class, 'show'])->name('custom-packages.show');

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

    // Custom Packages - Auth required routes
Route::middleware('auth')->group(function () {
    Route::get('/my-custom-packages', [CustomPackageController::class, 'myPackages'])->name('custom-packages.my');
    Route::post('/custom-packages', [CustomPackageController::class, 'store'])->name('custom-packages.store');
    Route::delete('/custom-packages/{id}', [CustomPackageController::class, 'destroy'])->name('custom-packages.destroy');
});
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
use App\Http\Controllers\UserBookingController;

Route::middleware(['auth'])->group(function () {
    Route::get('/my-bookings', [UserBookingController::class, 'index'])->name('user.bookings');
});




Route::get('/bookings/{id}', [UserBookingController::class, 'show'])->name('bookings.show');
Route::delete('/bookings/{id}', [UserBookingController::class, 'destroy'])->name('bookings.destroy');
Route::post('/userbookings/{id}/rebook', [UserBookingController::class, 'rebook'])->name('userbookings.rebook');
Route::delete('/bookings/{id}/delete', [UserBookingController::class, 'forceDelete'])
    ->name('userbookings.forceDelete');


    Route::middleware(['auth'])->group(function () {
    Route::get('/fixedbooking/{packageId}/reserve', [FixedBookingController::class, 'reserve'])->name('fixedbooking.reserve');
    Route::post('/fixedbooking/store', [FixedBookingController::class, 'store'])->name('fixedbooking.store');
});

// Travel Locker Debug Route (temporary)
Route::get('/debug-travel-locker', function () {
    return view('debug-travel-locker');
})->name('debug-travel-locker');

// Upload Test Route (temporary)
Route::get('/test-upload', function () {
    return view('test-upload');
})->name('test-upload');

// Travel Locker Routes - Protected by authentication
Route::middleware(['auth'])->group(function () {
    Route::get('/travel-locker', [TravelLockerController::class, 'index'])->name('travel-locker.index');
    Route::get('/travel-locker/create', [TravelLockerController::class, 'create'])->name('travel-locker.create');
    Route::post('/travel-locker', [TravelLockerController::class, 'store'])->name('travel-locker.store');
    Route::get('/travel-locker/{travelDocument}', [TravelLockerController::class, 'show'])->name('travel-locker.show');
    Route::get('/travel-locker/{travelDocument}/edit', [TravelLockerController::class, 'edit'])->name('travel-locker.edit');
    Route::put('/travel-locker/{travelDocument}', [TravelLockerController::class, 'update'])->name('travel-locker.update');
    Route::delete('/travel-locker/{travelDocument}', [TravelLockerController::class, 'destroy'])->name('travel-locker.destroy');
    Route::get('/travel-locker/{travelDocument}/download', [TravelLockerController::class, 'download'])->name('travel-locker.download');
    Route::get('/travel-locker-filter', [TravelLockerController::class, 'filter'])->name('travel-locker.filter');
    Route::post('/travel-locker/bulk-delete', [TravelLockerController::class, 'bulkDelete'])->name('travel-locker.bulk-delete');
});