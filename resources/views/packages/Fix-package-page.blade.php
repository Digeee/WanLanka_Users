@extends('layouts.master')
@include('include.header')


<style>
           .package-card {
               margin-bottom: 20px;
               padding: 15px;
               border-radius: 10px;
               background: #f1f1f1;
               box-shadow: 5px 5px 10px #bebebe,
                           -5px -5px 10px #ffffff;
           }
           .package-card img {
               width: 100%;
               border-radius: 10px;
           }
           .btn-read-more {
               padding: 10px 20px;
               border-radius: 10px;
               background: #e0e0e0;
               box-shadow: 5px 5px 10px #bebebe,
                           -5px -5px 10px #ffffff;
               text-decoration: none;
               color: #333;
               font-weight: 600;
           }
           .btn-read-more:hover {
               box-shadow: inset 3px 3px 6px #bebebe,
                           inset -3px -3px 6px #ffffff;
           }
       </style>

       <h1>Fixed Packages</h1>

       @foreach ($packages as $package)
           <div class="package-card">
               <h2>{{ $package['package_name'] }}</h2>
               <img src="{{ $package['cover_image'] }}" alt="{{ $package['package_name'] }} Image" onerror="this.src='{{ asset('images/placeholder.jpg') }}';">
               <p>{{ $package['description'] }}</p>
               <a href="/packages/{{ $package['id'] }}" class="btn-read-more">Read More</a>
           </div>
       @endforeach

       @if (empty($packages))
           <p>No packages available.</p>
       @endif




@include('include.footer')
