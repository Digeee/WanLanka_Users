@extends('layouts.app')

@section('title', 'Home | WanLanka')

@section('component-styles')
  <link href="{{ asset('css/home-slider.css') }}" rel="stylesheet">
  <link href="{{ asset('css/home-cta.css') }}" rel="stylesheet">
  <link href="{{ asset('css/home-about.css') }}" rel="stylesheet">
  <link href="{{ asset('css/home-packages.css') }}" rel="stylesheet">
  <link href="{{ asset('css/home-feedback.css') }}" rel="stylesheet">
  <link href="{{ asset('css/home-contact.css') }}" rel="stylesheet">
@endsection

@section('content')
  {{-- Hero / Slider --}}
  @includeIf('components.home-slider')

  {{-- Call to Action --}}
  @includeIf('components.home-cta')

  {{-- About --}}
  @includeIf('components.home-about')

  {{-- Packages / Featured Trips --}}
  @includeIf('components.home-package')

  {{-- Testimonials / Feedback --}}
  @includeIf('components.home-feedback')

  {{-- Contact teaser / newsletter --}}
  @includeIf('components.home-contact')

@endsection

@section('component-scripts')
  <script>
  document.addEventListener('DOMContentLoaded', function() {
      // Get all slider elements
      const slider = document.querySelector('.tourism-slider');
      if (!slider) return;

      const slides = slider.querySelectorAll('.slide');
      const radios = slider.querySelectorAll('input[type="radio"]');
      const navDots = slider.querySelectorAll('.nav-dot');

      if (slides.length === 0 || radios.length === 0 || navDots.length === 0) return;

      let currentSlide = 0;
      const totalSlides = slides.length;
      let autoSlideInterval;

      // Function to show a specific slide
      function showSlide(index) {
          // Remove active class from all slides and dots
          slides.forEach(slide => slide.classList.remove('active'));
          navDots.forEach(dot => dot.classList.remove('active'));

          // Add active class to current slide and corresponding dot
          slides[index].classList.add('active');
          navDots[index].classList.add('active');

          // Check the corresponding radio button
          radios[index].checked = true;

          currentSlide = index;
      }

      // Set up navigation dots click events
      navDots.forEach((dot, index) => {
          dot.addEventListener('click', () => {
              showSlide(index);
              resetAutoSlide();
          });
      });

      // Set up radio button change events
      radios.forEach((radio, index) => {
          radio.addEventListener('change', () => {
              if (radio.checked) {
                  showSlide(index);
                  resetAutoSlide();
              }
          });
      });

      // Reset auto slide timer
      function resetAutoSlide() {
          clearInterval(autoSlideInterval);
          autoSlideInterval = setInterval(nextSlide, 5000);
      }

      // Function to go to next slide
      function nextSlide() {
          const nextIndex = (currentSlide + 1) % totalSlides;
          showSlide(nextIndex);
      }

      // Pause auto slide when user hovers over slider
      slider.addEventListener('mouseenter', () => {
          clearInterval(autoSlideInterval);
      });

      slider.addEventListener('mouseleave', () => {
          resetAutoSlide();
      });

      // Initialize first slide
      showSlide(0);

      // Start auto sliding
      autoSlideInterval = setInterval(nextSlide, 5000);
  });
  </script>
@endsection
