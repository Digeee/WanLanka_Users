<div class="feedback-carousel" aria-label="Customer Testimonials">
    <div class="carousel-background">
        <div class="bg-pattern"></div>
        <div class="floating-elements">
            <div class="floating-element element-1"></div>
            <div class="floating-element element-2"></div>
            <div class="floating-element element-3"></div>
        </div>
    </div>
    
    <div class="section-header">
        <h2 class="section-title">What Our Travelers Say</h2>
        <p class="section-subtitle">Real experiences from our valued customers</p>
    </div>

    <div class="carousel-container">
        <div class="testimonial-wrapper">
            <!-- Testimonial 1 -->
            <div class="testimonial-card active" role="group" aria-roledescription="slide" aria-label="Testimonial 1 of 3">
                <div class="card-header">
                    <div class="client-avatar">
                        <div class="avatar-image">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="client-info">
                            <h3 class="client-name">Abishanan</h3>
                            <span class="tour-date">January 28</span>
                        </div>
                    </div>
                    <div class="rating-stars" aria-label="5 star rating">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                    </div>
                </div>
                <div class="testimonial-content">
                    <h4 class="testimonial-title">Superb client delivery</h4>
                    <p class="testimonial-text">"Very tentative. Lots of resources; Great communications as follow-up efforts. The entire experience was seamless from booking to the actual tour. Highly recommended for anyone looking for a professional travel service."</p>
                </div>
                <div class="tour-badge">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Jaffna Cultural Tour</span>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="testimonial-card" role="group" aria-roledescription="slide" aria-label="Testimonial 2 of 3">
                <div class="card-header">
                    <div class="client-avatar">
                        <div class="avatar-image">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="client-info">
                            <h3 class="client-name">Archaga</h3>
                            <span class="tour-date">December 18</span>
                        </div>
                    </div>
                    <div class="rating-stars" aria-label="5 star rating">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                    </div>
                </div>
                <div class="testimonial-content">
                    <h4 class="testimonial-title">My first tour with WanLanka to Nallur</h4>
                    <p class="testimonial-text">"My first tour with WanLanka to Nallur and it won't be my last! Loved it! Very professional guides, comfortable transportation, and well-planned itinerary. The cultural insights were exceptional."</p>
                </div>
                <div class="tour-badge">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Nallur Temple Experience</span>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="testimonial-card" role="group" aria-roledescription="slide" aria-label="Testimonial 3 of 3">
                <div class="card-header">
                    <div class="client-avatar">
                        <div class="avatar-image">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="client-info">
                            <h3 class="client-name">Dorathy</h3>
                            <span class="tour-date">November 28</span>
                        </div>
                    </div>
                    <div class="rating-stars" aria-label="5 star rating">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                    </div>
                </div>
                <div class="testimonial-content">
                    <h4 class="testimonial-title">Great trip, low price, excellent hotel</h4>
                    <p class="testimonial-text">"We took the 3-day Eastern tour in Nov 24. Stayed at all 5-star hotels. St Regis was particularly amazing. The value for money was incredible, and the attention to detail made our vacation truly memorable."</p>
                </div>
                <div class="tour-badge">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Eastern Province Explorer</span>
                </div>
            </div>
        </div>

        <button class="carousel-nav prev" aria-label="Previous testimonial">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="carousel-nav next" aria-label="Next testimonial">
            <i class="fas fa-chevron-right"></i>
        </button>

        <div class="carousel-indicators" role="tablist" aria-label="Testimonial navigation">
            <button class="indicator active" role="tab" aria-selected="true" aria-controls="slide1"></button>
            <button class="indicator" role="tab" aria-selected="false" aria-controls="slide2"></button>
            <button class="indicator" role="tab" aria-selected="false" aria-controls="slide3"></button>
        </div>
    </div>
</div>

<style>
.feedback-carousel {
    position: relative;
    width: 100%;
    min-height: 100vh;
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 50%, #f1f3f4 100%);
    padding: 100px 0;
    overflow: hidden;
    font-family: 'Poppins', sans-serif;
}

.carousel-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
}

.bg-pattern {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: 
        radial-gradient(circle at 20% 80%, rgba(74, 105, 189, 0.03) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(42, 157, 143, 0.03) 0%, transparent 50%),
        radial-gradient(circle at 40% 40%, rgba(233, 196, 106, 0.02) 0%, transparent 50%);
}

