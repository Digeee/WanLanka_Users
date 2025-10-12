<div class="tourism-slider">
    <div class="slider-container">
        <!-- Slide 1 -->
        <input type="radio" name="slider" id="slide-1" checked>
        <div class="slide active">
            <div class="slide-image">
                <img src="{{ asset('images/slider-image-1.jpg') }}" alt="Beautiful mountain landscape">
            </div>
            <div class="slide-content">
                <div class="slide-tag">Adventure</div>
                <h2 class="slide-title">Discover Majestic Mountains</h2>
                <p class="slide-description">Experience breathtaking views and thrilling adventures in the world's most stunning mountain ranges.</p>
                <div class="slide-actions">
                    <a href="#" class="btn-primary">Explore Now</a>
                    <a href="#" class="btn-secondary">Learn More</a>
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <input type="radio" name="slider" id="slide-2">
        <div class="slide">
            <div class="slide-image">
                <img src="{{ asset('images/slider-image-2.jpg') }}" alt="Tropical beach">
            </div>
            <div class="slide-content">
                <div class="slide-tag">Relaxation</div>
                <h2 class="slide-title">Tropical Paradise Awaits</h2>
                <p class="slide-description">Unwind on pristine beaches with crystal clear waters and gentle ocean breezes.</p>
                <div class="slide-actions">
                    <a href="#" class="btn-primary">Book Now</a>
                    <a href="#" class="btn-secondary">View Packages</a>
                </div>
            </div>
        </div>

        <!-- Slide 3 -->
        <input type="radio" name="slider" id="slide-3">
        <div class="slide">
            <div class="slide-image">
                <img src="{{ asset('images/slider-image-3.jpg') }}" alt="City skyline at night">
            </div>
            <div class="slide-content">
                <div class="slide-tag">Urban</div>
                <h2 class="slide-title">Vibrant City Experiences</h2>
                <p class="slide-description">Immerse yourself in the culture, cuisine, and energy of the world's most exciting cities.</p>
                <div class="slide-actions">
                    <a href="#" class="btn-primary">Discover</a>
                    <a href="#" class="btn-secondary">Itineraries</a>
                </div>
            </div>
        </div>

        <!-- Slide 4 -->
        <input type="radio" name="slider" id="slide-4">
        <div class="slide">
            <div class="slide-image">
                <img src="{{ asset('images/slider-image-4.jpg') }}" alt="Historic architecture">
            </div>
            <div class="slide-content">
                <div class="slide-tag">Culture</div>
                <h2 class="slide-title">Journey Through History</h2>
                <p class="slide-description">Explore ancient ruins, historic landmarks, and cultural treasures from around the world.</p>
                <div class="slide-actions">
                    <a href="#" class="btn-primary">Explore</a>
                    <a href="#" class="btn-secondary">Tours</a>
                </div>
            </div>
        </div>

        <!-- Navigation Dots -->
        <div class="slider-nav">
            <label for="slide-1" class="nav-dot active" data-slide="1"></label>
            <label for="slide-2" class="nav-dot" data-slide="2"></label>
            <label for="slide-3" class="nav-dot" data-slide="3"></label>
            <label for="slide-4" class="nav-dot" data-slide="4"></label>
        </div>

        <!-- Scroll Down Indicator -->
        <div class="scroll-down">
            <div class="scroll-text">Discover More</div>
            <div class="scroll-arrow">
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
    </div>
</div>
