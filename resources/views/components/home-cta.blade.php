<section class="cta-section">
    <div class="cta-container">
        <div class="cta-content">
            <h2 class="cta-title">Find Your Dream Vacation in...</h2>
            <p class="cta-description">
                Discover the breathtaking beauty and diverse experiences that await you across
                Sri Lanka's beautiful provinces. From pristine beaches to ancient cultural sites,
                lush tea plantations to wildlife adventures.
            </p>

           <a href="{{ route('province.index') }}" class="cta-button">
    Explore Provinces
    <i class="fas fa-arrow-right"></i>
</a>




        </div>

        <div class="cta-image">
            <img src="{{ asset('images/sample.png') }}" alt="Sri Lanka Landscape">
        </div>
    </div>
</section>

<style>
.cta-section {
    padding: 100px 0;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    position: relative;
    overflow: hidden;
}

.cta-container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 20px;
    position: relative;
    z-index: 2;
}

.cta-content {
    flex: 1;
    padding-right: 40px;
}

.cta-title {
    font-size: 2.8rem;
    color: #264653;
    margin-bottom: 20px;
    font-weight: 800;
    line-height: 1.2;
}

.cta-description {
    font-size: 1.2rem;
    color: #6c757d;
    margin-bottom: 30px;
    line-height: 1.7;
}

.cta-button {
    display: inline-flex;
    align-items: center;
    padding: 16px 35px;
    background: linear-gradient(135deg, #2a9d8f 0%, #1d7874 100%);
    color: white;
    border: none;
    border-radius: 50px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.4s ease;
    box-shadow: 0 5px 20px rgba(42, 157, 143, 0.4);
    text-decoration: none;
}

.cta-button:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(42, 157, 143, 0.6);
}

.cta-button i {
    margin-left: 12px;
    transition: transform 0.3s ease;
}

.cta-button:hover i {
    transform: translateX(7px);
}

.cta-image {
    flex: 1;
    position: relative;
}

.cta-image img {
    width: 100%;
    border-radius: 20px;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
    transition: transform 0.5s ease;
}

.cta-image img:hover {
    transform: scale(1.03);
}

/* Background decorative elements */
.cta-section::before {
    content: '';
    position: absolute;
    top: -150px;
    right: -150px;
    width: 400px;
    height: 400px;
    background: rgba(42, 157, 143, 0.05);
    border-radius: 50%;
    z-index: 1;
}

.cta-section::after {
    content: '';
    position: absolute;
    bottom: -100px;
    left: -100px;
    width: 300px;
    height: 300px;
    background: rgba(233, 196, 106, 0.05);
    border-radius: 50%;
    z-index: 1;
}

/* Responsive Design */
@media (max-width: 992px) {
    .cta-container {
        flex-direction: column;
        text-align: center;
    }

    .cta-content {
        padding-right: 0;
        margin-bottom: 50px;
    }

    .cta-title {
        font-size: 2.3rem;
    }

    .cta-description {
        font-size: 1.1rem;
    }
}

@media (max-width: 576px) {
    .cta-section {
        padding: 70px 0;
    }

    .cta-title {
        font-size: 2rem;
    }

    .cta-button {
        padding: 14px 30px;
        font-size: 1rem;
    }
}
</style>
