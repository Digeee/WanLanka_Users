
@include('include.header')

<!-- Swiper.js CSS CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<!-- Google Fonts: Poppins -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<section class="place-details">
    <div class="container mt-5">
        <h1 class="place-title">{{ $place['name'] ?? 'N/A' }}</h1>
        <div class="place-card">
            <div class="row">
                <!-- Place Details -->
                <div class="col-md-6 place-details-col">
                    <div class="details-content">
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
                </div>
                <!-- Images -->
                <div class="col-md-6 place-images-col">
                    <h5 class="section-subtitle">Main Image</h5>
                    @if($place['image'])
                        <img src="{{ $place['image'] }}" alt="{{ $place['name'] ?? 'Place Image' }}" class="main-image">
                    @else
                        <p class="no-image">No main image available.</p>
                    @endif
                    <h5 class="section-subtitle mt-4">Gallery</h5>
                    @if(!empty($place['gallery']) && is_array($place['gallery']))
                        <div class="swiper gallery-slider">
                            <div class="swiper-wrapper">
                                @foreach($place['gallery'] as $image)
                                    <div class="swiper-slide">
                                        <img src="{{ $image }}" alt="Gallery Image" class="gallery-image">
                                    </div>
                                @endforeach
                            </div>
                            <!-- Navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                            <!-- Pagination -->
                            <div class="swiper-pagination"></div>
                        </div>
                    @else
                        <p class="no-image">No gallery images available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>



@include('include.footer')
