<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Place;

class PlaceController extends Controller
{
    public function show($slug)
    {
        $place = Place::where('slug', $slug)
                    ->where('status', 'active')
                    ->firstOrFail();

        return view('user.places.show', compact('place'));
    }
}
