@extends('layouts.master')

@include('include.header')





{{-- ✅ Title Section (Full Width) --}}
<section class="provinces-header-section">
    <div class="container text-center">
        <h2 class="section-title">
            <span class="title-line title-line-1">Explore Sri Lanka</span>
            <span class="title-line title-line-2">Provinces</span>
        </h2>

        {{-- ✅ Subtitle moved below title --}}
        <p class="section-subtitle">
            <span class="subtitle-line">Discover the best tours and attractions in each province.</span>
        </p>
    </div>
</section>


{{-- ✅ Provinces Grid Section --}}
<section class="provinces-section">
    <div class="container">
        <div class="provinces-grid">
            @php
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
            @endphp

            @foreach($provinces as $province)
                <div class="province-card">
                    <img src="{{ $province['image'] }}" alt="{{ $province['name'] }}" class="province-image">
                    <h3 class="province-title">{{ $province['name'] }}</h3>
                    <p class="province-description">{{ $province['description'] }}</p>
                    <a href="{{ route('province.show', $province['slug']) }}" class="read-more-btn">Read More</a>

                </div>
            @endforeach
        </div>
    </div>
</section>

@include('include.footer')
