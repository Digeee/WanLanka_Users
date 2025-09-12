<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class PlaceController extends Controller
{
    public function show($slug)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer 1|8OImmqdUzzCwAOzoksoHFeOjpz1iSWSLTbTL3geC43aa48db',
            'Accept' => 'application/json',
        ])->get("http://127.0.0.1:8000/api/places/{$slug}");

        $place = $response->successful() ? $response->json() : null;
        if (!$place) {
            abort(404, 'Place not found');
        }

        return view('user.places.show', compact('place'));
    }
}
