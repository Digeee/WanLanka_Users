<section class="cta-section">
    <div class="cta-background">
        <div class="bg-pattern"></div>
        <div class="floating-elements">
            <div class="floating-element element-1"></div>
            <div class="floating-element element-2"></div>
            <div class="floating-element element-3"></div>
        </div>
    </div>

    <div class="cta-container">
        <div class="cta-content">
            <div class="content-wrapper">
                <div class="section-badge">
                    <span>Discover Paradise</span>
                </div>

                <h2 class="cta-title">
                    <span class="title-line">Find Your Dream</span>
                    <span class="title-line highlight">Vacation in Sri Lanka</span>
                </h2>

                <p class="cta-description">
                    Discover the breathtaking beauty and diverse experiences that await you across
                    Sri Lanka's beautiful provinces. From pristine beaches to ancient cultural sites,
                    lush tea plantations to wildlife adventures - your perfect getaway awaits.
                </p>

                <div class="features-grid">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-umbrella-beach"></i>
                        </div>
                        <span>Pristine Beaches</span>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-mountain"></i>
                        </div>
                        <span>Misty Mountains</span>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-place-of-worship"></i>
                        </div>
                        <span>Cultural Heritage</span>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-paw"></i>
                        </div>
                        <span>Wildlife Safari</span>
                    </div>
                </div>

                <div class="cta-actions">

                        <span>Explore Provinces</span>
                        <div class="button-icon">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>

                    <a href="{{ route('custom-packages.index') }}" class="cta-button secondary">
                        <span>View Packages</span>
                        <div class="button-icon">
                            <i class="fas fa-gem"></i>
                        </div>
                    </a>
                </div>

                <div class="trust-indicators">
                    <div class="trust-item">
                        <div class="trust-number">500+</div>
                        <div class="trust-label">Happy Travelers</div>
                    </div>
                    <div class="trust-item">
                        <div class="trust-number">25+</div>
                        <div class="trust-label">Destinations</div>
                    </div>
                    <div class="trust-item">
                        <div class="trust-number">98%</div>
                        <div class="trust-label">Satisfaction Rate</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="cta-visual">
            <div class="image-container">
                <img src="{{ asset('images/sample.png') }}" alt="Sri Lanka Landscape" class="main-image">
                <div class="image-overlay"></div>

                <div class="floating-card card-1">
                    <i class="fas fa-award"></i>
                    <span>Best Tourism Award 2024</span>
                </div>

                <div class="floating-card card-2">
                    <i class="fas fa-star"></i>
                    <span>5-Star Rated Service</span>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.cta-section {
    position: relative;
    width: 100%;
    min-height: 100vh;
    padding: 120px 0;
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 50%, #f1f5f9 100%);
    overflow: hidden;
    font-family: 'Poppins', sans-serif;
}

.cta-background {
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
        radial-gradient(circle at 10% 20%, rgba(74, 105, 189, 0.03) 0%, transparent 50%),
        radial-gradient(circle at 90% 80%, rgba(42, 157, 143, 0.03) 0%, transparent 50%),
        radial-gradient(circle at 50% 50%, rgba(233, 196, 106, 0.02) 0%, transparent 50%);
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
    animation: float 8s ease-in-out infinite;
    border: 1px solid rgba(255, 255, 255, 0.5);
}

.element-1 {
    width: 120px;
    height: 120px;
    top: 15%;
    left: 5%;
    animation-delay: 0s;
}

.element-2 {
    width: 80px;
    height: 80px;
    top: 70%;
    right: 10%;
    animation-delay: 2s;
}

.element-3 {
    width: 60px;
    height: 60px;
    bottom: 20%;
    left: 15%;
    animation-delay: 4s;
}

@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-25px) rotate(180deg); }
}

.cta-container {
    position: relative;
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 40px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 80px;
    align-items: center;
    z-index: 2;
}

.cta-content {
    position: relative;
}

.content-wrapper {
    max-width: 580px;
}

