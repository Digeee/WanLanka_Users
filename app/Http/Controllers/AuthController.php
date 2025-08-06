<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOtp;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ]);
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);

        $user = User::create([
    'name' => $request->name,
    'email' => $request->email,
    'password' => Hash::make($request->password),
]);

// Optionally: send welcome email here
Mail::to($user->email)->send(new SendOtp());

    return redirect()->route('login')->with('success', 'Account created successfully. Please login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    // --- Password Reset via OTP ---

    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function sendOtpForReset(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'No user found with that email.');
        }

        $otp = rand(100000, 999999);
        $user->update(['otp' => $otp]);

        session(['reset_user_id' => $user->id]);

        Mail::to($user->email)->send(new SendOtp($otp));

        return redirect()->route('password.otp')->with('message', 'OTP sent to your email.');
    }

    public function showVerifyResetOtpForm()
    {
        return view('auth.verify-reset-otp');
    }

    public function verifyResetOtp(Request $request)
    {
        $request->validate(['otp' => 'required|digits:6']);

        $user = User::find(session('reset_user_id'));

        if (!$user || $user->otp !== $request->otp) {
            return back()->with('error', 'Invalid OTP.');
        }

        session(['verified_user_id' => $user->id]);
        return redirect()->route('password.reset');
    }

    public function showResetPasswordForm()
    {
        return view('auth.reset-password');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|confirmed|min:6',
        ]);

        $user = User::find(session('verified_user_id'));

        if (!$user) {
            return redirect('/forgot-password')->with('error', 'Session expired.');
        }

        $user->update([
            'password' => Hash::make($request->password),
            'otp' => null
        ]);

        session()->forget(['reset_user_id', 'verified_user_id']);

        return redirect('/login')->with('success', 'Password reset successfully.');
    }
}

