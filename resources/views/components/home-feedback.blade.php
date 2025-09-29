<link href="{{ asset('css/home-feedback.css') }}" rel="stylesheet">

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
