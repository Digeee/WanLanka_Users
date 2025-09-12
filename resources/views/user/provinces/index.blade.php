@extends('layouts.master')
@include('include.header')

<br><br><br><br><br>

<section class="provinces-header-section">
    <div class="container text-center">
        <h2 class="section-title">
            <span class="title-line title-line-1">Explore Sri Lanka</span>
            <span class="title-line title-line-2">Provinces</span>
        </h2>
        <p class="section-subtitle">
            Discover the best tours and attractions in each province.
        </p>
    </div>
</section>

<section class="provinces-section">
    <div class="container">
        <div class="provinces-grid">
            @foreach($provinces as $province)
                <div class="province-card">
                    <img src="{{ $province['image'] ?? asset('images/default-province.jpg') }}" alt="{{ $province['name'] }}" class="province-image">
                    <h3 class="province-title">{{ $province['name'] }}</h3>
                    <p class="province-description">{{ $province['description'] ?? 'Explore ' . $province['name'] }}</p>
                    <a href="{{ route('province.show', $province['slug']) }}" class="read-more-btn">Read More</a>
                </div>
            @endforeach
        </div>
    </div>
</section>

@include('include.footer')
