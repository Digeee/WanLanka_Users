@extends('layouts.master')

@include('include.header')


<br>
<br>
<br>
<br>
<br>

{{-- ✅ Title Section (Full Width) --}}
<section class="provinces-header-section">
    <div class="container text-center">
        <h2 class="section-title">Explore Sri Lanka Provinces</h2>
        <p class="section-subtitle">
            Discover the best tours and attractions in each province.
        </p>
    </div>
</section>

{{-- ✅ Provinces Grid Section --}}
<section class="provinces-section">
    <div class="container">
        <div class="provinces-grid">
            @php
                $provinces = [
                    ['name'=>'Central', 'slug'=>'central', 'image'=>asset('images/branch5.jpg'), 'description'=>'Heart of Sri Lanka with scenic mountains and tea plantations.'],
                    ['name'=>'Eastern', 'slug'=>'eastern', 'image'=>asset('images/branch5.jpg'), 'description'=>'Beautiful beaches and cultural towns.'],
                    ['name'=>'North Central', 'slug'=>'north-central', 'image'=>asset('images/branch5.jpg'), 'description'=>'Ancient cities and heritage sites.'],
                    ['name'=>'Northern', 'slug'=>'northern', 'image'=>asset('images/branch5.jpg'), 'description'=>'Rich history and coastal beauty.'],
                    ['name'=>'North Western', 'slug'=>'north-western', 'image'=>asset('images/branch5.jpg'), 'description'=>'Wildlife, lagoons, and cultural towns.'],
                    ['name'=>'Sabaragamuwa', 'slug'=>'sabaragamuwa', 'image'=>asset('images/branch5.jpg'), 'description'=>'Waterfalls, mountains, and adventure spots.'],
                    ['name'=>'Southern', 'slug'=>'southern', 'image'=>asset('images/branch5.jpg'), 'description'=>'Beaches, heritage, and popular tourist hubs.'],
                    ['name'=>'Uva', 'slug'=>'uva', 'image'=>asset('images/branch5.jpg'), 'description'=>'Tea estates, waterfalls, and scenic landscapes.'],
                    ['name'=>'Western', 'slug'=>'western', 'image'=>asset('images/branch5.jpg'), 'description'=>'Capital Colombo and urban attractions.'],
                ];
            @endphp

            @foreach($provinces as $province)
                <div class="province-card">
                    <img src="{{ $province['image'] }}" alt="{{ $province['name'] }}" class="province-image">
                    <h3 class="province-title">{{ $province['name'] }}</h3>
                    <p class="province-description">{{ $province['description'] }}</p>
                    <a href="{{ url('province/'.$province['slug']) }}" class="read-more-btn">Read More</a>
                </div>
            @endforeach
        </div>
    </div>
</section>

@include('include.footer')
