
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

<style>
/* General Styling */
.place-details {
    background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%);
    padding: 40px 0;
    font-family: 'Poppins', sans-serif;
}

.container {
    max-width: 1200px;
}

.place-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #1A3C5A; /* Navy */
    text-align: center;
    margin-bottom: 30px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.place-card {
    background: #FFFFFF;
    border-radius: 15px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.place-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 32px rgba(0, 0, 0, 0.15);
}

/* Details Column */
.place-details-col {
    padding: 30px;
}

.details-content p {
    font-size: 1.1rem;
    color: #333;
    margin-bottom: 15px;
    line-height: 1.6;
}

.details-content p strong {
    color: #1A3C5A; /* Navy */
    font-weight: 600;
}

/* Images Column */
.place-images-col {
    padding: 30px;
}

.section-subtitle {
    font-size: 1.25rem;
    font-weight: 600;
    color: #D4A017; /* Gold */
    margin-bottom: 15px;
}

.main-image {
    width: 100%;
    height: 300px;
    object-fit: cover;
    border-radius: 10px;
    transition: transform 0.3s ease;
}

.main-image:hover {
    transform: scale(1.05);
}

.no-image {
    font-size: 1rem;
    color: #777;
    text-align: center;
}

/* Swiper Gallery */
.gallery-slider {
    position: relative;
    width: 100%;
    height: 200px;
}

.gallery-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 10px;
}

.swiper-button-prev,
.swiper-button-next {
    color: #D4A017; /* Gold */
    background: rgba(255, 255, 255, 0.8);
    width: 40px;
    height: 40px;
    border-radius: 50%;
    transition: background 0.3s ease;
}

.swiper-button-prev:hover,
.swiper-button-next:hover {
    background: #D4A017;
    color: #FFFFFF;
}

.swiper-pagination-bullet {
    background: #D4A017;
}

.swiper-pagination-bullet-active {
    background: #1A3C5A;
}

/* Responsive Design */
@media (max-width: 768px) {
    .place-title {
        font-size: 2rem;
    }

    .place-card {
        margin: 0 15px;
    }

    .place-details-col,
    .place-images-col {
        padding: 20px;
    }

    .main-image {
        height: 200px;
    }

    .gallery-slider {
        height: 150px;
    }
}
</style>

<!-- Swiper.js JavaScript CDN -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Initialize Swiper for gallery
    const gallerySlider = new Swiper('.gallery-slider', {
        slidesPerView: 1,
        spaceBetween: 10,
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
            },
        },
    });

    // Add hover effect to main image
    const mainImage = document.querySelector('.main-image');
    if (mainImage) {
        mainImage.addEventListener('mouseenter', function () {
            this.style.transform = 'scale(1.05)';
        });
        mainImage.addEventListener('mouseleave', function () {
            this.style.transform = 'scale(1)';
        });
    }
});
</script>

@include('include.footer')
