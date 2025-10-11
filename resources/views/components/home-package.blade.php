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
                    window.location.href = '/packages/fix';
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

<style>
/* Special Packages Section Styles */
.packages-section {
    padding: 100px 0;
    background: linear-gradient(135deg, #e6f7ff 0%, #ffffff 100%);
    position: relative;
    overflow: hidden;
}

.packages-section::before {
    content: '';
    position: absolute;
    top: -100px;
    right: -100px;
    width: 300px;
    height: 300px;
    background: rgba(42, 157, 143, 0.05);
    border-radius: 50%;
    z-index: 0;
}

.packages-section::after {
    content: '';
    position: absolute;
    bottom: -150px;
    left: -150px;
    width: 400px;
    height: 400px;
    background: rgba(233, 196, 106, 0.05);
    border-radius: 50%;
    z-index: 0;
}

.container {
    position: relative;
    z-index: 1;
}

.section-header {
    text-align: center;
    margin-bottom: 60px;
}

.section-title {
    font-size: 3rem;
    font-weight: 800;
    background: linear-gradient(to right, #264653, #2a9d8f);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    margin-bottom: 20px;
}

.section-subtitle {
    font-size: 1.3rem;
    color: #6c757d;
    max-width: 700px;
    margin: 0 auto;
}

.offers-carousel {
    display: flex;
    gap: 30px;
    overflow-x: auto;
    padding: 30px 10px;
    scrollbar-width: none;
    -ms-overflow-style: none;
    scroll-behavior: smooth;
    position: relative;
}

.offers-carousel::-webkit-scrollbar {
    display: none;
}

.offer-card {
    min-width: 340px;
    height: 450px;
    border-radius: 25px;
    overflow: hidden;
    position: relative;
    flex-shrink: 0;
    transition: all 0.5s ease;
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    cursor: pointer;
    perspective: 1000px;
}

.offer-card:hover {
    transform: translateY(-15px);
    box-shadow: 0 20px 50px rgba(42, 157, 143, 0.3);
}

.card-front, .card-back {
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
    transition: transform 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    border-radius: 25px;
    padding: 30px;
    display: flex;
    flex-direction: column;
}

.card-front {
    background: linear-gradient(145deg, rgba(42, 157, 143, 0.9), rgba(233, 196, 106, 0.8));
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    justify-content: flex-end;
    color: white;
}

.card-back {
    background: linear-gradient(145deg, rgba(38, 70, 83, 0.9), rgba(42, 157, 143, 0.85));
    backdrop-filter: blur(15px);
    transform: rotateY(180deg);
    justify-content: space-between;
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: white;
}

.offer-card:hover .card-front {
    transform: rotateY(180deg);
}

.offer-card:hover .card-back {
    transform: rotateY(0deg);
}

.offer-badge {
    position: absolute;
    top: 25px;
    right: 25px;
    background: linear-gradient(to right, #e76f51, #f4a261);
    padding: 10px 20px;
    border-radius: 30px;
    font-size: 0.95rem;
    font-weight: 700;
    box-shadow: 0 5px 15px rgba(231, 111, 81, 0.4);
    z-index: 2;
}

.offer-title {
    font-size: 2rem;
    font-weight: 800;
    margin-bottom: 15px;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
}

.offer-days {
    font-size: 1.2rem;
    color: #f8f9fa;
    margin-bottom: 20px;
    font-weight: 500;
}

.offer-price {
    font-size: 1.8rem;
    font-weight: 800;
    color: #ffffff;
    margin-bottom: 25px;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
}

.offer-price span {
    font-size: 1.1rem;
    font-weight: 400;
    color: #e9ecef;
}

.view-tour-btn {
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(5px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: white;
    padding: 15px 30px;
    border-radius: 50px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-align: center;
    margin-top: 20px;
    align-self: flex-start;
}

.view-tour-btn:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.offer-discount {
    font-size: 3rem;
    font-weight: 900;
    text-align: center;
    color: #ffd166;
    text-shadow: 0 3px 15px rgba(0, 0, 0, 0.3);
    margin: 20px 0;
}

.offer-description {
    font-size: 1.1rem;
    line-height: 1.7;
    color: #f1faee;
    margin: 20px 0;
    text-align: center;
}

.offer-includes {
    list-style-type: none;
    margin: 20px 0;
    padding: 0;
}

.offer-includes li {
    margin-bottom: 12px;
    display: flex;
    align-items: center;
    font-size: 1rem;
    line-height: 1.5;
}

.offer-includes li:before {
    content: "✓";
    color: #ffd166;
    font-weight: bold;
    margin-right: 12px;
    font-size: 1.2rem;
}

.carousel-controls {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-top: 40px;
}

.carousel-btn {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: rgba(42, 157, 143, 0.15);
    backdrop-filter: blur(5px);
    border: 1px solid rgba(42, 157, 143, 0.3);
    color: #2a9d8f;
    font-size: 1.4rem;
    cursor: pointer;
    transition: all 0.4s ease;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 8px 20px rgba(42, 157, 143, 0.2);
}

.carousel-btn:hover {
    background: rgba(42, 157, 143, 0.25);
    transform: scale(1.15);
    box-shadow: 0 10px 25px rgba(42, 157, 143, 0.3);
}

/* Responsive Design */
@media (max-width: 1200px) {
    .offer-card {
        min-width: 320px;
        height: 430px;
    }
    
    .offer-title {
        font-size: 1.8rem;
    }
    
    .offer-price {
        font-size: 1.6rem;
    }
}

@media (max-width: 992px) {
    .packages-section {
        padding: 80px 0;
    }
    
    .section-title {
        font-size: 2.5rem;
    }
    
    .section-subtitle {
        font-size: 1.1rem;
    }
    
    .offer-card {
        min-width: 300px;
        height: 400px;
    }
    
    .offer-badge {
        padding: 8px 16px;
        font-size: 0.9rem;
        top: 20px;
        right: 20px;
    }
    
    .offer-title {
        font-size: 1.7rem;
    }
    
    .offer-price {
        font-size: 1.5rem;
    }
    
    .view-tour-btn {
        padding: 12px 25px;
        font-size: 1rem;
    }
    
    .offer-discount {
        font-size: 2.5rem;
    }
}

@media (max-width: 768px) {
    .packages-section {
        padding: 60px 0;
    }
    
    .section-title {
        font-size: 2.2rem;
    }
    
    .offer-card {
        min-width: 280px;
        height: 380px;
    }
    
    .offer-title {
        font-size: 1.6rem;
    }
    
    .offer-price {
        font-size: 1.4rem;
    }
    
    .carousel-btn {
        width: 50px;
        height: 50px;
        font-size: 1.2rem;
    }
}

@media (max-width: 480px) {
    .packages-section {
        padding: 50px 0;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .section-subtitle {
        font-size: 1rem;
    }
    
    .offer-card {
        min-width: 260px;
        height: 360px;
    }
    
    .offer-title {
        font-size: 1.5rem;
    }
    
    .offer-price {
        font-size: 1.3rem;
    }
    
    .offer-discount {
        font-size: 2rem;
    }
    
    .offer-description {
        font-size: 1rem;
    }
    
    .offer-includes li {
        font-size: 0.9rem;
    }
}
</style>