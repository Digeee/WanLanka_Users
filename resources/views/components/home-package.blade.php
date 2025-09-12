<link href="{{ asset('css/home-packages.css') }}" rel="stylesheet">


<section class="packages-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Special Tour Packages</h2>
            <p class="section-subtitle">Discover our exclusive offers with limited-time discounts</p>
        </div>

        <div class="offers-carousel">
            <!-- Offer 1 -->
            <div class="offer-card">
                <div class="card-front">
                    <div class="offer-badge">Limited Time</div>
                    <h3 class="offer-title">Best of Jaffna</h3>
                    <p class="offer-days">7 days / 6 nights</p>
                    <p class="offer-price">From $9999 <span>per person</span></p>
                    <div class="view-tour-btn">View Details</div>
                </div>
                <div class="card-back">
                    <div class="offer-discount">25% OFF</div>
                    <p class="offer-description">Experience the perfect blend of traditional culture and modern innovation in Jaffna.</p>
                    <ul class="offer-includes">
                        <li>Accommodation in 4-star hotels</li>
                        <li>All transportation included</li>
                        <li>Guided tours in Jaffna</li>
                        <li>Traditional dinner experience</li>
                    </ul>
                    <div class="view-tour-btn">Book Now</div>
                </div>
            </div>

            <!-- Offer 2 -->
            <div class="offer-card">
                <div class="card-front">
                    <div class="offer-badge">Popular</div>
                    <h3 class="offer-title">Classic Colombo</h3>
                    <p class="offer-days">12 days / 10 nights</p>
                    <p class="offer-price">From $13000 <span>per person</span></p>
                    <div class="view-tour-btn">View Details</div>
                </div>
                <div class="card-back">
                    <div class="offer-discount">20% OFF</div>
                    <p class="offer-description">Explore the ancient wonders and vibrant cities of Sri Lanka on this comprehensive tour.</p>
                    <ul class="offer-includes">
                        <li>Sigiriya Rock Fortress visit</li>
                        <li>Temple of the Tooth tour</li>
                        <li>Yala National Park safari</li>
                        <li>All meals included</li>
                    </ul>
                    <div class="view-tour-btn">Book Now</div>
                </div>
            </div>

            <!-- Offer 3 -->
            <div class="offer-card">
                <div class="card-front">
                    <div class="offer-badge">New</div>
                    <h3 class="offer-title">Kandy/Nuwara Eliya 2026</h3>
                    <p class="offer-days">13 days / 11 nights</p>
                    <p class="offer-price">From $13100 <span>per person</span></p>
                    <div class="view-tour-btn">View Details</div>
                </div>
                <div class="card-back">
                    <div class="offer-discount">30% OFF</div>
                    <p class="offer-description">Retrace the steps of ancient warriors as you walk along the Great Wall and step into the mystical Yangtze River.</p>
                    <ul class="offer-includes">
                        <li>5-star luxury accommodation</li>
                        <li>Private guided tours</li>
                        <li>All domestic flights</li>
                        <li>Special cultural experiences</li>
                    </ul>
                    <div class="view-tour-btn">Book Now</div>
                </div>
            </div>

            <!-- Offer 4 -->
            <div class="offer-card">
                <div class="card-front">
                    <div class="offer-badge">Exclusive</div>
                    <h3 class="offer-title">Tropical Paradise</h3>
                    <p class="offer-days">10 days / 9 nights</p>
                    <p class="offer-price">From $2599 <span>per person</span></p>
                    <div class="view-tour-btn">View Details</div>
                </div>
                <div class="card-back">
                    <div class="offer-discount">15% OFF</div>
                    <p class="offer-description">Relax on pristine beaches and explore lush rainforests in this tropical getaway.</p>
                    <ul class="offer-includes">
                        <li>Beachfront resort accommodation</li>
                        <li>Snorkeling and diving trips</li>
                        <li>Rainforest adventure tours</li>
                        <li>Spa treatment included</li>
                    </ul>
                    <div class="view-tour-btn">Book Now</div>
                </div>
            </div>

            <!-- Offer 5 -->
            <div class="offer-card">
                <div class="card-front">
                    <div class="offer-badge">Premium</div>
                    <h3 class="offer-title">Srilankan Discovery</h3>
                    <p class="offer-days">14 days / 12 nights</p>
                    <p class="offer-price">From $3899 <span>per person</span></p>
                    <div class="view-tour-btn">View Details</div>
                </div>
                <div class="card-back">
                    <div class="offer-discount">22% OFF</div>
                    <p class="offer-description">Experience the diversity of Sri Lanka's most iconic cities and cultural landmarks.</p>
                    <ul class="offer-includes">
                        <li>4-country tour: Colombo, Kandy, Nuwara Eliya, Galle</li>
                        <li>Luxury coach transportation</li>
                        <li>Professional multilingual guide</li>
                        <li>Entrance fees to all attractions</li>
                    </ul>
                    <div class="view-tour-btn">Book Now</div>
                </div>
            </div>
        </div>

        <div class="carousel-controls">
            <div class="carousel-btn" id="prev-btn">
                <i class="fas fa-chevron-left"></i>
            </div>
            <div class="carousel-btn" id="next-btn">
                <i class="fas fa-chevron-right"></i>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const carousel = document.querySelector('.offers-carousel');
        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');
        const cards = document.querySelectorAll('.offer-card');

        // Set initial scroll position
        carousel.scrollLeft = 0;

        // Next button event listener
        nextBtn.addEventListener('click', function() {
            carousel.scrollBy({ left: 350, behavior: 'smooth' });
        });

        // Previous button event listener
        prevBtn.addEventListener('click', function() {
            carousel.scrollBy({ left: -350, behavior: 'smooth' });
        });

        // Add click event to each card to redirect to package page
        cards.forEach(card => {
            card.addEventListener('click', function(e) {
                if (!e.target.classList.contains('view-tour-btn')) {
                    // Redirect to package page (you can modify this URL)
                    window.location.href = '/tour-package';
                }
            });
        });

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (e.key === 'ArrowLeft') {
                carousel.scrollBy({ left: -350, behavior: 'smooth' });
            } else if (e.key === 'ArrowRight') {
                carousel.scrollBy({ left: 350, behavior: 'smooth' });
            }
        });
    });
</script>
