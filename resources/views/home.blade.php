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
