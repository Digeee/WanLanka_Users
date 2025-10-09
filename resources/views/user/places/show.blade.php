<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $place['name'] ?? 'Tourism Destination' }} | Explore Sri Lanka</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #2a9d8f;
            --primary-dark: #1d7874;
            --secondary: #e76f51;
            --light: #f8f9fa;
            --dark: #264653;
            --accent: #e9c46a;
            --text: #333333;
            --text-light: #6c757d;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text);
            background-color: #f5f7fa;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
        }

        /* Header Section */
        .header-section {
            background: linear-gradient(135deg, rgba(42, 157, 143, 0.9) 0%, rgba(38, 70, 83, 0.9) 100%),
                        url('https://images.unsplash.com/photo-1506744038136-46273834b3fb') center/cover no-repeat;
            color: white;
            padding: 100px 0 80px;
            position: relative;
            overflow: hidden;
        }

        .header-section::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: linear-gradient(to top, #f5f7fa, transparent);
            z-index: 1;
        }

        .place-title {
            font-size: 3.5rem;
            margin-bottom: 20px;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
            animation: fadeInDown 1s ease;
        }

        #visitNowBtn {
            background: var(--secondary);
            border: none;
            padding: 12px 30px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 50px;
            transition: var(--transition);
            box-shadow: 0 5px 15px rgba(231, 111, 81, 0.4);
            animation: fadeInUp 1s ease 0.3s both;
        }

        #visitNowBtn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(231, 111, 81, 0.6);
            background: #e65c3e;
        }

        /* Main Content */
        .main-content {
            margin-top: -40px;
            position: relative;
            z-index: 2;
        }

        .details-card, .images-card {
            background: white;
            border-radius: 20px;
            box-shadow: var(--shadow);
            padding: 30px;
            margin-bottom: 30px;
            transition: var(--transition);
            border: none;
            overflow: hidden;
            position: relative;
        }

        .details-card::before, .images-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: var(--primary);
        }

        .details-card:hover, .images-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .section-title {
            color: var(--dark);
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--accent);
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 50px;
            height: 2px;
            background: var(--primary);
        }

        .details-content p {
            margin-bottom: 15px;
            padding-left: 20px;
            position: relative;
            animation: fadeInLeft 0.8s ease both;
        }

        .details-content p::before {
            content: '•';
            position: absolute;
            left: 0;
            color: var(--primary);
            font-weight: bold;
        }

        .details-content p strong {
            color: var(--dark);
            width: 180px;
            display: inline-block;
        }

        /* Images Section */
        .main-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 15px;
            margin-bottom: 20px;
            transition: var(--transition);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .main-image:hover {
            transform: scale(1.02);
        }

        /* Gallery Slider */
        .gallery-slider {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .gallery-wrapper {
            display: flex;
            transition: transform 0.5s ease;
        }

        .gallery-slide {
            min-width: 100%;
            position: relative;
        }

        .gallery-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            display: block;
        }

        .gallery-prev, .gallery-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.8);
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: var(--dark);
            cursor: pointer;
            transition: var(--transition);
            z-index: 10;
        }

        .gallery-prev {
            left: 15px;
        }

        .gallery-next {
            right: 15px;
        }

        .gallery-prev:hover, .gallery-next:hover {
            background: white;
            color: var(--primary);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
        }

        /* Modal Styles */
        .modal-content {
            border-radius: 20px;
            border: none;
            overflow: hidden;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            border-bottom: none;
            padding: 20px 30px;
        }

        .modal-title {
            font-weight: 600;
        }

        .btn-close {
            filter: invert(1);
        }

        .modal-body {
            padding: 30px;
        }

        .form-control, .form-select {
            padding: 12px 15px;
            border-radius: 10px;
            border: 1px solid #e0e0e0;
            transition: var(--transition);
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(42, 157, 143, 0.25);
        }

        #totalPrice {
            color: var(--secondary);
            font-size: 1.5rem;
            font-weight: 700;
        }

        /* Animations */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .place-title {
                font-size: 2.5rem;
            }

            .header-section {
                padding: 80px 0 60px;
            }

            .details-content p strong {
                width: 130px;
            }
        }

        /* Loading Animation */
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,255,255,.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Floating Elements */
        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            overflow: hidden;
            z-index: 0;
        }

        .floating-element {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 15s infinite linear;
        }

        .floating-element:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-element:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 60%;
            left: 80%;
            animation-delay: -5s;
        }

        .floating-element:nth-child(3) {
            width: 60px;
            height: 60px;
            top: 80%;
            left: 20%;
            animation-delay: -10s;
        }

        @keyframes float {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(-1000px) rotate(720deg);
                opacity: 0;
            }
        }

        /* Rating Stars */
        .rating-stars {
            color: var(--accent);
            margin-left: 10px;
        }

        /* No Image Placeholder */
        .no-image {
            text-align: center;
            padding: 40px 20px;
            color: var(--text-light);
            background: #f8f9fa;
            border-radius: 10px;
            border: 2px dashed #dee2e6;
        }

        .no-image i {
            font-size: 3rem;
            margin-bottom: 15px;
            display: block;
            color: #ced4da;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <section class="place-details">
        <div class="header-section">
            <div class="floating-elements">
                <div class="floating-element"></div>
                <div class="floating-element"></div>
                <div class="floating-element"></div>
            </div>
            <div class="container">
                <h1 class="place-title">{{ $place['name'] ?? 'N/A' }}</h1>
                <button id="visitNowBtn" class="btn btn-primary">
                    <i class="fas fa-map-marker-alt me-2"></i>Visit This Place
                </button>
            </div>
        </div>

        <!-- Main Content Section -->
        <div class="container main-content">
            <div class="row">
                <!-- Details Section -->
                <div class="col-md-6 details-section">
                    <div class="details-card">
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
                            <p><strong>Rating:</strong>
                                {{ $place['rating'] ? $place['rating'] . ' Stars' : 'N/A' }}
                                @if($place['rating'])
                                <span class="rating-stars">
                                    @for($i = 0; $i < floor($place['rating']); $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                    @if($place['rating'] - floor($place['rating']) >= 0.5)
                                        <i class="fas fa-star-half-alt"></i>
                                    @endif
                                </span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Images Section -->
                <div class="col-md-6 images-section">
                    <div class="images-card">
                        <h2 class="section-title">Photos</h2>
                        @if($place['image'])
                            <img src="{{ $place['image'] }}" alt="{{ $place['name'] ?? 'Place Image' }}" class="main-image">
                        @else
                            <div class="no-image">
                                <i class="fas fa-image"></i>
                                <p>No main image available.</p>
                            </div>
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
                                <button class="gallery-prev"><i class="fas fa-chevron-left"></i></button>
                                <button class="gallery-next"><i class="fas fa-chevron-right"></i></button>
                            </div>
                        @else
                            <div class="no-image">
                                <i class="fas fa-images"></i>
                                <p>No gallery images available.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!-- Visit Now Modal -->
    <div class="modal fade" id="visitNowModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-plane me-2"></i>Visit {{ $place['name'] ?? 'Place' }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" style="max-height: 80vh; overflow-y: auto;">
                    <form id="bookingForm">
                        <div class="mb-3">
                            <label for="pickupDistrict" class="form-label">Pickup District</label>
                            <select class="form-select" id="pickupDistrict" name="pickup_district" required>
                                <option value="">Select District</option>
                                <option value="Colombo">Colombo</option>
                                <option value="Gampaha">Gampaha</option>
                                <option value="Kalutara">Kalutara</option>
                                <option value="Kandy">Kandy</option>
                                <option value="Matale">Matale</option>
                                <option value="Nuwara Eliya">Nuwara Eliya</option>
                                <option value="Galle">Galle</option>
                                <option value="Matara">Matara</option>
                                <option value="Hambantota">Hambantota</option>
                                <option value="Jaffna">Jaffna</option>
                                <option value="Mannar">Mannar</option>
                                <option value="Vavuniya">Vavuniya</option>
                                <option value="Mullaitivu">Mullaitivu</option>
                                <option value="Kilinochchi">Kilinochchi</option>
                                <option value="Batticaloa">Batticaloa</option>
                                <option value="Ampara">Ampara</option>
                                <option value="Trincomalee">Trincomalee</option>
                                <option value="Kurunegala">Kurunegala</option>
                                <option value="Puttalam">Puttalam</option>
                                <option value="Anuradhapura">Anuradhapura</option>
                                <option value="Polonnaruwa">Polonnaruwa</option>
                                <option value="Badulla">Badulla</option>
                                <option value="Monaragala">Monaragala</option>
                                <option value="Ratnapura">Ratnapura</option>
                                <option value="Kegalle">Kegalle</option>
                            </select>
                        </div>
                        <div class="mb-3" style="position: relative;">
                            <label for="pickupLocation" class="form-label">Specific Pickup Location</label>
                            <input type="text"
                                   class="form-control"
                                   id="pickupLocation"
                                   name="pickup_location"
                                   placeholder="e.g., No. 123, Main Street, Jaffna"
                                   autocomplete="off"
                                   required>
                            <!-- Suggestions dropdown -->
                            <ul id="locationSuggestions"
                                style="position: absolute;
                                       top: 100%;
                                       left: 0;
                                       right: 0;
                                       background: white;
                                       border: 1px solid #ccc;
                                       border-radius: 6px;
                                       z-index: 999;
                                       list-style: none;
                                       margin-top: 2px;
                                       padding: 0;
                                       display: none;
                                       max-height: 180px;
                                       overflow-y: auto;">
                            </ul>
                            <!-- Hidden coordinate fields -->
                            <input type="hidden" name="latitude" id="latitude">
                            <input type="hidden" name="longitude" id="longitude">
                            <button type="button" id="getLocationBtn" class="btn btn-success btn-sm mt-2">
                                <i class="fas fa-location-arrow"></i> Use My Current Location
                            </button>
                        </div>
                        <!-- Map container -->
                        <div id="map" style="height: 300px; width: 100%; border-radius: 10px; margin-top: 10px;"></div>
                        <div class="mb-3">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="fullName" name="full_name" placeholder="Enter your full name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="your.email@gmail.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="peopleCount" class="form-label">Number of People</label>
                            <input type="number" class="form-control" id="peopleCount" name="people_count" min="1" max="12" value="1" required>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                        <div class="mb-3">
                            <label for="time" class="form-label">Time</label>
                            <input type="time" class="form-control" id="time" name="time" required>
                        </div>
                        <div class="mb-3">
                            <label for="vehicleSelect" class="form-label">Select Vehicle</label>
                            <select class="form-select" id="vehicleSelect" name="vehicle_id" required>
                                <option value="">Loading vehicles...</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="guiderSelect" class="form-label">Do you want a guider?</label>
                            <select class="form-select" id="guiderSelect" name="guider" required>
                                <option value="no">No</option>
                                <option value="yes">Yes</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <p class="fs-5"><strong>Total Price: $<span id="totalPrice">0.00</span></strong></p>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-3 fw-bold">
                            <i class="fas fa-check-circle me-2"></i>Order Now
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Leaflet CSS & JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

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

            let autoSlide = setInterval(() => {
                currentIndex = (currentIndex + 1) % totalSlides;
                updateSlider();
            }, 5000);

            galleryWrapper.addEventListener('mouseenter', () => clearInterval(autoSlide));
            galleryWrapper.addEventListener('mouseleave', () => {
                autoSlide = setInterval(() => {
                    currentIndex = (currentIndex + 1) % totalSlides;
                    updateSlider();
                }, 5000);
            });
        }

        // Visit Now Modal
        const visitNowBtn = document.getElementById('visitNowBtn');
        const modal = new bootstrap.Modal(document.getElementById('visitNowModal'));
        const form = document.getElementById('bookingForm');
        const vehicleSelect = document.getElementById('vehicleSelect');
        const guiderSelect = document.getElementById('guiderSelect');
        const totalPriceSpan = document.getElementById('totalPrice');
        const pickupDistrict = document.getElementById('pickupDistrict');
        const peopleCount = document.getElementById('peopleCount');

        console.log('Script loaded, visitNowBtn:', visitNowBtn);

        if (visitNowBtn) {
            visitNowBtn.addEventListener('click', () => {
                console.log('Visit Now clicked');
                modal.show();
                // Set min date to today
                const today = new Date().toISOString().split('T')[0];
                document.getElementById('date').min = today;
                // Re-init map if needed
                initMap();
            });
        }

        // --- Initialize map ---
        let map, marker;
        function initMap() {
            if (map) return; // Already initialized
            map = L.map('map').setView([7.8731, 80.7718], 7); // Default Sri Lanka center
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            function updateMap(lat, lon) {
                if (marker) map.removeLayer(marker);
                marker = L.marker([lat, lon]).addTo(map);
                map.setView([lat, lon], 13);
            }

            // --- Reverse geocode helper ---
            function reverseGeocode(lat, lon) {
                fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}&addressdetails=1`)
                    .then(res => res.json())
                    .then(data => {
                        const displayName = data.display_name || `${lat}, ${lon}`;
                        // Prefer address components for more precise location name
                        const address = data.address;
                        if (address && address.road && address.house_number) {
                            document.getElementById('pickupLocation').value = `${address.house_number}, ${address.road}, ${address.city || address.town || address.village || ''}`;
                        } else {
                            document.getElementById('pickupLocation').value = displayName;
                        }
                        document.getElementById('latitude').value = lat;
                        document.getElementById('longitude').value = lon;
                    })
                    .catch(() => {
                        document.getElementById('pickupLocation').value = `${lat}, ${lon}`;
                        document.getElementById('latitude').value = lat;
                        document.getElementById('longitude').value = lon;
                    });
            }

            // --- Map click event ---
            map.on('click', function(e) {
                const lat = e.latlng.lat;
                const lon = e.latlng.lng;
                updateMap(lat, lon);
                reverseGeocode(lat, lon);
            });

            // --- Use My Current Location ---
            const btn = document.getElementById('getLocationBtn');
            if (btn) {
                btn.addEventListener('click', function() {
                    if (!navigator.geolocation) {
                        alert('Geolocation not supported by this browser.');
                        return;
                    }
                    btn.disabled = true;
                    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Getting location...';
                    navigator.geolocation.getCurrentPosition(success, error);
                });
                function success(position) {
                    const lat = position.coords.latitude;
                    const lon = position.coords.longitude;
                    document.getElementById('latitude').value = lat;
                    document.getElementById('longitude').value = lon;
                    updateMap(lat, lon);
                    reverseGeocode(lat, lon);
                    btn.innerHTML = '<i class="fas fa-location-arrow"></i> Use My Current Location';
                    btn.disabled = false;
                }
                function error() {
                    alert('Unable to retrieve location. Please ensure location services are enabled.');
                    btn.innerHTML = '<i class="fas fa-location-arrow"></i> Use My Current Location';
                    btn.disabled = false;
                }
            }

            // --- Autocomplete ---
            const input = document.getElementById('pickupLocation');
            const suggestionsBox = document.getElementById('locationSuggestions');
            let typingTimer;
            if (input && suggestionsBox) {
                input.addEventListener('input', function() {
                    clearTimeout(typingTimer);
                    const query = this.value.trim();
                    if (query.length < 3) {
                        suggestionsBox.style.display = 'none';
                        return;
                    }
                    typingTimer = setTimeout(() => fetchSuggestions(query), 400);
                });

                function fetchSuggestions(query) {
                    // Enhanced for Sri Lanka: limit to country code LK for better relevance
                    const district = document.getElementById('pickupDistrict').value;
                    let url = `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(query)}&limit=5&countrycodes=lk`;
                    // Optional: bound to Sri Lanka bbox for even better results (left,bottom,right,top)
                    url += `&bounded=1&viewbox=79.4,5.9,81.9,9.8`;
                    // If district selected, try to filter further (approximate bbox per district, but simplified here)
                    if (district) {
                        // You can add district-specific viewbox here if needed, e.g., for Colombo: 79.8,6.8,80.0,7.0
                        // For now, country-level is sufficient
                    }
                    fetch(url)
                        .then(res => res.json())
                        .then(data => {
                            suggestionsBox.innerHTML = '';
                            if (!data || !data.length) {
                                const li = document.createElement('li');
                                li.textContent = 'No places found in Sri Lanka. Try a different search.';
                                li.style.padding = '8px 10px';
                                li.style.color = '#999';
                                li.style.cursor = 'not-allowed';
                                suggestionsBox.appendChild(li);
                                suggestionsBox.style.display = 'block';
                                return;
                            }
                            data.forEach(place => {
                                const li = document.createElement('li');
                                li.textContent = place.display_name;
                                li.style.padding = '8px 10px';
                                li.style.cursor = 'pointer';
                                li.addEventListener('click', () => {
                                    input.value = place.display_name;
                                    document.getElementById('latitude').value = place.lat;
                                    document.getElementById('longitude').value = place.lon;
                                    suggestionsBox.style.display = 'none';
                                    updateMap(parseFloat(place.lat), parseFloat(place.lon));
                                });
                                li.addEventListener('mouseenter', () => li.style.background = '#f0f0f0');
                                li.addEventListener('mouseleave', () => li.style.background = 'white');
                                suggestionsBox.appendChild(li);
                            });
                            suggestionsBox.style.display = 'block';
                        })
                        .catch(err => {
                            console.error('Suggestions fetch error:', err);
                            suggestionsBox.innerHTML = '';
                            const li = document.createElement('li');
                            li.textContent = 'Error loading suggestions. Please try again.';
                            li.style.padding = '8px 10px';
                            li.style.color = '#999';
                            suggestionsBox.appendChild(li);
                            suggestionsBox.style.display = 'block';
                        });
                }

                // Hide suggestions on outside click
                document.addEventListener('click', function(e) {
                    if (!suggestionsBox.contains(e.target) && e.target !== input) {
                        suggestionsBox.style.display = 'none';
                    }
                });
            }

            // Optional: Listen for district change to adjust map view or refetch suggestions
            const pickupDistrictEl = document.getElementById('pickupDistrict');
            if (pickupDistrictEl) {
                pickupDistrictEl.addEventListener('change', function() {
                    const district = this.value;
                    if (district && map) {
                        // Approximate centers for districts (you can expand this map)
                        const districtCenters = {
                            'Colombo': [6.9271, 79.8612],
                            'Gampaha': [7.0906, 79.9947],
                            'Kalutara': [6.5833, 79.9667],
                            'Kandy': [7.2906, 80.6337],
                            'Matale': [7.4667, 80.6167],
                            'Nuwara Eliya': [6.9706, 80.7892],
                            'Galle': [6.0533, 80.2167],
                            'Matara': [5.9489, 80.5353],
                            'Hambantota': [6.1244, 81.1183],
                            'Jaffna': [9.6619, 80.0075],
                            'Mannar': [8.775, 79.65],
                            'Vavuniya': [8.6219, 80.4971],
                            'Mullaitivu': [9.25, 80.75],
                            'Kilinochchi': [9.4, 80.4],
                            'Batticaloa': [7.715, 81.685],
                            'Ampara': [7.3, 81.85],
                            'Trincomalee': [8.5874, 81.2152],
                            'Kurunegala': [7.4833, 80.3667],
                            'Puttalam': [8.0333, 79.8333],
                            'Anuradhapura': [8.3114, 80.4037],
                            'Polonnaruwa': [7.9333, 81.0],
                            'Badulla': [6.9944, 81.0542],
                            'Monaragala': [6.8736, 81.35],
                            'Ratnapura': [6.6894, 80.3936],
                            'Kegalle': [6.9, 80.35]
                        };
                        if (districtCenters[district]) {
                            const [lat, lon] = districtCenters[district];
                            map.setView([lat, lon], 10);
                            // Clear marker if present
                            if (marker) map.removeLayer(marker);
                            marker = null;
                        }
                    }
                });
            }
        }

        // Fetch vehicles
        fetch('http://127.0.0.1:8000/api/vehicles', {
            headers: {
                'Authorization': 'Bearer 1|8OImmqdUzzCwAOzoksoHFeOjpz1iSWSLTbTL3geC43aa48db',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            console.log('Vehicles API response status:', response.status);
            if (!response.ok) throw new Error('Failed to fetch vehicles: ' + response.status);
            return response.json();
        })
        .then(vehicles => {
            console.log('Vehicles data:', vehicles);
            vehicleSelect.innerHTML = '<option value="">Select Vehicle</option>';
            if (vehicles.length === 0) {
                vehicleSelect.innerHTML = '<option value="">No vehicles available</option>';
            } else {
                vehicles.forEach(vehicle => {
                    const option = document.createElement('option');
                    option.value = vehicle.id;
                    option.textContent = `${vehicle.type} (${vehicle.seat_count} seats) - Base $${vehicle.base_price}`;
                    option.dataset.type = vehicle.type.toLowerCase();
                    option.dataset.seats = vehicle.seat_count;
                    vehicleSelect.appendChild(option);
                });
            }
        })
        .catch(error => {
            console.error('Error loading vehicles:', error);
            vehicleSelect.innerHTML = '<option value="">No vehicles available</option>';
        });

        // Vehicle disabling logic based on people count
        peopleCount.addEventListener('change', function() {
            const people = parseInt(this.value) || 0;
            const options = vehicleSelect.querySelectorAll('option:not([value=""])');
            options.forEach(option => {
                const type = option.dataset.type;
                const seats = parseInt(option.dataset.seats) || 0;
                let disabled = false;
                // Disable bike if >2 people (assuming bike has <=2 seats or type includes 'bike')
                if ((seats <= 2 || type.includes('bike')) && people > 2) {
                    disabled = true;
                }
                // Disable three-wheeler if >3 people (assuming 3 seats or type includes 'three-wheeler')
                if ((seats === 3 || type.includes('three-wheeler') || type.includes('tuk-tuk')) && people > 3) {
                    disabled = true;
                }
                option.disabled = disabled;
            });
            // Trigger price calculation
            calculatePrice();
        });

        // Calculate price
        const priceElements = [pickupDistrict, peopleCount, vehicleSelect, guiderSelect];
        priceElements.forEach(element => {
            element.addEventListener('change', calculatePrice);
        });

        function calculatePrice() {
            const district = pickupDistrict.value;
            const people = parseInt(peopleCount.value);
            const vehicleId = vehicleSelect.value;
            const guider = guiderSelect.value;
            if (!district || !people || !vehicleId) {
                totalPriceSpan.textContent = '0.00';
                return;
            }

            const districtMatrix = {
                'Colombo': 0, 'Gampaha': 1, 'Kalutara': 2, 'Kandy': 3, 'Matale': 4,
                'Nuwara Eliya': 5, 'Galle': 6, 'Matara': 7, 'Hambantota': 8, 'Jaffna': 9,
                'Mannar': 10, 'Vavuniya': 11, 'Mullaitivu': 12, 'Kilinochchi': 13,
                'Batticaloa': 14, 'Ampara': 15, 'Trincomalee': 16, 'Kurunegala': 17,
                'Puttalam': 18, 'Anuradhapura': 19, 'Polonnaruwa': 20, 'Badulla': 21,
                'Monaragala': 22, 'Ratnapura': 23, 'Kegalle': 24
            };

            const placeDistrict = '{{ $place['district'] ?? 'Jaffna' }}';
            const distance = Math.abs(districtMatrix[district] - districtMatrix[placeDistrict]);
            const basePrice = 50;
            const extraPrice = distance * 10;
            const guiderPrice = guider === 'yes' ? 20 : 0;
            const totalPrice = (basePrice + extraPrice + guiderPrice) * people;
            totalPriceSpan.textContent = totalPrice.toFixed(2);
        }

        // Submit booking
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(form);
            formData.append('place_id', '{{ $place['id'] ?? '' }}');
            formData.append('total_price', totalPriceSpan.textContent);

            console.log('Form data:', Object.fromEntries(formData));

            // Show loading state
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<span class="loading me-2"></span> Processing...';
            submitBtn.disabled = true;

            fetch('http://127.0.0.1:8000/api/bookings', {
                method: 'POST',
                headers: {
                    'Authorization': 'Bearer 1|8OImmqdUzzCwAOzoksoHFeOjpz1iSWSLTbTL3geC43aa48db',
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(response => {
                console.log('Booking API response status:', response.status);
                if (!response.ok) {
                    return response.json().then(err => { throw new Error(JSON.stringify(err)) });
                }
                return response.json();
            })
            .then(data => {
                console.log('Booking response:', data);

                // Show success message with animation
                const successAlert = document.createElement('div');
                successAlert.className = 'alert alert-success alert-dismissible fade show mt-3';
                successAlert.innerHTML = `
                    <i class="fas fa-check-circle me-2"></i>
                    <strong>Success!</strong> Your booking has been created. ID: ${data.booking_id}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                `;
                form.prepend(successAlert);

                // Reset form after delay
                setTimeout(() => {
                    modal.hide();
                    form.reset();
                    totalPriceSpan.textContent = '0.00';
                    vehicleSelect.innerHTML = '<option value="">Select Vehicle</option>';
                    if (marker) map.removeLayer(marker);
                    marker = null;
                    successAlert.remove();
                }, 3000);
            })
            .catch(error => {
                console.error('Booking error:', error);

                // Show error message
                const errorAlert = document.createElement('div');
                errorAlert.className = 'alert alert-danger alert-dismissible fade show mt-3';
                errorAlert.innerHTML = `
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>Error!</strong> Failed to create booking: ${error.message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                `;
                form.prepend(errorAlert);
            })
            .finally(() => {
                // Restore button state
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            });
        });
    });
    </script>
</body>
</html>
