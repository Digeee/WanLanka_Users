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
        <div class="content-wrapper">
            <!-- Sidebar Filter -->
            <div class="filter-sidebar">
                <div class="filter-header">
                    <h3>Filter Places</h3>
                    <button class="clear-filters-btn">Clear All</button>
                </div>

                <!-- Province Filter -->
                <div class="filter-group">
                    <h4>Provinces</h4>
                    <div class="filter-options">
                        @php
                            $provinces = array_unique(array_column($places, 'province'));
                            sort($provinces);
                        @endphp
                        @foreach($provinces as $province)
                            @if($province)
                                <label class="filter-option">
                                    <input type="checkbox" name="province" value="{{ $province }}" {{ $province == $provinceName ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                    {{ $province }}
                                </label>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- District Filter -->
                <div class="filter-group">
                    <h4>Districts</h4>
                    <div class="filter-options">
                        @php
                            $districts = array_unique(array_column($places, 'district'));
                            sort($districts);
                        @endphp
                        @foreach($districts as $district)
                            @if($district)
                                <label class="filter-option">
                                    <input type="checkbox" name="district" value="{{ $district }}">
                                    <span class="checkmark"></span>
                                    {{ $district }}
                                </label>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- Rating Filter -->
                <div class="filter-group">
                    <h4>Rating</h4>
                    <div class="filter-options">
                        <label class="filter-option">
                            <input type="checkbox" name="rating" value="5">
                            <span class="checkmark"></span>
                            <span class="rating-stars">
                                ★★★★★ <span class="rating-text">5 Stars</span>
                            </span>
                        </label>
                        <label class="filter-option">
                            <input type="checkbox" name="rating" value="4">
                            <span class="checkmark"></span>
                            <span class="rating-stars">
                                ★★★★☆ <span class="rating-text">4+ Stars</span>
                            </span>
                        </label>
                        <label class="filter-option">
                            <input type="checkbox" name="rating" value="3">
                            <span class="checkmark"></span>
                            <span class="rating-stars">
                                ★★★☆☆ <span class="rating-text">3+ Stars</span>
                            </span>
                        </label>
                    </div>
                </div>

                <!-- Type Filter -->
                <div class="filter-group">
                    <h4>Place Type</h4>
                    <div class="filter-options">
                        @php
                            $types = ['Beach', 'Mountain', 'Cultural', 'Historical', 'Nature', 'Adventure', 'Religious', 'Swimming'];
                        @endphp
                        @foreach($types as $type)
                            <label class="filter-option">
                                <input type="checkbox" name="type" value="{{ strtolower($type) }}">
                                <span class="checkmark"></span>
                                {{ $type }}
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <!-- Mobile Filter Toggle -->
                <div class="mobile-filter-toggle">
                    <button class="btn filter-toggle-btn">
                        <i class="filter-icon">☰</i> Filter Places
                    </button>
                </div>

                <!-- District Filter Buttons -->
                <div class="district-filter mb-4">
                    <button class="btn district-btn active" data-district="all">All</button>
                    @foreach($districts as $district)
                        @if($district)
                            <button class="btn district-btn" data-district="{{ $district }}">{{ $district }}</button>
                        @endif
                    @endforeach
                </div>

                <!-- Places Grid -->
                <div class="places-grid">
                    @forelse($places as $place)
                        <div class="place-card"
                             data-district="{{ $place['district'] ?? 'N/A' }}"
                             data-province="{{ $place['province'] ?? 'N/A' }}"
                             data-rating="{{ $place['rating'] ?? 0 }}"
                             data-type="{{ $place['type'] ?? 'general' }}">
                            <img src="{{ $place['image'] ?? asset('images/default-place.jpg') }}" alt="{{ $place['name'] }}" class="place-image">
                            <div class="place-content">
                                <h3 class="place-title">{{ $place['name'] }}</h3>
                                <p class="place-location">{{ $place['district'] ?? 'N/A' }}</p>
                                <div class="place-meta">
                                    <span class="place-rating">
                                        @php
                                            $rating = $place['rating'] ?? 0;
                                            $fullStars = floor($rating);
                                            $halfStar = $rating - $fullStars >= 0.5;
                                        @endphp
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $fullStars)
                                                <span class="star full">★</span>
                                            @elseif($i == $fullStars + 1 && $halfStar)
                                                <span class="star half">★</span>
                                            @else
                                                <span class="star empty">★</span>
                                            @endif
                                        @endfor
                                        <span class="rating-value">{{ number_format($rating, 1) }}</span>
                                    </span>
                                    <span class="place-type">{{ $place['type'] ?? 'General' }}</span>
                                </div>
                                <p class="place-description">
                                    {{ $place['description'] ?? 'N/A' }}
                                </p>
                                <a href="{{ route('places.show', $place['slug']) }}" class="read-more-btn">View Details</a>
                            </div>
                        </div>
                    @empty
                        <p class="text-center">No places found in {{ $provinceName }}.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Base Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Montserrat', 'Helvetica Neue', Arial, sans-serif;
    color: #333;
    line-height: 1.6;
    background-color: #f8f9fa;
}

