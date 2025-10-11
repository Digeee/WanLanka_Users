<div class="feedback-container" aria-label="Feedback Carousel">
    <div class="feedback-wrapper">
        <div class="feedback-item active" role="group" aria-roledescription="slide" aria-label="Feedback 1 of 3">
            <div class="avatar" aria-hidden="true">
                <i class="fas fa-user"></i>
            </div>
            <div class="rating" aria-label="5 star rating">
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
            </div>
            <div class="feedback-text">
                <p><strong>Superb client delivery</strong></p>
                <p>Very tentative. Lots of resources; Great communications as follow-up efforts...</p>
                <span class="author">Abishanan, January 28</span>
            </div>
        </div>

        <div class="feedback-item" role="group" aria-roledescription="slide" aria-label="Feedback 2 of 3">
            <div class="avatar" aria-hidden="true">
                <i class="fas fa-user"></i>
            </div>
            <div class="rating" aria-label="5 star rating">
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
            </div>
            <div class="feedback-text">
                <p><strong>My first tour with WanLanka to Nallur</strong></p>
                <p>My first tour with WanLanka to Nallur and it won't be my last! Loved it! Very...</p>
                <span class="author">Archaga, December 18</span>
            </div>
        </div>

        <div class="feedback-item" role="group" aria-roledescription="slide" aria-label="Feedback 3 of 3">
            <div class="avatar" aria-hidden="true">
                <i class="fas fa-user"></i>
            </div>
            <div class="rating" aria-label="5 star rating">
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
            </div>
            <div class="feedback-text">
                <p><strong>Great trip, low price, excellent hotel and...</strong></p>
                <p>We took the 3-day Eastern tour in Nov 24. Stayed at all 5-star hotels. St Reg...</p>
                <span class="author">Dorathy, November 28</span>
            </div>
        </div>
    </div>

    <button class="nav-button prev" aria-label="Previous feedback">
        <i class="fas fa-chevron-left"></i>
    </button>
    <button class="nav-button next" aria-label="Next feedback">
        <i class="fas fa-chevron-right"></i>
    </button>

    <div class="indicators" role="tablist" aria-label="Feedback indicators">
        <div class="indicator active" role="tab" tabindex="0" aria-selected="true" aria-controls="slide1"></div>
        <div class="indicator" role="tab" tabindex="-1" aria-selected="false" aria-controls="slide2"></div>
        <div class="indicator" role="tab" tabindex="-1" aria-selected="false" aria-controls="slide3"></div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const feedbackItems = document.querySelectorAll('.feedback-item');
        const prevBtn = document.querySelector('.nav-button.prev');
        const nextBtn = document.querySelector('.nav-button.next');
        const indicators = document.querySelectorAll('.indicator');

        let currentIndex = 0;

        function showFeedback(index) {
            feedbackItems.forEach((item, i) => {
                item.classList.toggle('active', i === index);
                indicators[i].classList.toggle('active', i === index);
                if (i === index) {
                    item.setAttribute('tabindex', '0');
                } else {
                    item.setAttribute('tabindex', '-1');
                }
            });
            currentIndex = index;
        }

        function showNext() {
            let nextIndex = (currentIndex + 1) % feedbackItems.length;
            showFeedback(nextIndex);
        }

        function showPrev() {
            let prevIndex = (currentIndex - 1 + feedbackItems.length) % feedbackItems.length;
            showFeedback(prevIndex);
        }

        // Navigation buttons
        nextBtn.addEventListener('click', showNext);
        prevBtn.addEventListener('click', showPrev);

        // Indicators click
        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                showFeedback(index);
            });
        });

        // Automatically cycle carousel every 8 seconds
        setInterval(showNext, 8000);

        // Initialize first feedback
        showFeedback(currentIndex);
    });
</script>

<style>
/* Enhanced Full-Width Feedback Carousel Styles */
.feedback-container {
    position: relative;
    width: 100%;
    height: 100vh;
    margin: 0;
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    padding: 0;
    overflow: hidden;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    display: flex;
    align-items: center;
    justify-content: center;
}

