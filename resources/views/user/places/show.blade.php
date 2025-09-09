@extends('layouts.master')
@include('include.header')

<br><br><br><br><br>

<section class="place-details">
    <div class="container">
        <h1 class="text-3xl font-bold">{{ $place->name }}</h1>

        @if($place->image)
            <img src="{{ asset('storage/'.$place->image) }}" class="w-96 h-64 object-cover rounded-xl" alt="{{ $place->name }}">
        @endif

        <p><strong>Province:</strong> {{ $place->province }}</p>
        <p><strong>District:</strong> {{ $place->district }}</p>
        <p><strong>Location:</strong> {{ $place->location }}</p>
        <p><strong>Description:</strong> {{ $place->description }}</p>
        <p><strong>Weather:</strong> {{ $place->weather }}</p>
        <p><strong>Best Time to Visit:</strong> {{ $place->best_time_to_visit }}</p>
        <p><strong>Entry Fee:</strong> {{ $place->entry_fee }}</p>
    </div>
</section>

@include('include.footer')