.container {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 15px;
}

.text-center {
    text-align: center;
}

/* Province Header Section */
.province-details-header {
    background: linear-gradient(135deg, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0.4) 100%),
                url('https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?ixlib=rb-4.0.3') no-repeat center center;
    background-size: cover;
    color: white;
    padding: 120px 0;
    position: relative;
    overflow: hidden;
}

.province-details-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
    opacity: 0.8;
    z-index: -1;
}

.section-title {
    font-weight: 700;
    margin-bottom: 25px;
    overflow: hidden;
    position: relative;
}

.section-title::after {
    content: '';
    display: block;
    width: 80px;
    height: 3px;
    background: linear-gradient(to right, transparent, #e74c3c, transparent);
    margin: 15px auto;
}

.title-line {
    display: block;
    font-size: 3rem;
    letter-spacing: 2px;
    text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
    opacity: 0;
    transform: translateY(30px);
    animation: fadeInUp 1s forwards;
}

.title-line-1 {
    color: #fff;
    font-weight: 700;
}

.title-line-2 {
    color: #f1c40f;
    font-style: italic;
    font-weight: 400;
    animation-delay: 0.4s;
}

.section-subtitle {
    margin-bottom: 40px;
    font-size: 1.3rem;
    font-weight: 300;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 1s 0.8s forwards;
}

.subtitle-line {
    display: inline-block;
    padding: 5px 0;
    position: relative;
}

.subtitle-line::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 40%;
    height: 1px;
    background: linear-gradient(to right, transparent, #fff, transparent);
}

/* Content Wrapper */
.content-wrapper {
    display: flex;
    gap: 30px;
    position: relative;
    z-index: 1;
}

/* Filter Sidebar */
.filter-sidebar {
    width: 280px;
    background: white;
    border-radius: 10px;
    padding: 25px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    height: fit-content;
    position: sticky;
    top: 20px;
    transition: all 0.3s ease;
}

.filter-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
    padding-bottom: 15px;
    border-bottom: 1px solid #eee;
}

.filter-header h3 {
    font-size: 1.3rem;
    color: #2c3e50;
    margin: 0;
}

.clear-filters-btn {
    background: none;
    border: none;
    color: #e74c3c;
    font-size: 0.9rem;
    cursor: pointer;
    transition: color 0.3s ease;
}

.clear-filters-btn:hover {
    color: #c0392b;
    text-decoration: underline;
}

.filter-group {
    margin-bottom: 25px;
}

.filter-group h4 {
    font-size: 1rem;
    color: #2c3e50;
    margin-bottom: 15px;
    font-weight: 600;
}

.filter-options {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.filter-option {
    display: flex;
    align-items: center;
    cursor: pointer;
    padding: 5px 0;
    transition: color 0.3s ease;
}

.filter-option:hover {
    color: #3498db;
}

.filter-option input {
    display: none;
}

.checkmark {
    width: 18px;
    height: 18px;
    border: 2px solid #ddd;
    border-radius: 3px;
    margin-right: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.filter-option input:checked + .checkmark {
    background-color: #3498db;
    border-color: #3498db;
}

.filter-option input:checked + .checkmark::after {
    content: '✓';
    color: white;
    font-size: 12px;
    font-weight: bold;
}

.rating-stars {
    display: flex;
    align-items: center;
}

.rating-text {
    margin-left: 8px;
    font-size: 0.9rem;
}

/* Main Content */
.main-content {
    flex: 1;
}

.mobile-filter-toggle {
    display: none;
    margin-bottom: 20px;
}

.filter-toggle-btn {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 20px;
    background: #3498db;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s ease;
}

.filter-toggle-btn:hover {
    background: #2980b9;
}

/* Places Section */
.province-places-section {
    padding: 100px 0;
    background: url('https://images.unsplash.com/photo-1519046904884-53103b34b206?ixlib=rb-4.0.3') fixed;
    background-size: cover;
    position: relative;
}

.province-places-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.92);
}

