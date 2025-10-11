<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    /**
     * Display user account details and bookings.
     */
    public function index()
        {
            $user = auth()->user();

            // Fetch all user bookings (past + current)
            $bookings = $user->bookings()->latest()->get();

            // Fetch fixed bookings with package relation
            $fixedBookings = $user->fixedBookings()->with('package')->latest()->get();

            // Fetch custom packages if available
            $customPackages = method_exists($user, 'customPackages') ? $user->customPackages()->latest()->get() : collect();

            return view('account', compact('user', 'bookings', 'fixedBookings', 'customPackages'));
        }


    /**
     * Update user account details.
     */
    public function update(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = User::findOrFail(Auth::id());

        // Validate the input fields
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

    // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            $newProfile = $request->file('profile_photo')->store('profiles', 'public');

            // Delete old file if exists
            if ($user->profile_photo && Storage::disk('public')->exists($user->profile_photo)) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            $validated['profile_photo'] = $newProfile;
        }

    // Handle ID image upload
        if ($request->hasFile('id_image')) {
            $newId = $request->file('id_image')->store('id_images', 'public');

            // Delete old ID image if exists
            if ($user->id_image && Storage::disk('public')->exists($user->id_image)) {
                Storage::disk('public')->delete($user->id_image);
            }

            $validated['id_image'] = $newId;
        }

        // Convert checkbox/boolean safely
        $validated['marketing_opt_in'] = $request->boolean('marketing_opt_in');

    // Update user info
    $user->fill($validated)->save();

        return back()->with('success', 'Your account has been updated.');
    }
}
