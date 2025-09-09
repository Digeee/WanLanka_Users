@extends('layouts.master')
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