/* District Filter */
.district-filter {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    justify-content: center;
    margin-bottom: 50px;
    position: relative;
    z-index: 2;
}

.district-btn {
    padding: 12px 25px;
    border: 2px solid #3498db;
    border-radius: 30px;
    background: #fff;
    color: #3498db;
    cursor: pointer;
    transition: all 0.3s ease;
    font-weight: 600;
    letter-spacing: 0.5px;
    position: relative;
    overflow: hidden;
}

.district-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(52, 152, 219, 0.1), transparent);
    transition: all 0.6s ease;
}

.district-btn:hover::before {
    left: 100%;
}

.district-btn:hover, .district-btn.active {
    background: linear-gradient(135deg, #3498db 0%, #2c3e50 100%);
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(52, 152, 219, 0.3);
}

/* Places Grid */
.places-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    position: relative;
    z-index: 1;
}

.place-card {
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.4s ease;
    opacity: 0;
    transform: translateY(30px) scale(0.95);
    position: relative;
    display: flex;
    flex-direction: column;
}

.place-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, 0.1) 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: 1;
    pointer-events: none;
}

.place-card.animate {
    opacity: 1;
    transform: translateY(0) scale(1);
}

.place-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
}

.place-card:hover::before {
    opacity: 1;
}

.place-image {
    width: 100%;
    height: 220px;
    object-fit: cover;
    transition: transform 0.7s ease;
}

.place-card:hover .place-image {
    transform: scale(1.1);
}

.place-content {
    padding: 20px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.place-title {
    font-size: 1.5rem;
    margin-bottom: 10px;
    color: #2c3e50;
    font-weight: 700;
}

.place-location {
    color: #e74c3c;
    margin-bottom: 15px;
    font-size: 0.9rem;
    display: flex;
    align-items: center;
}

.place-location::before {
    content: '📍';
    margin-right: 5px;
}

.place-meta {
    display: flex;
    justify-content: space-between;
    margin-bottom: 15px;
    font-size: 0.9rem;
}

.place-rating {
    display: flex;
    align-items: center;
}

.star {
    color: #f1c40f;
    margin-right: 2px;
}

.star.empty {
    color: #ddd;
}

.rating-value {
    margin-left: 5px;
    color: #7f8c8d;
    font-weight: 600;
}

.place-type {
    background: #ecf0f1;
    padding: 3px 8px;
    border-radius: 15px;
    font-size: 0.8rem;
    color: #7f8c8d;
}

.place-description {
    color: #555;
    margin-bottom: 25px;
    line-height: 1.7;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    flex-grow: 1;
}

.read-more-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 12px 25px;
    background: linear-gradient(135deg, #3498db 0%, #2c3e50 100%);
    color: white;
    text-decoration: none;
    border-radius: 30px;
    font-weight: 600;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    z-index: 3;
    margin-top: auto;
}

.read-more-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: all 0.6s ease;
    z-index: -1;
}

.read-more-btn:hover::before {
    left: 100%;
}

.read-more-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
}

/* No places message */
.province-places-section .text-center {
    grid-column: 1 / -1;
    padding: 60px 0;
    font-size: 1.2rem;
    color: #7f8c8d;
}

/* Filter animation classes */
.place-card.hide {
    animation: fadeOut 0.5s forwards;
}

.place-card.show {
    animation: fadeIn 0.5s forwards;
}

/* Animations */
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

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeOut {
    from {
        opacity: 1;
        transform: translateY(0);
    }
    to {
        opacity: 0;
        transform: translateY(20px);
    }
}

/* Responsive Design */
@media (max-width: 1024px) {
    .places-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .filter-sidebar {
        width: 250px;
    }
}

@media (max-width: 768px) {
    .province-details-header {
        padding: 80px 0;
    }

    .title-line {
        font-size: 2.2rem;
    }

    .content-wrapper {
        flex-direction: column;
    }

    .filter-sidebar {
        width: 100%;
        position: static;
        margin-bottom: 30px;
        display: none;
    }

    .filter-sidebar.active {
        display: block;
    }

    .mobile-filter-toggle {
        display: block;
    }

    .places-grid {
        grid-template-columns: 1fr;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }

    .section-subtitle {
        font-size: 1.1rem;
    }

    .district-filter {
        flex-direction: column;
        align-items: center;
    }

    .district-btn {
        width: 200px;
    }
}

