@extends('layouts.master')
@include('include.header')

<section class="province-details-header">
    <div class="container text-center">
        <h2 class="section-title">
            <span class="title-line title-line-1">Explore {{ $provinceName }}</span>
            <span class="title-line title-line-2">Best Places to Visit</span>
        </h2>
        <p class="section-subtitle">
            <span class="subtitle-line">
                Discover amazing tourist attractions, culture, and nature in {{ $provinceName }}.
            </span>
        </p>
    </div>
</section>

<section class="province-places-section">
    <div class="container">
        <div class="places-grid">
            @forelse($places as $place)
                <div class="place-card">
                    <img src="{{ $place->image ? asset('storage/'.$place->image) : asset('images/default-place.jpg') }}"
                         alt="{{ $place->name }}" class="place-image">
                    <h3 class="place-title">{{ $place->name }}</h3>
                    <p class="place-location">{{ $place->district }}</p>
                    <p class="place-description">
                        {{ \Illuminate\Support\Str::limit($place->description, 100, '...') }}
                    </p>
                    <a href="{{ route('places.show', $place->slug) }}" class="read-more-btn">View Details</a>
                </div>
            @empty
                <p class="text-center">No places found in {{ $provinceName }}.</p>
            @endforelse
        </div>
    </div>
</section>

@include('include.footer')
