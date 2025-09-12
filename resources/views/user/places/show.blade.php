@extends('layouts.master')
@include('include.header')

<section class="place-details">
    <div class="container mt-4">
        <h1 class="text-3xl font-bold">{{ $place['name'] ?? 'N/A' }}</h1>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <!-- Place Details -->
                    <div class="col-md-6">
                        <p><strong>Province:</strong> {{ $place['province'] ?? 'N/A' }}</p>
                        <p><strong>District:</strong> {{ $place['district'] ?? 'N/A' }}</p>
                        <p><strong>Location:</strong> {{ $place['location'] ?? 'N/A' }}</p>
                        <p><strong>Description:</strong> {{ $place['description'] ?? 'N/A' }}</p>
                        <p><strong>Weather:</strong> {{ $place['weather'] ?? 'N/A' }}</p>
                        <p><strong>Best Time to Visit:</strong> {{ $place['best_time_to_visit'] ?? 'N/A' }}</p>
                        <p><strong>Entry Fee:</strong> {{ $place['entry_fee'] ?? 'N/A' }}</p>
                        <p><strong>Opening Hours:</strong> {{ $place['opening_hours'] ?? 'N/A' }}</p>
                        <p><strong>Rating:</strong> {{ $place['rating'] ? $place['rating'] . ' Stars' : 'N/A' }}</p>
                    </div>
                    <!-- Images -->
                    <div class="col-md-6">
                        <h5>Main Image</h5>
                        @if($place['image'])
                            <img src="{{ $place['image'] }}" alt="{{ $place['name'] ?? 'Place Image' }}" class="img-fluid mb-3" style="max-width: 100%; height: auto; border-radius: 5px;">
                        @else
                            <p>No main image available.</p>
                        @endif
                        <h5>Gallery</h5>
                        @if(!empty($place['gallery']) && is_array($place['gallery']))
                            <div class="gallery d-flex flex-wrap gap-2">
                                @foreach($place['gallery'] as $image)
                                    <img src="{{ $image }}" alt="Gallery Image" class="img-fluid" style="max-width: 150px; height: auto; border-radius: 5px;">
                                @endforeach
                            </div>
                        @else
                            <p>No gallery images available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.card {
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    border-radius: 5px;
}
.card-body p {
    margin-bottom: 10px;
}
.gallery {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}
</style>

@include('include.footer')