@media (max-width: 480px) {
    .title-line {
        font-size: 1.8rem;
    }

    .place-title {
        font-size: 1.3rem;
    }

    .read-more-btn {
        padding: 10px 20px;
    }

    .place-meta {
        flex-direction: column;
        gap: 10px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // District filtering functionality
    const buttons = document.querySelectorAll('.district-btn');
    const placeCards = document.querySelectorAll('.place-card');
    const filterSidebar = document.querySelector('.filter-sidebar');
    const filterToggleBtn = document.querySelector('.filter-toggle-btn');
    const clearFiltersBtn = document.querySelector('.clear-filters-btn');

    // Mobile filter toggle
    if (filterToggleBtn) {
        filterToggleBtn.addEventListener('click', function() {
            filterSidebar.classList.toggle('active');
        });
    }

    // Clear all filters
    if (clearFiltersBtn) {
        clearFiltersBtn.addEventListener('click', function() {
            // Uncheck all filter checkboxes
            const checkboxes = document.querySelectorAll('.filter-sidebar input[type="checkbox"]');
            checkboxes.forEach(checkbox => {
                checkbox.checked = false;
            });

            // Reset district buttons
            buttons.forEach(btn => btn.classList.remove('active'));
            document.querySelector('.district-btn[data-district="all"]').classList.add('active');

            // Show all places
            filterPlaces('all');
        });
    }

    // Add click event to filter buttons
    buttons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            buttons.forEach(btn => btn.classList.remove('active'));

            // Add active class to clicked button
            this.classList.add('active');

            const selectedDistrict = this.getAttribute('data-district');

            // Filter places
            filterPlaces(selectedDistrict);
        });
    });

    // Add change event to sidebar filters
    const filterCheckboxes = document.querySelectorAll('.filter-sidebar input[type="checkbox"]');
    filterCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', applyFilters);
    });

    // Apply all filters function
    function applyFilters() {
        const selectedProvinces = getSelectedValues('province');
        const selectedDistricts = getSelectedValues('district');
        const selectedRatings = getSelectedValues('rating');
        const selectedTypes = getSelectedValues('type');

        placeCards.forEach(card => {
            const cardProvince = card.getAttribute('data-province');
            const cardDistrict = card.getAttribute('data-district');
            const cardRating = parseFloat(card.getAttribute('data-rating'));
            const cardType = card.getAttribute('data-type');

            const provinceMatch = selectedProvinces.length === 0 || selectedProvinces.includes(cardProvince);
            const districtMatch = selectedDistricts.length === 0 || selectedDistricts.includes(cardDistrict);
            const ratingMatch = selectedRatings.length === 0 || selectedRatings.some(r => cardRating >= parseFloat(r));
            const typeMatch = selectedTypes.length === 0 || selectedTypes.includes(cardType);

            if (provinceMatch && districtMatch && ratingMatch && typeMatch) {
                // Show matching cards
                card.classList.remove('hide');
                setTimeout(() => {
                    card.style.display = 'flex';
                    card.classList.add('show');
                }, 50);
            } else {
                // Hide non-matching cards with animation
                card.classList.add('hide');
                card.classList.remove('show');
                setTimeout(() => {
                    card.style.display = 'none';
                }, 500);
            }
        });
    }

    // Helper function to get selected values from checkboxes
    function getSelectedValues(name) {
        const checkboxes = document.querySelectorAll(`input[name="${name}"]:checked`);
        return Array.from(checkboxes).map(checkbox => checkbox.value);
    }

    // Filter function with animation
    function filterPlaces(district) {
        placeCards.forEach(card => {
            const cardDistrict = card.getAttribute('data-district');

            if (district === 'all' || cardDistrict === district) {
                // Show matching cards
                card.classList.remove('hide');
                setTimeout(() => {
                    card.style.display = 'flex';
                    card.classList.add('show');
                }, 50);
            } else {
                // Hide non-matching cards with animation
                card.classList.add('hide');
                card.classList.remove('show');
                setTimeout(() => {
                    card.style.display = 'none';
                }, 500);
            }
        });
    }

    // Animate place cards on scroll
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.15
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const card = entry.target;
                const index = Array.from(placeCards).indexOf(card);

                // Add delay based on index for staggered animation
                setTimeout(() => {
                    card.classList.add('animate');
                }, index * 150);

                observer.unobserve(card);
            }
        });
    }, observerOptions);

    // Observe each place card
    placeCards.forEach(card => {
        observer.observe(card);
    });

    // Parallax effect for header
    const header = document.querySelector('.province-details-header');
    if (header) {
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const rate = scrolled * -0.5;
            header.style.backgroundPosition = `center ${rate}px`;
        });
    }
});
</script>

@include('include.footer')
