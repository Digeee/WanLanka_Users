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

<style>
/* About Section Styles */
.about-section {
    position: relative;
    padding: 120px 0;
    overflow: hidden;
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
}

.about-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
}

.floating-shape {
    position: absolute;
    border-radius: 50%;
    background: linear-gradient(45deg, rgba(42, 157, 143, 0.1), rgba(233, 196, 106, 0.2));
    filter: blur(60px);
    animation: float 18s infinite ease-in-out;
}

.shape-1 {
    width: 400px;
    height: 400px;
    top: -200px;
    left: -200px;
    animation-delay: 0s;
}

.shape-2 {
    width: 300px;
    height: 300px;
    bottom: 100px;
    right: 150px;
    animation-delay: -6s;
}

.shape-3 {
    width: 200px;
    height: 200px;
    top: 60%;
    left: 75%;
    animation-delay: -12s;
}

@keyframes float {
    0%, 100% {
        transform: translateY(0) rotate(0deg);
    }
    33% {
        transform: translateY(-30px) rotate(120deg);
    }
    66% {
        transform: translateY(30px) rotate(240deg);
    }
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
    position: relative;
    z-index: 2;
}

.section-header {
    text-align: center;
    margin-bottom: 70px;
}

.section-title {
    font-size: 3rem;
    color: #264653;
    margin-bottom: 20px;
    position: relative;
    display: inline-block;
}

.section-divider {
    width: 100px;
    height: 4px;
    background: linear-gradient(to right, #2a9d8f, #e9c46a);
    margin: 0 auto 20px;
    border-radius: 3px;
}

.section-subtitle {
    font-size: 1.3rem;
    color: #7f8c8d;
    max-width: 700px;
    margin: 0 auto;
}

.about-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 50px;
}

@media (min-width: 992px) {
    .about-grid {
        grid-template-columns: 1fr 1fr;
    }
}

.glass-card {
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(12px);
    border-radius: 25px;
    padding: 40px;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.3);
    transition: all 0.4s ease;
}

.glass-card:hover {
    transform: translateY(-15px);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
}

.about-text p {
    font-size: 1.15rem;
    line-height: 1.9;
    color: #2c3e50;
    margin-bottom: 25px;
}

.stats-container {
    display: flex;
    justify-content: space-around;
    margin-top: 40px;
    padding-top: 30px;
    border-top: 1px solid rgba(255, 255, 255, 0.4);
}

.stat-item {
    text-align: center;
}

.stat-number {
    font-size: 3rem;
    font-weight: 800;
    color: #2a9d8f;
    margin-bottom: 10px;
    font-family: 'Poppins', sans-serif;
}

.stat-label {
    font-size: 1rem;
    color: #7f8c8d;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    font-weight: 600;
}

.services-container h3 {
    font-size: 2rem;
    color: #264653;
    margin-bottom: 30px;
    text-align: center;
    position: relative;
}

.services-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 30px;
}

@media (min-width: 768px) {
    .services-grid {
        grid-template-columns: 1fr 1fr;
    }
}

.service-item {
    text-align: center;
    padding: 25px;
    border-radius: 20px;
    background: rgba(255, 255, 255, 0.15);
    transition: all 0.4s ease;
    backdrop-filter: blur(5px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.service-item:hover {
    transform: translateY(-10px);
    background: rgba(255, 255, 255, 0.25);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

.service-icon {
    width: 70px;
    height: 70px;
    margin: 0 auto 20px;
    background: linear-gradient(45deg, #2a9d8f, #e9c46a);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.8rem;
    box-shadow: 0 8px 20px rgba(42, 157, 143, 0.3);
}

.service-item h4 {
    font-size: 1.3rem;
    color: #264653;
    margin-bottom: 15px;
    font-weight: 700;
}

.service-item p {
    font-size: 1rem;
    color: #34495e;
    line-height: 1.7;
}

/* Responsive Design */
@media (max-width: 992px) {
    .about-section {
        padding: 80px 0;
    }
    
    .section-title {
        font-size: 2.5rem;
    }
    
    .section-subtitle {
        font-size: 1.1rem;
    }
    
    .glass-card {
        padding: 30px;
    }
    
    .stat-number {
        font-size: 2.5rem;
    }
}

@media (max-width: 768px) {
    .section-title {
        font-size: 2.2rem;
    }
    
    .stats-container {
        flex-direction: column;
        gap: 30px;
    }
    
    .service-icon {
        width: 60px;
        height: 60px;
        font-size: 1.5rem;
    }
}

@media (max-width: 480px) {
    .about-section {
        padding: 60px 0;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .section-divider {
        width: 80px;
        height: 3px;
    }
    
    .about-text p {
        font-size: 1rem;
    }
    
    .stat-number {
        font-size: 2rem;
    }
    
    .services-container h3 {
        font-size: 1.7rem;
    }
}
</style>