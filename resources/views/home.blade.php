@extends('layouts.app')

@section('title', 'Home | WanLanka')

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
