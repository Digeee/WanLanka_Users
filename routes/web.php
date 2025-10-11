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
use App\Http\Controllers\UserBookingController;

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

// Guider pages
Route::get('/guider/individual-bookings', function() {
    return view('guider.individual-bookings');
})->name('guider.individual-bookings')->middleware('auth.guider');

Route::get('/guider/fixed-bookings', function() {
    return view('guider.fixed-bookings');
})->name('guider.fixed-bookings')->middleware('auth.guider');

Route::get('/guider/custom-bookings', function() {
    return view('guider.custom-bookings');
})->name('guider.custom-bookings')->middleware('auth.guider');

Route::get('/guider/messages', function() {
    return view('guider.messages');
})->name('guider.messages')->middleware('auth.guider');

Route::get('/guider/reviews', function() {
    return view('guider.reviews');
})->name('guider.reviews')->middleware('auth.guider');

Route::get('/guider/earnings', function() {
    return view('guider.earnings');
})->name('guider.earnings')->middleware('auth.guider');

Route::get('/guider/settings', function() {
    return view('guider.settings');
})->name('guider.settings')->middleware('auth.guider');

Route::post('/guider/settings', function() {
    $guider = \App\Models\Guider::find(session('guider_id'));
    if ($guider) {
        $guider->update(request()->only([
            'first_name', 
            'last_name', 
            'phone', 
            'address', 
            'languages', 
            'specializations', 
            'experience_years', 
            'hourly_rate', 
            'city', 
            'vehicle_types'
        ]));
    }
    return redirect()->back()->with('success', 'Profile updated successfully!');
})->name('guider.settings.update')->middleware('auth.guider');

Route::post('/guider/password', function() {
    $guider = \App\Models\Guider::find(session('guider_id'));
    if ($guider && \Illuminate\Support\Facades\Hash::check(request('current_password'), $guider->password)) {
        $guider->update(['password' => \Illuminate\Support\Facades\Hash::make(request('new_password'))]);
        return redirect()->back()->with('success', 'Password updated successfully!');
    }
    return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect']);
})->name('guider.password.update')->middleware('auth.guider');

Route::get('/guider/help', function() {
    return view('guider.help');
})->name('guider.help')->middleware('auth.guider');

Route::get('/guider/messages', function() {
    return view('guider.messages');
})->name('guider.messages')->middleware('auth.guider');

Route::get('/packages/fix', [PackageController::class, 'fix'])->name('packages.fix');
Route::get('/packages/{id}', [PackageController::class, 'show'])->name('packages.show');

Route::get('/provinces', [ProvinceController::class, 'index'])->name('province.index');
Route::get('/province/{slug}', [ProvinceController::class, 'show'])->name('province.show');
Route::get('/place/{slug}', [PlaceController::class, 'show'])->name('places.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/my-bookings', [UserBookingController::class, 'index'])->name('user.bookings');
});




Route::get('/bookings/{id}', [UserBookingController::class, 'show'])->name('bookings.show');
Route::delete('/bookings/{id}', [UserBookingController::class, 'destroy'])->name('bookings.destroy');
Route::post('/userbookings/{id}/rebook', [UserBookingController::class, 'rebook'])->name('userbookings.rebook');
Route::delete('/bookings/{id}/delete', [UserBookingController::class, 'forceDelete'])
    ->name('userbookings.forceDelete');

Route::patch('/bookings/{id}/complete', [UserBookingController::class, 'complete'])
    ->name('bookings.complete');

Route::patch('/custom-packages/{id}/complete', [CustomPackageController::class, 'complete'])
    ->name('custom-packages.complete');


Route::middleware(['auth'])->group(function () {
Route::get('/fixedbooking/{packageId}/reserve', [FixedBookingController::class, 'reserve'])->name('fixedbooking.reserve');
Route::post('/fixedbooking/store', [FixedBookingController::class, 'store'])->name('fixedbooking.store');
});