.floating-elements {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.floating-element {
    position: absolute;
    border-radius: 50%;
    background: linear-gradient(135deg, rgba(74, 105, 189, 0.05), rgba(42, 157, 143, 0.03));
    animation: float 6s ease-in-out infinite;
    border: 1px solid rgba(255, 255, 255, 0.5);
}

.element-1 {
    width: 100px;
    height: 100px;
    top: 20%;
    left: 10%;
    animation-delay: 0s;
}

.element-2 {
    width: 150px;
    height: 150px;
    top: 60%;
    right: 10%;
    animation-delay: 2s;
}

.element-3 {
    width: 80px;
    height: 80px;
    bottom: 20%;
    left: 20%;
    animation-delay: 4s;
}

@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(180deg); }
}

.section-header {
    text-align: center;
    margin-bottom: 80px;
    position: relative;
    z-index: 2;
}

.section-title {
    font-size: 3.5rem;
    font-weight: 800;
    background: linear-gradient(135deg, #2c3e50 0%, #4a69bd 100%);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    margin-bottom: 20px;
    text-shadow: 0 4px 20px rgba(0,0,0,0.1);
}

.section-subtitle {
    font-size: 1.3rem;
    color: #7f8c8d;
    font-weight: 400;
    max-width: 600px;
    margin: 0 auto;
}

.carousel-container {
    position: relative;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
    z-index: 2;
}

.testimonial-wrapper {
    position: relative;
    height: 500px;
    overflow: hidden;
}

.testimonial-card {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(0.9);
    width: 90%;
    max-width: 800px;
    background: white;
    border-radius: 25px;
    padding: 50px;
    box-shadow: 
        0 25px 60px rgba(0, 0, 0, 0.08),
        0 10px 30px rgba(0, 0, 0, 0.03),
        inset 0 1px 0 rgba(255, 255, 255, 0.8);
    opacity: 0;
    transition: all 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    border: 1px solid rgba(255, 255, 255, 0.8);
}

.testimonial-card.active {
    opacity: 1;
    transform: translate(-50%, -50%) scale(1);
    z-index: 10;
    box-shadow: 
        0 30px 80px rgba(0, 0, 0, 0.12),
        0 15px 40px rgba(74, 105, 189, 0.08),
        inset 0 1px 0 rgba(255, 255, 255, 0.9);
}

.card-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 30px;
}

.client-avatar {
    display: flex;
    align-items: center;
    gap: 20px;
}

.avatar-image {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: linear-gradient(135deg, #4a69bd, #2a9d8f);
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 10px 30px rgba(74, 105, 189, 0.2);
    transition: transform 0.3s ease;
}

.avatar-image:hover {
    transform: scale(1.05);
}

.avatar-image i {
    font-size: 32px;
    color: white;
}

.client-info h3 {
    font-size: 1.5rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 5px;
}

.tour-date {
    color: #7f8c8d;
    font-weight: 500;
    font-size: 1rem;
}

.rating-stars {
    display: flex;
    gap: 5px;
}

.star {
    color: #FFD700;
    font-size: 24px;
    text-shadow: 0 2px 8px rgba(255, 215, 0, 0.3);
    transition: transform 0.3s ease;
}

.star:hover {
    transform: scale(1.2);
}

.testimonial-content {
    margin-bottom: 30px;
}

.testimonial-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 20px;
    line-height: 1.3;
}

.testimonial-text {
    font-size: 1.2rem;
    line-height: 1.8;
    color: #5a6c7d;
    font-weight: 400;
    text-align: justify;
}

.tour-badge {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: linear-gradient(135deg, #4a69bd, #2a9d8f);
    color: white;
    padding: 12px 25px;
    border-radius: 50px;
    font-weight: 600;
    font-size: 1rem;
    box-shadow: 0 5px 20px rgba(74, 105, 189, 0.2);
    transition: all 0.3s ease;
}

.tour-badge:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(74, 105, 189, 0.3);
}

.carousel-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 70px;
    height: 70px;
    border-radius: 50%;
    background: white;
    border: none;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    z-index: 20;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #4a69bd;
    font-size: 24px;
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.carousel-nav:hover {
    background: #4a69bd;
    color: white;
    transform: translateY(-50%) scale(1.15);
    box-shadow: 0 15px 40px rgba(74, 105, 189, 0.3);
}

.carousel-nav.prev {
    left: -35px;
}

.carousel-nav.next {
    right: -35px;
}

.carousel-indicators {
    position: absolute;
    bottom: -60px;
    left: 0;
    right: 0;
    display: flex;
    justify-content: center;
    gap: 15px;
}

.indicator {
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background: rgba(74, 105, 189, 0.2);
    border: none;
    cursor: pointer;
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
}

