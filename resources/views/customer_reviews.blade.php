@extends('layouts.app')

@section('content')
<div class="customer-reviews">
    <h1>Explore the World Through Our Customers' Eyes</h1>
    <p class="intro">Discover what travelers have to say about their unforgettable journeys with us.</p>

    <div id="reviews-carousel" class="carousel">
        <!-- Dynamic reviews will be loaded here -->
        @foreach ($reviews as $review)
        <div class="carousel-item">
            <blockquote>
                <p>"{{ $review->review }}"</p>
                <footer>- {{ $review->name }}</footer>
            </blockquote>
        </div>
        @endforeach
    </div>

    <form id="review-form" class="animated-form">
        <h2>Share Your Experience</h2>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="review">Review:</label>
            <textarea id="review" name="review" required></textarea>
        </div>
        <button type="submit" class="btn-submit">Submit</button>
    </form>
</div>
@endsection