.feedback-wrapper {
    position: relative;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.feedback-item {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(0.9);
    width: 80%;
    max-width: 900px;
    opacity: 0;
    transition: all 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 50px;
    background: white;
    border-radius: 20px;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
    border: 1px solid rgba(0, 0, 0, 0.05);
}

.feedback-item.active {
    opacity: 1;
    transform: translate(-50%, -50%) scale(1);
    z-index: 10;
}

.avatar {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background: linear-gradient(135deg, #2a9d8f 0%, #1d7874 100%);
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 25px;
    box-shadow: 0 10px 30px rgba(42, 157, 143, 0.3);
}

.avatar i {
    font-size: 45px;
    color: white;
}

.rating {
    margin-bottom: 25px;
}

.star {
    color: #FFD700;
    font-size: 28px;
    margin: 0 5px;
    text-shadow: 0 3px 10px rgba(255, 215, 0, 0.4);
}

.feedback-text {
    text-align: center;
    max-width: 800px;
    margin-bottom: 25px;
}

.feedback-text p {
    margin-bottom: 20px;
    line-height: 1.8;
    color: #34495e;
    font-size: 20px;
}

.feedback-text p strong {
    color: #264653;
    font-size: 24px;
    display: block;
    margin-bottom: 15px;
    font-weight: 700;
}

.author {
    font-style: italic;
    color: #7f8c8d;
    font-weight: 600;
    font-size: 18px;
    margin-top: 20px;
}

.nav-button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 70px;
    height: 70px;
    border-radius: 50%;
    background: white;
    border: none;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    z-index: 20;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #2a9d8f;
    font-size: 26px;
    transition: all 0.4s ease;
}

.nav-button:hover {
    background: #2a9d8f;
    color: white;
    transform: translateY(-50%) scale(1.2);
    box-shadow: 0 12px 35px rgba(42, 157, 143, 0.3);
}

.nav-button.prev {
    left: 50px;
}

.nav-button.next {
    right: 50px;
}

.indicators {
    position: absolute;
    bottom: 50px;
    left: 0;
    right: 0;
    display: flex;
    justify-content: center;
    gap: 20px;
}

.indicator {
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background: #dfe6e9;
    cursor: pointer;
    transition: all 0.4s ease;
}

.indicator.active {
    background: #2a9d8f;
    transform: scale(1.5);
}

/* Add decorative elements */
.feedback-container::before {
    content: "";
    position: absolute;
    top: -100px;
    right: -100px;
    width: 400px;
    height: 400px;
    border-radius: 50%;
    background: linear-gradient(135deg, rgba(42, 157, 143, 0.1) 0%, rgba(38, 70, 83, 0.1) 100%);
    z-index: 0;
}

.feedback-container::after {
    content: "";
    position: absolute;
    bottom: -150px;
    left: -150px;
    width: 500px;
    height: 500px;
    border-radius: 50%;
    background: linear-gradient(135deg, rgba(233, 196, 106, 0.1) 0%, rgba(255, 215, 0, 0.05) 100%);
    z-index: 0;
}

/* Responsive adjustments */
@media (max-width: 1200px) {
    .feedback-item {
        width: 85%;
        padding: 40px;
    }

    .avatar {
        width: 90px;
        height: 90px;
    }

    .avatar i {
        font-size: 40px;
    }

    .star {
        font-size: 26px;
    }

    .feedback-text p {
        font-size: 19px;
    }

    .feedback-text p strong {
        font-size: 22px;
    }

    .nav-button {
        width: 60px;
        height: 60px;
        font-size: 24px;
    }

    .nav-button.prev {
        left: 30px;
    }

    .nav-button.next {
        right: 30px;
    }
}

@media (max-width: 992px) {
    .feedback-item {
        width: 90%;
        padding: 35px;
    }

    .nav-button {
        width: 55px;
        height: 55px;
        font-size: 22px;
    }

    .nav-button.prev {
        left: 25px;
    }

    .nav-button.next {
        right: 25px;
    }

    .avatar {
        width: 80px;
        height: 80px;
    }

    .avatar i {
        font-size: 36px;
    }

    .star {
        font-size: 24px;
    }

    .feedback-text p {
        font-size: 18px;
    }

    .feedback-text p strong {
        font-size: 20px;
    }

    .indicators {
        bottom: 40px;
    }

    .indicator {
        width: 15px;
        height: 15px;
    }
}

@media (max-width: 768px) {
    .feedback-item {
        width: 95%;
        padding: 30px 25px;
    }

    .nav-button {
        width: 50px;
        height: 50px;
        font-size: 20px;
    }

    .nav-button.prev {
        left: 20px;
    }

    .nav-button.next {
        right: 20px;
    }

    .avatar {
        width: 70px;
        height: 70px;
    }

    .avatar i {
        font-size: 32px;
    }

    .star {
        font-size: 22px;
    }

    .feedback-text p {
        font-size: 17px;
    }

    .feedback-text p strong {
        font-size: 19px;
    }

    .author {
        font-size: 16px;
    }

    .indicators {
        bottom: 30px;
    }

    .indicator {
        width: 13px;
        height: 13px;
    }
}

@media (max-width: 480px) {
    .feedback-item {
        width: 95%;
        padding: 25px 20px;
        height: auto;
        min-height: 500px;
    }

    .nav-button {
        width: 45px;
        height: 45px;
        font-size: 18px;
    }

    .nav-button.prev {
        left: 15px;
    }

    .nav-button.next {
        right: 15px;
    }

    .avatar {
        width: 60px;
        height: 60px;
    }

    .avatar i {
        font-size: 28px;
    }

    .star {
        font-size: 20px;
    }

    .feedback-text p {
        font-size: 16px;
    }

    .feedback-text p strong {
        font-size: 18px;
    }

    .author {
        font-size: 15px;
    }

    .indicators {
        bottom: 25px;
    }

    .indicator {
        width: 12px;
        height: 12px;
    }

    .feedback-container {
        height: 80vh;
    }
}
</style>