.indicator::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #4a69bd, #2a9d8f);
    transition: left 0.4s ease;
}

.indicator.active::before {
    left: 0;
}

.indicator.active {
    transform: scale(1.3);
    box-shadow: 0 0 20px rgba(74, 105, 189, 0.3);
}

/* Responsive Design */
@media (max-width: 1200px) {
    .testimonial-card {
        padding: 40px;
        width: 95%;
    }
    
    .section-title {
        font-size: 3rem;
    }
    
    .carousel-nav.prev {
        left: -25px;
    }
    
    .carousel-nav.next {
        right: -25px;
    }
}

@media (max-width: 992px) {
    .feedback-carousel {
        padding: 80px 0;
    }
    
    .section-title {
        font-size: 2.5rem;
    }
    
    .section-subtitle {
        font-size: 1.2rem;
    }
    
    .testimonial-card {
        padding: 35px;
    }
    
    .avatar-image {
        width: 70px;
        height: 70px;
    }
    
    .avatar-image i {
        font-size: 28px;
    }
    
    .client-info h3 {
        font-size: 1.3rem;
    }
    
    .testimonial-title {
        font-size: 1.6rem;
    }
    
    .testimonial-text {
        font-size: 1.1rem;
    }
    
    .carousel-nav {
        width: 60px;
        height: 60px;
        font-size: 22px;
    }
}

@media (max-width: 768px) {
    .feedback-carousel {
        padding: 60px 0;
        min-height: 80vh;
    }
    
    .section-title {
        font-size: 2.2rem;
    }
    
    .section-subtitle {
        font-size: 1.1rem;
    }
    
    .testimonial-wrapper {
        height: 450px;
    }
    
    .testimonial-card {
        padding: 30px 25px;
        width: 98%;
    }
    
    .card-header {
        flex-direction: column;
        gap: 20px;
        align-items: flex-start;
    }
    
    .client-avatar {
        gap: 15px;
    }
    
    .avatar-image {
        width: 60px;
        height: 60px;
    }
    
    .avatar-image i {
        font-size: 24px;
    }
    
    .client-info h3 {
        font-size: 1.2rem;
    }
    
    .testimonial-title {
        font-size: 1.4rem;
    }
    
    .testimonial-text {
        font-size: 1rem;
    }
    
    .carousel-nav {
        width: 50px;
        height: 50px;
        font-size: 20px;
    }
    
    .carousel-nav.prev {
        left: -15px;
    }
    
    .carousel-nav.next {
        right: -15px;
    }
}

@media (max-width: 480px) {
    .section-title {
        font-size: 1.8rem;
    }
    
    .section-subtitle {
        font-size: 1rem;
    }
    
    .testimonial-wrapper {
        height: 500px;
    }
    
    .testimonial-card {
        padding: 25px 20px;
    }
    
    .client-avatar {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }
    
    .avatar-image {
        width: 50px;
        height: 50px;
    }
    
    .avatar-image i {
        font-size: 20px;
    }
    
    .testimonial-title {
        font-size: 1.3rem;
    }
    
    .testimonial-text {
        font-size: 0.95rem;
    }
    
    .carousel-nav {
        width: 45px;
        height: 45px;
        font-size: 18px;
    }
    
    .carousel-indicators {
        bottom: -50px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const testimonialCards = document.querySelectorAll('.testimonial-card');
    const prevBtn = document.querySelector('.carousel-nav.prev');
    const nextBtn = document.querySelector('.carousel-nav.next');
    const indicators = document.querySelectorAll('.indicator');

    let currentIndex = 0;

    function showTestimonial(index) {
        testimonialCards.forEach((card, i) => {
            card.classList.toggle('active', i === index);
            indicators[i].classList.toggle('active', i === index);
            indicators[i].setAttribute('aria-selected', i === index);
        });
        currentIndex = index;
    }

    function showNext() {
        let nextIndex = (currentIndex + 1) % testimonialCards.length;
        showTestimonial(nextIndex);
    }

    function showPrev() {
        let prevIndex = (currentIndex - 1 + testimonialCards.length) % testimonialCards.length;
        showTestimonial(prevIndex);
    }

    // Navigation buttons
    nextBtn.addEventListener('click', showNext);
    prevBtn.addEventListener('click', showPrev);

    // Indicators click
    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => {
            showTestimonial(index);
        });
    });

    // Automatically cycle carousel every 8 seconds
    setInterval(showNext, 8000);

    // Initialize first testimonial
    showTestimonial(currentIndex);
});
</script>