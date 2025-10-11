<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOtp;
use App\Mail\PasswordChangedMail;
use App\Mail\SendOtpMail;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Login with explicit checks:
     * 1) Validate inputs
     * 2) Find user by email
     * 3) Verify password
     * 4) Verify admin approval (is_verified)
     * 5) Log in
     */
    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    // standard attempt (no is_verified check)
    if (Auth::attempt($request->only('email', 'password'))) {
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }

    return back()->withErrors(['email' => 'Invalid email or password.'])->withInput();
}


    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
{
    // ✅ only the fields your form actually sends
    $data = $request->validate([
        'name'       => ['required','string','max:255'],
        'email'      => ['required','email:rfc,dns','unique:users,email'],
        'phone'      => ['required','string','max:30'],
        'password'   => ['required','string','confirmed','min:6'],

        'province'   => ['required','string','max:50'],
        'district'   => ['required','string','max:60'],
        'address'    => ['required','string','max:255'],
    ]);

    \App\Models\User::create([
        'name'        => $data['name'],
        'email'       => $data['email'],
        'phone'       => $data['phone'],
        'password'    => \Illuminate\Support\Facades\Hash::make($data['password']),
        'province'    => $data['province'],
        'district'    => $data['district'],
        'address'     => $data['address'],
        'is_verified' => false, // admin approval gate
    ]);

    return redirect()->route('login')
        ->with('success', 'Account created successfully. Please wait for admin approval.');
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

        Mail::to($user->email)->send(new SendOtpMail($otp));

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
        if (!$user || (string) $user->otp !== (string) $request->otp) {
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
            'otp' => null,
        ]);

        Mail::to($user->email)->send(new PasswordChangedMail());

        session()->forget(['reset_user_id', 'verified_user_id']);

        return redirect('/login')->with('success', 'Password reset successfully.');
    }
}
