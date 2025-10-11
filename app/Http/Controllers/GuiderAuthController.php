<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\GuiderOtpMail;
use App\Models\Guider;

class GuiderAuthController extends Controller
{
    // Show login page
    public function showLogin()
    {
        return view('guider.login');
    }

    // Send OTP
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        // Check guider existence and status before sending OTP
        $guider = Guider::where('email', $request->email)->first();
        if (!$guider) {
            return redirect()
                ->route('guider.login')
                ->withInput()
                ->with('error', 'You are not registered as a guider. Please contact the admin to register.');
        }

        if (isset($guider->status) && $guider->status !== 'active') {
            return redirect()
                ->route('guider.login')
                ->withInput()
                ->with('error', 'Your guider account is not active yet. Please contact the admin.');
        }

        $otp = rand(100000, 999999); // 6-digit OTP
        $expiry = now()->addMinutes(5); // OTP valid for 5 mins

        // Save OTP + expiry in session
        Session::put('guider_email', $request->email);
        Session::put('guider_otp', $otp);
        Session::put('guider_otp_expiry', $expiry);

        // Send email using new Mailable
        Mail::to($request->email)->send(new GuiderOtpMail($otp));

        return redirect()
            ->route('guider.login')
            ->with('otp_sent', true)
            ->with('success', 'Verification code sent to your email.');
    }

    // Verify OTP
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric'
        ]);

        $email = Session::get('guider_email');
        if (!$email || !Guider::where('email', $email)->exists()) {
            return redirect()
                ->route('guider.login')
                ->with('error', 'Guider account not found. Please contact the admin.');
        }

        $storedOtp = Session::get('guider_otp');
        $expiry = Session::get('guider_otp_expiry');

        if ($request->otp == $storedOtp && $expiry && now()->lessThanOrEqualTo($expiry)) {
            // OTP is correct & not expired
            $email = Session::get('guider_email');
            $guider = Guider::where('email', $email)->first();

            Session::forget(['guider_otp', 'guider_otp_expiry']);
            Session::put('guider_logged_in', true);
            if ($guider) {
                Session::put('guider_id', $guider->id);
            }

            return redirect()->route('guider.dashboard');
        }

        return redirect()->route('guider.login')->with('error', 'Invalid or expired OTP');
    }

    // Logout guider session
    public function logout(Request $request)
    {
        Session::forget(['guider_email', 'guider_id', 'guider_otp', 'guider_otp_expiry', 'guider_logged_in']);
        return redirect()->route('guider.login')->with('success', 'You have been logged out.');
    }
}
