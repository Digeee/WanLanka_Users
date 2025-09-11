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

        {{-- ✅ Filter Form --}}
        <form method="GET" class="flex flex-wrap gap-4 justify-center mb-6">
            {{-- District Filter --}}
            <select name="district" class="border rounded p-2">
                <option value="">All Districts</option>
                @foreach($districts as $district)
                    <option value="{{ $district }}" {{ request('district') == $district ? 'selected' : '' }}>
                        {{ $district }}
                    </option>
                @endforeach
            </select>

            {{-- Rating Filter --}}
            <select name="rating" class="border rounded p-2">
                <option value="">All Ratings</option>
                <option value="4" {{ request('rating') == 4 ? 'selected' : '' }}>4 ★ & Up</option>
                <option value="3" {{ request('rating') == 3 ? 'selected' : '' }}>3 ★ & Up</option>
                <option value="2" {{ request('rating') == 2 ? 'selected' : '' }}>2 ★ & Up</option>
                <option value="1" {{ request('rating') == 1 ? 'selected' : '' }}>1 ★ & Up</option>
            </select>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Apply Filters
            </button>

            <a href="{{ url()->current() }}" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">
                Reset
            </a>
        </form>

        {{-- ✅ Places Grid --}}
        <div class="places-grid">
            @forelse($places as $place)
                <div class="place-card">
                    <img src="{{ $place->image ? asset('storage/'.$place->image) : asset('images/default-place.jpg') }}"
                         alt="{{ $place->name }}" class="place-image">
                    <h3 class="place-title">{{ $place->name }}</h3>
                    <p class="place-location">{{ $place->district }}</p>

                    {{-- Optional: show rating visually --}}
                    @if($place->rating)
                        <p class="place-rating">⭐ {{ $place->rating }}/5</p>
                    @endif

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
