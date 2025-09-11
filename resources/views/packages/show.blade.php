@extends('layouts.master')
@include('include.header')

<div class="container mt-4">
    <h1>Package Details - {{ $package['package_name'] }}</h1>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <!-- Package Details -->
                <div class="col-md-6">
                    <p><strong>Description:</strong> {{ $package['description'] ?? 'N/A' }}</p>
                    <p><strong>Price:</strong> ${{ $package['price'] ?? 'N/A' }}</p>
                    <p><strong>Starting Date:</strong> {{ $package['starting_date'] ? date('Y-m-d', strtotime($package['starting_date'])) : 'N/A' }}</p>
                    <p><strong>Expiry Date:</strong> {{ $package['expiry_date'] ? date('Y-m-d', strtotime($package['expiry_date'])) : 'N/A' }}</p>
                    <p><strong>Places:</strong> {{ !empty($package['related_places']) ? collect($package['related_places'])->pluck('name')->join(', ') : 'N/A' }}</p>
                    <p><strong>Accommodations:</strong> {{ !empty($package['accommodations']) ? collect($package['accommodations'])->map(fn($acc) => $acc['name'])->join(', ') : 'N/A' }}</p>
                    <p><strong>Days:</strong> {{ $package['days'] ?? 'N/A' }}</p>
                    <p><strong>Inclusions:</strong> {{ $package['inclusions'] ?? 'N/A' }}</p>
                    <p><strong>Vehicle Type:</strong> {{ !empty($package['vehicle']) ? $package['vehicle']['vehicle_type'] . ' (' . ($package['vehicle']['number_plate'] ?? 'N/A') . ')' : 'N/A' }}</p>
                    <p><strong>Package Type:</strong> {{ $package['package_type'] ?? 'N/A' }}</p>
                    <p><strong>Status:</strong> {{ $package['status'] ?? 'N/A' }}</p>
                    <p><strong>Rating:</strong> {{ $package['rating'] ?? 'N/A' }}</p>
                    <p><strong>Reviews:</strong> {{ $package['reviews'] ?? 'N/A' }}</p>
                    <a href="/book/{{ $package['id'] }}" class="btn btn-primary btn-lg mt-3">Book Now</a>
                </div>
                <!-- Images -->
                <div class="col-md-6">
                    <h5>Cover Image</h5>
                    @if ($package['cover_image'])
                        <img src="{{ $package['cover_image'] }}" alt="Cover Image" class="img-fluid mb-3" style="max-width: 100%; height: auto; border-radius: 5px;">
                    @else
                        <p>N/A</p>
                    @endif
                    <h5>Gallery</h5>
                    @if (!empty($package['gallery']))
                        <div class="gallery d-flex flex-wrap gap-2">
                            @foreach ($package['gallery'] as $image)
                                <img src="{{ $image }}" alt="Gallery Image" class="img-fluid" style="max-width: 150px; height: auto; border-radius: 5px;">
                            @endforeach
                        </div>
                    @else
                        <p>N/A</p>
                    @endif
                </div>
            </div>
            <!-- Day Plans -->
            <h5 class="mt-4">Day Plans</h5>
            @if (!empty($package['day_plans']))
                @foreach ($package['day_plans'] as $dayPlan)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h6>Day {{ $dayPlan['day_number'] }}</h6>
                            <p><strong>Plan:</strong> {{ $dayPlan['plan'] ?? 'N/A' }}</p>
                            <p><strong>Accommodation:</strong> {{ !empty($dayPlan['accommodation']) ? $dayPlan['accommodation']['name'] . ' (' . ($dayPlan['accommodation']['province'] ?? 'N/A') . ' - ' . ($dayPlan['accommodation']['district'] ?? 'N/A') . ')' : 'N/A' }}</p>
                            <p><strong>Description:</strong> {{ $dayPlan['description'] ?? 'N/A' }}</p>
                            <p><strong>Photos:</strong>
                                @if (!empty($dayPlan['photos']))
                                    <div class="d-flex flex-wrap gap-2">
                                        @foreach ($dayPlan['photos'] as $photo)
                                            <img src="{{ $photo }}" alt="Day Plan Photo" class="img-fluid" style="max-width: 100px; height: auto; border-radius: 5px;">
                                        @endforeach
                                    </div>
                                @else
                                    N/A
                                @endif
                            </p>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No day plans available.</p>
            @endif
        </div>
    </div>
</div>

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
.btn-primary {
    padding: 10px 20px;
    font-size: 1.1rem;
    background: #007bff;
    color: white;
    border-radius: 5px;
}
</style>

@include('include.footer')
