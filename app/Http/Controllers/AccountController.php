<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // ✅ Fetch all user bookings (past + current)
        $bookings = $user->bookings()->latest()->get();

        // ✅ If you have a separate table for custom packages, fetch it too
        $customPackages = $user->customPackages()->latest()->get();

        return view('account', compact('user', 'bookings', 'customPackages'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            'phone' => ['required', 'string', 'max:30'],
            'province' => ['required', 'string', 'max:50'],
            'district' => ['required', 'string', 'max:60'],
            'address' => ['required', 'string', 'max:255'],
            'dob' => ['nullable', 'date'],
            'preferred_language' => ['nullable', 'in:English,Tamil,Sinhala'],
            'emergency_name' => ['nullable', 'string', 'max:255'],
            'emergency_phone' => ['nullable', 'string', 'max:255'],
            'profile_photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:3072'],
            'id_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:3072'],
            'marketing_opt_in' => ['nullable', 'boolean'],
        ]);

        // ✅ Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            $new = $request->file('profile_photo')->store('profiles', 'public');
            if ($user->profile_photo && Storage::disk('public')->exists($user->profile_photo)) {
                Storage::disk('public')->delete($user->profile_photo);
            }
            $validated['profile_photo'] = $new;
        }

        // ✅ Handle ID image upload
        if ($request->hasFile('id_image')) {
            $new = $request->file('id_image')->store('id_images', 'public');
            if ($user->id_image && Storage::disk('public')->exists($user->id_image)) {
                Storage::disk('public')->delete($user->id_image);
            }
            $validated['id_image'] = $new;
        }

        $validated['marketing_opt_in'] = (bool) $request->boolean('marketing_opt_in');

        // ✅ Update user info
        $user->fill($validated)->save();

        return back()->with('success', 'Your account has been updated.');
    }
}
