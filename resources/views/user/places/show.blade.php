
@include('include.header')

<section class="place-details">
    <!-- Header Section -->
    <div class="header-section">
        <div class="container">
            <h1 class="place-title">{{ $place['name'] ?? 'N/A' }}</h1>
        </div>
    </div>

    <!-- Main Content Section -->
    <div class="container main-content">
        <div class="row">
            <!-- Details Section -->
            <div class="col-md-6 details-section">
                <div class="glass-card details-card">
                    <h2 class="section-title">Details</h2>
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
            </div>
            <!-- Images Section -->
            <div class="col-md-6 images-section">
                <div class="glass-card images-card">
                    <h2 class="section-title">Photos</h2>
                    @if($place['image'])
                        <img src="{{ $place['image'] }}" alt="{{ $place['name'] ?? 'Place Image' }}" class="main-image">
                    @else
                        <p class="no-image">No main image available.</p>
                    @endif
                    <h2 class="section-title mt-4">Gallery</h2>
                    @if(!empty($place['gallery']) && is_array($place['gallery']))
                        <div class="gallery-slider">
                            <div class="gallery-wrapper">
                                @foreach($place['gallery'] as $image)
                                    <div class="gallery-slide">
                                        <img src="{{ $image }}" alt="Gallery Image" class="gallery-image">
                                    </div>
                                @endforeach
                            </div>
                            <button class="gallery-prev">◄</button>
                            <button class="gallery-next">►</button>
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
    background: linear-gradient(135deg, #1a5a4d 0%, #366f2e 100%); /* Navy gradient */
    min-height: 100vh;
    padding: 40px 0;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
}

/* Container */
.container {
    max-width: 1200px;
    margin: 0 auto;
}

/* Header Section */
.header-section {
    padding: 20px 0;
    text-align: center;
}

.place-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #FFFFFF;
    text-transform: uppercase;
    letter-spacing: 1px;
    padding: 15px 30px;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 12px;
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    animation: fadeIn 1s ease-out;
}

/* Main Content */
.main-content {
    padding: 30px 0;
}

/* Glassmorphism Card */
.glass-card {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 15px;
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    padding: 25px;
    margin-bottom: 20px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.glass-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
}

/* Details Section */
.details-section {
    animation: slideInLeft 1s ease-out;
}

.section-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: #E6E6FA; /* Pastel lavender */
    margin-bottom: 15px;
}

.details-content p {
    font-size: 1.1rem;
    color: #F8F9FA; /* Soft white */
    margin-bottom: 12px;
    line-height: 1.6;
}

.details-content p strong {
    color: #FFFFFF;
    font-weight: 600;
}

/* Images Section */
.images-section {
    animation: slideInRight 1s ease-out;
}

.main-image {
    width: 100%;
    height: 300px;
    object-fit: cover;
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: transform 0.3s ease;
}

.main-image:hover {
    transform: scale(1.05);
}

.no-image {
    font-size: 1rem;
    color: #E6E6FA;
    text-align: center;
}

/* Gallery Slider */
.gallery-slider {
    position: relative;
    width: 100%;
    height: 200px;
    overflow: hidden;
}

.gallery-wrapper {
    display: flex;
    transition: transform 0.5s ease;
}

.gallery-slide {
    flex: 0 0 100%;
    width: 100%;
    height: 200px;
}

.gallery-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.gallery-prev,
.gallery-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(255, 255, 255, 0.2);
    border: none;
    color: #FFFFFF;
    font-size: 1.5rem;
    padding: 10px;
    cursor: pointer;
    border-radius: 50%;
    transition: background 0.3s ease;
}

.gallery-prev:hover,
.gallery-next:hover {
    background: #E6E6FA;
    color: #1A3C5A;
}

.gallery-prev {
    left: 10px;
}

.gallery-next {
    right: 10px;
}

/* Animations */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes slideInLeft {
    from { opacity: 0; transform: translateX(-50px); }
    to { opacity: 1; transform: translateX(0); }
}

@keyframes slideInRight {
    from { opacity: 0; transform: translateX(50px); }
    to { opacity: 1; transform: translateX(0); }
}

/* Responsive Design */
@media (max-width: 768px) {
    .place-title {
        font-size: 2rem;
        padding: 10px 20px;
    }

    .main-content {
        padding: 15px;
    }

    .glass-card {
        padding: 15px;
    }

    .main-image {
        height: 200px;
    }

    .gallery-slider {
        height: 150px;
    }

    .gallery-slide {
        height: 150px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Gallery Slider
    const galleryWrapper = document.querySelector('.gallery-wrapper');
    const slides = document.querySelectorAll('.gallery-slide');
    const prevButton = document.querySelector('.gallery-prev');
    const nextButton = document.querySelector('.gallery-next');
    let currentIndex = 0;
    const totalSlides = slides.length;

    if (galleryWrapper && slides.length > 0) {
        function updateSlider() {
            galleryWrapper.style.transform = `translateX(-${currentIndex * 100}%)`;
        }

        prevButton.addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
            updateSlider();
        });

        nextButton.addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % totalSlides;
            updateSlider();
        });

        // Auto-slide every 5 seconds
        let autoSlide = setInterval(() => {
            currentIndex = (currentIndex + 1) % totalSlides;
            updateSlider();
        }, 5000);

        // Pause auto-slide on hover
        galleryWrapper.addEventListener('mouseenter', () => clearInterval(autoSlide));
        galleryWrapper.addEventListener('mouseleave', () => {
            autoSlide = setInterval(() => {
                currentIndex = (currentIndex + 1) % totalSlides;
                updateSlider();
            }, 5000);
        });
    }

    // Hover effect for main image
    const mainImage = document.querySelector('.main-image');
    if (mainImage) {
        mainImage.addEventListener('mouseenter', () => {
            mainImage.style.transform = 'scale(1.05)';
        });
        mainImage.addEventListener('mouseleave', () => {
            mainImage.style.transform = 'scale(1)';
        });
    }
});
</script>

@include('include.footer')
