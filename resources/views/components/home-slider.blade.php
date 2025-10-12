<div class="tourism-slider">
    <div class="slider-container">
        <!-- Slide 1 -->
        <input type="radio" name="slider" id="slide-1" checked>
        <div class="slide active">
            <div class="slide-image">
                <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Beautiful mountain landscape">
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
                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Tropical beach">
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
                <img src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="City skyline at night">
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
                <img src="https://images.unsplash.com/photo-1555400112-7b719046d9d5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Historic architecture">
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
            <label for="slide-1" class="nav-dot"></label>
            <label for="slide-2" class="nav-dot"></label>
            <label for="slide-3" class="nav-dot"></label>
            <label for="slide-4" class="nav-dot"></label>
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

<style>
.tourism-slider {
    position: relative;
    width: 100%;
    height: 100vh;
    overflow: hidden;
    font-family: 'Poppins', sans-serif;
}

.slider-container {
    position: relative;
    width: 100%;
    height: 100%;
}

.slider-container input[type="radio"] {
    display: none;
}

.slide {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    transition: opacity 1.2s ease-in-out;
    display: flex;
    align-items: center;
}

.slide.active {
    opacity: 1;
}

.slide-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
}

.slide-image::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to right, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.4) 50%, rgba(0,0,0,0.1) 100%);
    z-index: 2;
}

.slide-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: brightness(0.9);
    transition: transform 10s ease;
}

.slide.active .slide-image img {
    transform: scale(1.05);
}

.slide-content {
    position: relative;
    z-index: 3;
    max-width: 600px;
    margin-left: 10%;
    color: white;
    transform: translateY(30px);
    opacity: 0;
    transition: all 0.8s ease 0.5s;
}

.slide.active .slide-content {
    transform: translateY(0);
    opacity: 1;
}

.slide-tag {
    display: inline-block;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: white;
    padding: 8px 20px;
    border-radius: 30px;
    font-size: 0.9rem;
    font-weight: 500;
    letter-spacing: 1px;
    margin-bottom: 20px;
    text-transform: uppercase;
}

.slide-title {
    font-size: 3.5rem;
    font-weight: 700;
    line-height: 1.1;
    margin-bottom: 20px;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
}

.slide-description {
    font-size: 1.2rem;
    line-height: 1.6;
    margin-bottom: 30px;
    max-width: 500px;
    font-weight: 300;
    opacity: 0.9;
}

.slide-actions {
    display: flex;
    gap: 15px;
}

.btn-primary, .btn-secondary {
    display: inline-block;
    padding: 15px 35px;
    border-radius: 50px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 1rem;
}

.btn-primary {
    background: linear-gradient(135deg, #ff7e5f, #feb47b);
    color: white;
    box-shadow: 0 8px 25px rgba(255, 126, 95, 0.4);
}

.btn-primary:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 30px rgba(255, 126, 95, 0.6);
}

.btn-secondary {
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: white;
}

.btn-secondary:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: translateY(-5px);
}

.slider-nav {
    position: absolute;
    bottom: 40px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 15px;
    z-index: 4;
}

.nav-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.5);
    cursor: pointer;
    transition: all 0.3s ease;
}

.nav-dot:hover {
    background: rgba(255, 255, 255, 0.8);
}

input[type="radio"]:checked + .slide ~ .slider-nav label[for="slide-1"],
input[type="radio"]#slide-1:checked ~ .slider-nav label[for="slide-1"],
input[type="radio"]#slide-2:checked ~ .slider-nav label[for="slide-2"],
input[type="radio"]#slide-3:checked ~ .slider-nav label[for="slide-3"],
input[type="radio"]#slide-4:checked ~ .slider-nav label[for="slide-4"] {
    background: white;
    transform: scale(1.3);
}

.scroll-down {
    position: absolute;
    bottom: 20px;
    right: 40px;
    z-index: 4;
    color: white;
    text-align: center;
    animation: bounce 2s infinite;
}

.scroll-text {
    font-size: 0.9rem;
    margin-bottom: 5px;
    opacity: 0.8;
    letter-spacing: 1px;
}

.scroll-arrow {
    font-size: 1.2rem;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
    }
    40% {
        transform: translateY(-10px);
    }
    60% {
        transform: translateY(-5px);
    }
}

/* Responsive Design */
@media (max-width: 1200px) {
    .slide-title {
        font-size: 3rem;
    }
}

@media (max-width: 992px) {
    .slide-content {
        margin-left: 5%;
        max-width: 500px;
    }
    
    .slide-title {
        font-size: 2.5rem;
    }
    
    .slide-description {
        font-size: 1.1rem;
    }
}

@media (max-width: 768px) {
    .slide-content {
        margin: 0 auto;
        padding: 0 20px;
        text-align: center;
        max-width: 90%;
    }
    
    .slide-title {
        font-size: 2.2rem;
    }
    
    .slide-description {
        font-size: 1rem;
    }
    
    .slide-actions {
        justify-content: center;
        flex-wrap: wrap;
    }
    
    .btn-primary, .btn-secondary {
        padding: 12px 25px;
        font-size: 0.9rem;
    }
    
    .scroll-down {
        right: 20px;
    }
}

@media (max-width: 576px) {
    .slide-title {
        font-size: 1.8rem;
    }
    
    .slide-tag {
        font-size: 0.8rem;
        padding: 6px 15px;
    }
    
    .slide-description {
        font-size: 0.9rem;
    }
    
    .slider-nav {
        bottom: 30px;
    }
    
    .scroll-down {
        right: 10px;
        bottom: 15px;
    }
    
    .scroll-text {
        font-size: 0.8rem;
    }
}
</style>

<script>
// Auto-slide functionality
document.addEventListener('DOMContentLoaded', function() {
    let currentSlide = 1;
    const totalSlides = 4;
    
    function nextSlide() {
        currentSlide = currentSlide % totalSlides + 1;
        document.getElementById(`slide-${currentSlide}`).checked = true;
    }
    
    // Change slide every 5 seconds
    setInterval(nextSlide, 5000);
});
</script>