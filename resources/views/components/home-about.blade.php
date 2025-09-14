
@extends('layouts.master')
<section class="about-section">
    <div class="about-background">
        <div class="floating-shape shape-1"></div>
        <div class="floating-shape shape-2"></div>
        <div class="floating-shape shape-3"></div>
    </div>

    <div class="container">
        <div class="about-content">
            <div class="section-header">
                <h2 class="section-title">Discover WanLanka</h2>
                <div class="section-divider"></div>
                <p class="section-subtitle">Your Gateway to Sri Lankan Wonders</p>
            </div>

            <div class="about-grid">
                <div class="about-text glass-card">
                    <p>Welcome to WanLanka, your premier travel companion for exploring the resplendent island of Sri Lanka. With its golden beaches, misty mountains, ancient heritage sites, and diverse wildlife, Sri Lanka offers an unparalleled travel experience.</p>

                    <p>At WanLanka, we specialize in crafting personalized journeys that showcase the authentic beauty and culture of this paradise island. Our team of local experts ensures every detail is perfected, from luxury accommodations to unique cultural encounters.</p>

                    <div class="stats-container">
                        <div class="stat-item">
                            <div class="stat-number" data-count="15">0</div>
                            <div class="stat-label">Years Experience</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number" data-count="5000">0</div>
                            <div class="stat-label">Happy Travelers</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number" data-count="100">0</div>
                            <div class="stat-label">Destinations</div>
                        </div>
                    </div>
                </div>

                <div class="services-container glass-card">
                    <h3>Our Premium Services</h3>
                    <div class="services-grid">
                        <div class="service-item">
                            <div class="service-icon">
                                <i class="fas fa-hotel"></i>
                            </div>
                            <h4>Luxury Accommodations</h4>
                            <p>Handpicked hotels and boutique stays that offer comfort and authentic experiences.</p>
                        </div>
                        <div class="service-item">
                            <div class="service-icon">
                                <i class="fas fa-car"></i>
                            </div>
                            <h4>Private Transfers</h4>
                            <p>Comfortable vehicles with experienced drivers for seamless travel across the island.</p>
                        </div>
                        <div class="service-item">
                            <div class="service-icon">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <h4>Expert Guides</h4>
                            <p>Knowledgeable local guides to enrich your journey with insights and stories.</p>
                        </div>
                        <div class="service-item">
                            <div class="service-icon">
                                <i class="fas fa-utensils"></i>
                            </div>
                            <h4>Cultural Experiences</h4>
                            <p>Authentic culinary journeys, traditional ceremonies, and local interactions.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ✅ Counter Animation --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const counters = document.querySelectorAll('.stat-number');
            const speed = 200;

            counters.forEach(counter => {
                const updateCount = () => {
                    const target = +counter.getAttribute('data-count');
                    const count = +counter.innerText;
                    const inc = Math.ceil(target / speed);

                    if (count < target) {
                        counter.innerText = count + inc;
                        setTimeout(updateCount, 1);
                    } else {
                        counter.innerText = target;
                    }
                };

                const observer = new IntersectionObserver(entries => {
                    if (entries[0].isIntersecting) {
                        updateCount();
                    }
                }, { threshold: 0.5 });

                observer.observe(counter);
            });
        });
    </script>
</section>
