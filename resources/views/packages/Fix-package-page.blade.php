@extends('layouts.master')
@include('include.header')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    * {
        box-sizing: border-box;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
    }

    .container {
        display: flex;
        margin-top: 40px;
        max-width: 1400px;
        margin-left: auto;
        margin-right: auto;
        padding: 0 20px;
    }

    .row {
        display: flex;
        width: 100%;
        gap: 30px;
    }

    .col-md-3 {
        flex: 0 0 280px;
        max-width: 280px;
    }

    .col-md-9 {
        flex: 1;
        min-width: 0;
    }

    h1 {
        font-size: 2.5rem;
        font-weight: 600;
        color: #2d3436;
        margin-bottom: 30px;
        text-align: left;
    }

    .packages {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 25px;
    }

    .package-card {
        background: #ffffff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        border: 1px solid #e9ecef;
    }

    .package-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.12);
    }

    .package-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .package-card:hover img {
        transform: scale(1.05);
    }

    .package-card h2 {
        font-size: 1.3rem;
        font-weight: 600;
        color: #2d3436;
        margin: 20px 20px 10px;
        line-height: 1.4;
    }

    .package-card p {
        color: #636e72;
        font-size: 0.95rem;
        line-height: 1.6;
        margin: 0 20px 15px;
    }

    .package-price {
        font-size: 1.5rem;
        font-weight: 700;
        color: #667eea;
        margin: 0 20px 20px;
    }

    .btn-read-more {
        display: inline-block;
        margin: 0 20px 20px;
        padding: 10px 20px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        text-decoration: none;
        border-radius: 25px;
        font-weight: 500;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }

    .btn-read-more:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.5);
    }

    .no-packages {
        text-align: center;
        padding: 60px 20px;
        color: #6c757d;
        font-size: 1.1rem;
    }

    @media (max-width: 1200px) {
        .packages {
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        }
    }

    @media (max-width: 768px) {
        .row {
            flex-direction: column;
        }

        .col-md-3 {
            flex: 0 0 auto;
            max-width: 100%;
            margin-bottom: 30px;
        }

        .col-md-9 {
            padding-left: 0;
        }

        h1 {
            font-size: 2rem;
            text-align: center;
        }

        .packages {
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        }
    }

    @media (max-width: 480px) {
        .packages {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="container">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            @include('include.package-filter-sidebar')
        </div>
        <!-- Package List -->
        <div class="col-md-9">
            <h1>Fixed Packages</h1>
            <div id="package-list" class="packages">
                @foreach ($packages as $package)
                    <div class="package-card">
                        @if ($package['cover_image'])
                            <img src="{{ $package['cover_image'] }}" alt="{{ $package['package_name'] }} Image" onerror="this.src='{{ asset('images/placeholder.jpg') }}';">
                        @else
                            <img src="{{ asset('images/placeholder.jpg') }}" alt="No Image">
                        @endif
                        <h2>{{ $package['package_name'] }}</h2>
                        <p>{{ $package['description'] ?? 'No description available' }}</p>
                        <p class="package-price">${{ $package['price'] ?? 'N/A' }}</p>
                        <a href="/packages/{{ $package['id'] }}" class="btn-read-more">Read More</a>
                    </div>
                @endforeach
                @if (empty($packages))
                    <div class="no-packages">
                        <p>No packages available.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('package-filter-form');
    const resetButton = document.getElementById('reset-filters');
    const packageList = document.getElementById('package-list');

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        fetchPackages();
    });

    resetButton.addEventListener('click', function () {
        form.reset();
        fetchPackages();
    });

    function fetchPackages() {
        const formData = new FormData(form);
        const params = new URLSearchParams(formData).toString();

        fetch(`http://127.0.0.1:8000/api/packages?${params}`, {
            headers: {
                'Authorization': 'Bearer 1|8OImmqdUzzCwAOzoksoHFeOjpz1iSWSLTbTL3geC43aa48db',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            packageList.innerHTML = '';
            if (data.length === 0) {
                packageList.innerHTML = '<div class="no-packages"><p>No packages available.</p></div>';
                return;
            }
            data.forEach(package => {
                const card = document.createElement('div');
                card.className = 'package-card';
                card.innerHTML = `
                    <img src="${package.cover_image || '{{ asset('images/placeholder.jpg') }}'}" alt="${package.package_name} Image" onerror="this.src='{{ asset('images/placeholder.jpg') }}';">
                    <h2>${package.package_name}</h2>
                    <p>${package.description || 'No description available'}</p>
                    <p class="package-price">$${package.price || 'N/A'}</p>
                    <a href="/packages/${package.id}" class="btn-read-more">Read More</a>
                `;
                packageList.appendChild(card);
            });
        })
        .catch(error => {
            console.error('Error fetching packages:', error);
            packageList.innerHTML = '<div class="no-packages"><p>Error loading packages.</p></div>';
        });
    }
});
</script>

@include('include.footer')
