<div class="trending-slider">
    <style>
        .trending-slider {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            overflow: hidden;
            font-family: Arial, sans-serif;
        }

        .trending-slider .slider-container {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .trending-slider input[name="trending-slider"] {
            display: none;
        }

        .trending-slider .slide {
            min-width: 100%;
            box-sizing: border-box;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
        }

        .trending-slider .slide img {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
            border-radius: 10px;
        }

        .trending-slider .slide-content {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            color: #fff;
            background: rgba(0,0,0,0.4);
            padding: 15px 25px;
            border-radius: 8px;
        }

        .trending-slider .slide-tag {
            font-size: 14px;
            font-weight: bold;
            color: #ffdd57;
            margin-bottom: 5px;
        }

        .trending-slider .slide-title {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .trending-slider .slide-description {
            font-size: 16px;
        }

        .trending-slider .slider-nav {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
        }

        .trending-slider .nav-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #ddd;
            cursor: pointer;
        }

        .trending-slider input#trend-slide-1:checked ~ .slider-container {
            transform: translateX(0%);
        }

        .trending-slider input#trend-slide-2:checked ~ .slider-container {
            transform: translateX(-100%);
        }

        .trending-slider input#trend-slide-3:checked ~ .slider-container {
            transform: translateX(-200%);
        }

        .trending-slider input#trend-slide-4:checked ~ .slider-container {
            transform: translateX(-300%);
        }

        .trending-slider input#trend-slide-1:checked ~ .slider-nav label[for="trend-slide-1"],
        .trending-slider input#trend-slide-2:checked ~ .slider-nav label[for="trend-slide-2"],
        .trending-slider input#trend-slide-3:checked ~ .slider-nav label[for="trend-slide-3"],
        .trending-slider input#trend-slide-4:checked ~ .slider-nav label[for="trend-slide-4"] {
            background: #ffdd57;
        }
    </style>

    <!-- Slides -->
    <input type="radio" name="trending-slider" id="trend-slide-1" checked>
    <input type="radio" name="trending-slider" id="trend-slide-2">
    <input type="radio" name="trending-slider" id="trend-slide-3">
    <input type="radio" name="trending-slider" id="trend-slide-4">

    <div class="slider-container">
        <!-- Slide 1 -->
        <div class="slide">
            <img src="{{ asset('images/trending-1.jpg') }}" alt="Beach Paradise">
            <div class="slide-content">
                <div class="slide-tag">Beach</div>
                <h2 class="slide-title">Beach Paradise</h2>
                <p class="slide-description">Relax on golden sands and enjoy crystal-clear waters.</p>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="slide">
            <img src="{{ asset('images/trending-2.jpg') }}" alt="Mountain Trekking">
            <div class="slide-content">
                <div class="slide-tag">Adventure</div>
                <h2 class="slide-title">Mountain Trekking</h2>
                <p class="slide-description">Experience the thrill of high-altitude trekking.</p>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="slide">
            <img src="{{ asset('images/trending-3.jpg') }}" alt="City Lights">
            <div class="slide-content">
                <div class="slide-tag">Urban</div>
                <h2 class="slide-title">City Lights</h2>
                <p class="slide-description">Explore vibrant cities full of culture and nightlife.</p>
            </div>
        </div>

        <!-- Slide 4 -->
        <div class="slide">
            <img src="{{ asset('images/trending-4.jpg') }}" alt="Cultural Heritage">
            <div class="slide-content">
                <div class="slide-tag">Culture</div>
                <h2 class="slide-title">Cultural Heritage</h2>
                <p class="slide-description">Discover historic sites and local traditions.</p>
            </div>
        </div>
    </div>

    <!-- Navigation Dots -->
    <div class="slider-nav">
        <label for="trend-slide-1" class="nav-dot"></label>
        <label for="trend-slide-2" class="nav-dot"></label>
        <label for="trend-slide-3" class="nav-dot"></label>
        <label for="trend-slide-4" class="nav-dot"></label>
    </div>
</div>
