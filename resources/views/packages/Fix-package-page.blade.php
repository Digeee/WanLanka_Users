@extends('layouts.master')
@include('include.header')

   <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display&family=Poppins:wght@400;600&display=swap');
        /* Reset & base */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
            padding: 2rem;
            color: #fff;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            text-align: center;
            margin-bottom: 2rem;
            text-shadow: 0 2px 5px rgba(0,0,0,0.3);
        }
        /* Container for packages */
        .packages-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        /* Glassmorphism card */
        .package-card {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: default;
        }
        .package-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 40px 0 rgba(31, 38, 135, 0.6);
            cursor: pointer;
        }
        /* Package title */
        .package-card h2 {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            margin-bottom: 1rem;
            text-align: center;
            color: #fff;
            text-shadow: 0 1px 3px rgba(0,0,0,0.5);
        }
        /* Package image */
        .package-card img {
            width: 100%;
            max-width: 280px;
            height: 180px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 1rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.25);
            transition: transform 0.3s ease;
        }
        .package-card:hover img {
            transform: scale(1.05);
        }
        /* Description */
        .package-card p {
            font-size: 1rem;
            line-height: 1.5;
            color: #e0e0e0;
            margin-bottom: 1.5rem;
            text-align: center;
            min-height: 60px;
        }
        /* Read More button */
        .btn-read-more {
            font-family: 'Poppins', sans-serif;
            background: rgba(255, 255, 255, 0.25);
            color: #fff;
            padding: 0.6rem 1.4rem;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.3);
            transition: background-color 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease;
            user-select: none;
        }
        .btn-read-more:hover,
        .btn-read-more:focus {
            background: rgba(255, 255, 255, 0.45);
            box-shadow: 0 6px 20px rgba(255, 255, 255, 0.6);
            transform: translateY(-3px);
            outline: none;
        }
        /* No packages message */
        .no-packages {
            text-align: center;
            font-size: 1.2rem;
            color: #f0f0f0;
            font-style: italic;
            margin-top: 3rem;
            text-shadow: 0 1px 3px rgba(0,0,0,0.4);
        }
        /* Responsive tweaks */
        @media (max-width: 480px) {
            h1 {
                font-size: 2.2rem;
            }
            .package-card img {
                height: 140px;
            }
        }
    </style>

<h1>Fixed Packages</h1>

       @foreach ($packages as $package)
           <div class="package-card">
               <h2>{{ $package['package_name'] }}</h2>
               @if ($package['cover_image'])
                   <img src="{{ $package['cover_image'] }}" alt="{{ $package['package_name'] }} Image" onerror="this.src='{{ asset('images/placeholder.jpg') }}';">
               @else
                   <img src="{{ asset('images/placeholder.jpg') }}" alt="No Image">
               @endif
               <p>{{ $package['description'] ?? 'No description available' }}</p>
               <a href="/packages/{{ $package['id'] }}" class="btn-read-more">Read More</a>
           </div>
       @endforeach

       @if (empty($packages))
           <p>No packages available.</p>
       @endif



@include('include.footer')
