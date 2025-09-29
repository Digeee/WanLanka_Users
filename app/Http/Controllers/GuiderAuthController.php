<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\GuiderOtpMail;

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

        $otp = rand(100000, 999999); // 6-digit OTP
        $expiry = now()->addMinutes(5); // OTP valid for 5 mins

        // Save OTP + expiry in session
        Session::put('guider_email', $request->email);
        Session::put('guider_otp', $otp);
        Session::put('guider_otp_expiry', $expiry);

        // Send email using new Mailable
        Mail::to($request->email)->send(new GuiderOtpMail($otp));

        return redirect()->route('guider.login')->with('otp_sent', true);
    }

    // Verify OTP
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric'
        ]);

        $storedOtp = Session::get('guider_otp');
        $expiry = Session::get('guider_otp_expiry');

        if ($request->otp == $storedOtp && $expiry && now()->lessThanOrEqualTo($expiry)) {
            // OTP is correct & not expired
            Session::forget(['guider_otp', 'guider_otp_expiry']);
            Session::put('guider_logged_in', true);

            return redirect()->route('guider.dashboard');
        }

        return redirect()->route('guider.login')->with('error', 'Invalid or expired OTP');
    }
}
