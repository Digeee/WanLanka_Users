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
        $user = Auth::user();               // pass user to the view
        return view('account', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name'           => ['required','string','max:255'],
            'email'          => ['required','email', Rule::unique('users','email')->ignore($user->id)],
            'phone'          => ['required','string','max:30'],
            'province'       => ['required','string','max:50'],
            'district'       => ['required','string','max:60'],
            'address'        => ['required','string','max:255'],
            'profile_photo'  => ['nullable','image','mimes:jpg,jpeg,png','max:3072'],
            'marketing_opt_in' => ['nullable','boolean'],
        ]);

        if ($request->hasFile('profile_photo')) {
            $new = $request->file('profile_photo')->store('profiles', 'public');
            if ($user->profile_photo && Storage::disk('public')->exists($user->profile_photo)) {
                Storage::disk('public')->delete($user->profile_photo);
            }
            $validated['profile_photo'] = $new;
        }

        $validated['marketing_opt_in'] = (bool) $request->boolean('marketing_opt_in');

        $user->fill($validated)->save();

        return back()->with('success', 'Your account has been updated.');
    }
}
