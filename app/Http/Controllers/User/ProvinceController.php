<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Place;

class ProvinceController extends Controller
{
    // ✅ Show 9 province cards
    public function index()
    {
        $provinces = [
            ['name'=>'Central', 'slug'=>'central', 'image'=>asset('images/P-centeral.jpg'), 'description'=>'Heart of Sri Lanka with scenic mountains and tea plantations.'],
            ['name'=>'Eastern', 'slug'=>'eastern', 'image'=>asset('images/P-estern.webp'), 'description'=>'Beautiful beaches and cultural towns.'],
            ['name'=>'North Central', 'slug'=>'north-central', 'image'=>asset('images/P-northcentral.jpg'), 'description'=>'Ancient cities and heritage sites.'],
            ['name'=>'Northern', 'slug'=>'northern', 'image'=>asset('images/P-northern.jpg'), 'description'=>'Rich history and coastal beauty.'],
            ['name'=>'North Western', 'slug'=>'north-western', 'image'=>asset('images/P-northwestern.jpg'), 'description'=>'Wildlife, lagoons, and cultural towns.'],
            ['name'=>'Sabaragamuwa', 'slug'=>'sabaragamuwa', 'image'=>asset('images/P-Sabaragamuwa.jpg'), 'description'=>'Waterfalls, mountains, and adventure spots.'],
            ['name'=>'Southern', 'slug'=>'southern', 'image'=>asset('images/P-Southern.jpg'), 'description'=>'Beaches, heritage, and popular tourist hubs.'],
            ['name'=>'Uva', 'slug'=>'uva', 'image'=>asset('images/P-uva.webp'), 'description'=>'Tea estates, waterfalls, and scenic landscapes.'],
            ['name'=>'Western', 'slug'=>'western', 'image'=>asset('images/P-western.jpg'), 'description'=>'Capital Colombo and urban attractions.'],
        ];

        return view('user.provinces.index', compact('provinces'));
    }

    // ✅ Show places under one province
    public function show($slug)
    {
        $map = [
            'central' => 'Central',
            'eastern' => 'Eastern',
            'north-central' => 'North Central',
            'northern' => 'Northern',
            'north-western' => 'North Western',
            'sabaragamuwa' => 'Sabaragamuwa',
            'southern' => 'Southern',
            'uva' => 'Uva',
            'western' => 'Western',
        ];

        $provinceName = $map[$slug] ?? abort(404, 'Province not found');

        $places = Place::where('status', 'active')
                        ->where('province', $provinceName)
                        ->orderBy('name')
                        ->get();

        return view('user.provinces.show', compact('provinceName', 'places'));
    }
}
