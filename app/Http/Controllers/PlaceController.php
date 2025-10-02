<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\NewPlaceUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PlaceController extends Controller
{
    public function show($slug)
    {
        // TODO: implement show logic if needed
    }

    public function create()
    {
        return view('add_place');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'place_name' => 'required|string|max:255',
            'google_map_link' => 'required|url',
            'province' => 'required|string|max:50',
            'district' => 'required|string|max:60',
            'location' => 'required|string|max:255',
            'nearest_city' => 'required|string|max:255',
            'description' => 'required|string',
            'best_suited_for' => 'required|string|max:255',
            'activities_offered' => 'required|string',
            'rating' => 'required|integer|between:1,5',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:3072',
        ]);

        // ✅ Get logged in user
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->withErrors('You must be logged in to submit a place.');
        }

        // ✅ Add user info
        $validated['user_id'] = $user->id;
        $validated['user_name'] = $user->name;
        $validated['user_email'] = $user->email;

        // ✅ Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('place_images', 'public');
        }

        // ✅ Save place
        NewPlaceUser::create($validated);

        return redirect()->route('account')->with('success', 'Place submitted successfully.');
    }
}