.section-badge {
    display: inline-block;
    background: linear-gradient(135deg, #4a69bd, #2a9d8f);
    color: white;
    padding: 10px 25px;
    border-radius: 50px;
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 30px;
    box-shadow: 0 5px 20px rgba(74, 105, 189, 0.3);
}

.cta-title {
    font-size: 3.5rem;
    font-weight: 800;
    color: #1e293b;
    margin-bottom: 25px;
    line-height: 1.1;
}

.title-line {
    display: block;
}

.title-line.highlight {
    background: linear-gradient(135deg, #4a69bd, #2a9d8f);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    position: relative;
}

.cta-description {
    font-size: 1.2rem;
    color: #64748b;
    line-height: 1.7;
    margin-bottom: 40px;
    font-weight: 400;
}

.features-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 40px;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px;
    background: rgba(255, 255, 255, 0.8);
    border-radius: 15px;
    border: 1px solid rgba(255, 255, 255, 0.5);
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
}

.feature-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.feature-icon {
    width: 45px;
    height: 45px;
    border-radius: 12px;
    background: linear-gradient(135deg, #4a69bd, #2a9d8f);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.1rem;
}

.feature-item span {
    font-weight: 600;
    color: #374151;
}

.cta-actions {
    display: flex;
    gap: 20px;
    margin-bottom: 50px;
    flex-wrap: wrap;
}

.cta-button {
    display: inline-flex;
    align-items: center;
    gap: 15px;
    padding: 18px 35px;
    border: none;
    border-radius: 15px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    text-decoration: none;
    position: relative;
    overflow: hidden;
}

.cta-button::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: left 0.5s ease;
}

.cta-button:hover::before {
    left: 100%;
}

.cta-button.primary {
    background: linear-gradient(135deg, #4a69bd, #2a9d8f);
    color: white;
    box-shadow: 0 10px 30px rgba(74, 105, 189, 0.4);
}

.cta-button.primary:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(74, 105, 189, 0.6);
}

.cta-button.secondary {
    background: rgba(255, 255, 255, 0.9);
    color: #4a69bd;
    border: 2px solid #4a69bd;
    backdrop-filter: blur(10px);
}

.cta-button.secondary:hover {
    transform: translateY(-5px);
    background: #4a69bd;
    color: white;
    box-shadow: 0 10px 30px rgba(74, 105, 189, 0.3);
}

.button-icon {
    transition: transform 0.3s ease;
}

.cta-button:hover .button-icon {
    transform: translateX(5px);
}

.trust-indicators {
    display: flex;
    gap: 40px;
}

.trust-item {
    text-align: center;
}

.trust-number {
    font-size: 2rem;
    font-weight: 800;
    color: #4a69bd;
    margin-bottom: 5px;
}

.trust-label {
    font-size: 0.9rem;
    color: #64748b;
    font-weight: 500;
}

.cta-visual {
    position: relative;
}

.image-container {
    position: relative;
    border-radius: 25px;
    overflow: hidden;
    box-shadow: 0 30px 80px rgba(0, 0, 0, 0.15);
    transform: perspective(1000px) rotateY(-5deg);
    transition: all 0.5s ease;
}

.image-container:hover {
    transform: perspective(1000px) rotateY(0deg);
}

.main-image {
    width: 100%;
    height: 600px;
    object-fit: cover;
    transition: transform 0.8s ease;
}

.image-container:hover .main-image {
    transform: scale(1.05);
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(74, 105, 189, 0.1), rgba(42, 157, 143, 0.1));
    pointer-events: none;
}

.floating-card {
    position: absolute;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    padding: 15px 20px;
    border-radius: 15px;
    display: flex;
    align-items: center;
    gap: 10px;
    font-weight: 600;
    color: #1e293b;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.5);
    animation: float-card 6s ease-in-out infinite;
}

.floating-card i {
    color: #4a69bd;
    font-size: 1.2rem;
}

.card-1 {
    top: 20%;
    right: -20px;
    animation-delay: 0s;
}

.card-2 {
    bottom: 30%;
    left: -20px;
    animation-delay: 2s;
}

@keyframes float-card {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-15px); }
}

/* Responsive Design */
@media (max-width: 1200px) {
    .cta-container {
        gap: 60px;
    }

    .cta-title {
        font-size: 3rem;
    }

    .trust-indicators {
        gap: 30px;
    }
}

@media (max-width: 992px) {
    .cta-container {
        grid-template-columns: 1fr;
        gap: 50px;
        text-align: center;
    }

    .content-wrapper {
        max-width: 100%;
    }

    .cta-title {
        font-size: 2.8rem;
    }

    .features-grid {
        grid-template-columns: repeat(2, 1fr);
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }

    .cta-actions {
        justify-content: center;
    }

    .trust-indicators {
        justify-content: center;
    }

    .image-container {
        transform: none;
        max-width: 600px;
        margin: 0 auto;
    }

    .image-container:hover {
        transform: scale(1.02);
    }
}

@media (max-width: 768px) {
    .cta-section {
        padding: 80px 0;
        min-height: auto;
    }

    .cta-container {
        padding: 0 25px;
    }

    .cta-title {
        font-size: 2.3rem;
    }

    .cta-description {
        font-size: 1.1rem;
    }

    .features-grid {
        grid-template-columns: 1fr;
        max-width: 300px;
    }

    .cta-actions {
        flex-direction: column;
        align-items: center;
    }

    .cta-button {
        width: 100%;
        max-width: 280px;
        justify-content: center;
    }

    .trust-indicators {
        gap: 25px;
    }

    .trust-number {
        font-size: 1.7rem;
    }

    .main-image {
        height: 400px;
    }
}

@media (max-width: 480px) {
    .cta-section {
        padding: 60px 0;
    }

    .cta-container {
        padding: 0 20px;
    }

    .cta-title {
        font-size: 2rem;
    }

    .section-badge {
        font-size: 0.8rem;
        padding: 8px 20px;
    }

    .trust-indicators {
        flex-direction: column;
        gap: 20px;
    }

    .floating-card {
        padding: 12px 16px;
        font-size: 0.9rem;
    }

    .card-1, .card-2 {
        position: relative;
        top: auto;
        right: auto;
        bottom: auto;
        left: auto;
        margin: 10px 0;
        animation: none;
    }
}
</style>
