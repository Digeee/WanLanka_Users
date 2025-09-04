@extends('layouts.master')

@section('content')
<div class="feedback-container">
    <div class="feedback-wrapper">
        <div class="feedback-item active">
            <div class="rating">
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
            </div>
            <div class="feedback-text">
                <p><strong>Superb client delivery</strong></p>
                <p>Very tentative. Lots of resources; Great communications as follow-up efforts...</p>
                <span class="author">Elle, January 28</span>
            </div>
        </div>

        <div class="feedback-item">
            <div class="rating">
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
            </div>
            <div class="feedback-text">
                <p><strong>My first tour with Ritz Tours to Thailand</strong></p>
                <p>My first tour with Ritz Tours to Thailand and it won’t be my last! Loved it! Very...</p>
                <span class="author">Clara Fitzgerald, December 18</span>
            </div>
        </div>

        <div class="feedback-item">
            <div class="rating">
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
            </div>
            <div class="feedback-text">
                <p><strong>Great trip, low price, excellent hotel and...</strong></p>
                <p>We took the 12-day Thailand tour in Nov 24. Stayed at all 5-star hotels. St Reg...</p>
                <span class="author">Eve-, November 28</span>
            </div>
        </div>
    </div>

    <button id="next-feedback" class="next-feedback">Next</button>
</div>
<script>
    document.getElementById('next-feedback').addEventListener('click', function() {
        const current = document.querySelector('.feedback-item.active');
        const next = current.nextElementSibling || document.querySelector('.feedback-item:first-child');

        current.classList.remove('active');
        next.classList.add('active');
    });
</script>

@endsection
