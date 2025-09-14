
<link href="{{ asset('css/home-slider.css') }}" rel="stylesheet">
<div class="c">
    <input type="radio" name="a" id="cr-1" checked>
    <label for="cr-1"></label>
    <div class="ci active">
        <h2 class="ch">What do you know?</h2>
        <img src="{{ asset('images/slider-image-1.jpg') }}" alt="Snow on leafs">
    </div>

    <input type="radio" name="a" id="cr-2">
    <label for="cr-2"></label>
    <div class="ci">
        <h2 class="ch">Look from inside?</h2>
        <img src="{{ asset('images/slider-image-2.jpg') }}" alt="Trees">
    </div>

    <input type="radio" name="a" id="cr-3">
    <label for="cr-3"></label>
    <div class="ci">
        <h2 class="ch">In the mountains?</h2>
        <img src="{{ asset('images/slider-image-3.jpg') }}" alt="Mountains and houses">
    </div>

    <input type="radio" name="a" id="cr-4">
    <label for="cr-4"></label>
    <div class="ci">
        <h2 class="ch">Above looks beautiful?</h2>
        <img src="{{ asset('images/slider-image-4.jpg') }}" alt="Sky and mountains">
    </div>

    <div class="slider-nav">
        <label for="cr-1"></label>
        <label for="cr-2"></label>
        <label for="cr-3"></label>
        <label for="cr-4"></label>
    </div>
</div>
