<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Guider;

class GuiderAuthController extends Controller
{
    // Show guider login form
    public function showLoginForm() {
        return view('guider.login');
    }

    // Handle guider login
    public function login(Request $request) {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt login using the 'guider' guard
        if (Auth::guard('guider')->attempt($request->only('username','password'))) {
            $request->session()->regenerate();
            return redirect()->intended('/guider/dashboard');
        }

        return back()->withErrors(['username' => 'Invalid username or password'])->withInput();
    }

    // Logout guider
    public function logout(Request $request) {
        Auth::guard('guider')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/guider/login');
    }
}
