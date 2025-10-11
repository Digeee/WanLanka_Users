@extends('layouts.master')
@include('include.header')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    :root {
        --primary: #667eea;
        --primary-dark: #764ba2;
        --secondary: #f093fb;
        --danger: #ff4757;
        --gray: #6c757d;
        --light: #f8f9fa;
        --white: #ffffff;
        --shadow: 0 5px 20px rgba(0,0,0,.08);
        --shadow-hover: 0 15px 40px rgba(0,0,0,.15);
        --radius: 16px;
        --transition: .3s ease;
    }

    * {
        box-sizing: border-box;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 100vh;
    }

    .main-container {
        max-width: 1400px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .page-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .page-title {
        font-size: 3rem;
        font-weight: 700;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 10px;
        letter-spacing: -1px;
    }

    .page-subtitle {
        font-size: 1.2rem;
        color: var(--gray);
        font-weight: 300;
    }

    .content-wrapper {
        display: flex;
        gap: 30px;
        align-items: flex-start;
    }

    .sidebar-col {
        flex: 0 0 300px;
        position: sticky;
        top: 30px;
    }

    .packages-col {
        flex: 1;
        min-width: 0;
    }

    .packages-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
        margin-top: 20px;
    }

    .package-card {
        background: var(--white);
        border-radius: var(--radius);
        overflow: hidden;
        box-shadow: var(--shadow);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
    }

    .package-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: var(--shadow-hover);
    }

    .package-image-wrapper {
        position: relative;
        height: 220px;
        overflow: hidden;
    }

    .package-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .package-card:hover img {
        transform: scale(1.1);
    }

    .package-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
        color: var(--white);
        padding: 6px 16px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        box-shadow: 0 4px 15px rgba(238, 90, 36, 0.4);
        z-index: 2;
    }

    .package-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .package-card:hover .package-overlay {
        opacity: 1;
    }

    .overlay-content {
        text-align: center;
        color: var(--white);
        transform: translateY(20px);
        transition: transform 0.3s ease;
    }

    .package-card:hover .overlay-content {
        transform: translateY(0);
    }

    .overlay-icon {
        font-size: 3rem;
        margin-bottom: 10px;
    }

    .package-content {
        padding: 25px;
    }

    .package-title {
        font-size: 1.4rem;
        font-weight: 600;
        color: #2d3436;
        margin-bottom: 12px;
        line-height: 1.3;
    }

    .package-description {
        color: #636e72;
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 15px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .package-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px solid rgba(0,0,0,0.05);
    }

    .package-price {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--primary);
    }

    .btn-read-more {
        display: inline-block;
        padding: 10px 20px;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        color: var(--white);
        text-decoration: none;
        border-radius: 25px;
        font-weight: 500;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        position: relative;
        overflow: hidden;
    }

    .btn-read-more:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.5);
    }

    .btn-read-more::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
        transition: left 0.5s;
    }

    .btn-read-more:hover::before {
        left: 100%;
    }

    .no-packages {
        text-align: center;
        padding: 80px 20px;
        color: var(--gray);
        font-size: 1.2rem;
    }

    .no-packages-icon {
        font-size: 5rem;
        margin-bottom: 20px;
        opacity: 0.3;
    }

    /* Loading animation */
    .loading {
        display: inline-block;
        width: 20px;
        height: 20px;
        border: 3px solid rgba(255,255,255,.3);
        border-radius: 50%;
        border-top-color: var(--white);
        animation: spin 1s ease-in-out infinite;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    /* Responsive */
    @media (max-width: 1200px) {
        .packages-grid {
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        }
    }

    @media (max-width: 768px) {
        .content-wrapper {
            flex-direction: column;
        }

        .sidebar-col {
            flex: 0 0 auto;
            width: 100%;
            position: relative;
            top: 0;
        }

        .page-title {
            font-size: 2.5rem;
        }

        .packages-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 480px) {
        .page-title {
            font-size: 2rem;
        }
    }
</style>

<div class="main-container">
    <div class="page-header">
        <h1 class="page-title">Fixed Packages</h1>
        <p class="page-subtitle">Discover our exclusive collection of curated experiences</p>
    </div>

    <div class="content-wrapper">
        <!-- Sidebar -->
        <div class="sidebar-col">
            @include('include.package-filter-sidebar')
        </div>

        <!-- Package List -->
        <div class="packages-col">
            <div id="package-list" class="packages-grid">
                @foreach ($packages as $index => $package)
                    <div class="package-card loading-animation" style="animation-delay: {{ $index * 0.1 }}s">
                        <div class="package-image-wrapper">
                            @if ($package['cover_image'])
                                <img src="{{ $package['cover_image'] }}" alt="{{ $package['package_name'] }} Image" onerror="this.src='{{ asset('images/placeholder.jpg') }}';">
                            @else
                                <img src="{{ asset('images/placeholder.jpg') }}" alt="No Image">
                            @endif
                            <div class="package-badge">HOT</div>
                            <div class="package-overlay">
                                <div class="overlay-content">
                                    <div class="overlay-icon">✨</div>
                                    <p>View Details</p>
                                </div>
                            </div>
                        </div>
                        <div class="package-content">
                            <h2 class="package-title">{{ $package['package_name'] }}</h2>
                            <p class="package-description">{{ $package['description'] ?? 'No description available' }}</p>
                            <div class="package-footer">
                                <div class="package-price">RS{{ $package['price'] ?? 'N/A' }}</div>
                                <a href="/packages/{{ $package['id'] }}" class="btn-read-more">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                @if (empty($packages))
                    <div class="no-packages">
                        <div class="no-packages-icon">📦</div>
                        <p>No packages available at the moment</p>
                        <p style="color: #adb5bd; margin-top: 10px;">Check back soon for exciting new offers!</p>
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

    // Validate form inputs
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        const minPrice = form.querySelector('#min_price').value;
        const maxPrice = form.querySelector('#max_price').value;
        if (minPrice && maxPrice && parseFloat(minPrice) > parseFloat(maxPrice)) {
            alert('Minimum price cannot be greater than maximum price.');
            return;
        }
        fetchPackages();
    });

    // Reset filters
    resetButton.addEventListener('click', function () {
        form.reset();
        fetchPackages();
    });

    function fetchPackages() {
        const formData = new FormData(form);
        const params = new URLSearchParams();
        formData.forEach((value, key) => {
            if (value) params.append(key, value);
        });

        packageList.innerHTML = '<div class="no-packages"><div class="loading"></div><p>Loading packages...</p></div>';

        fetch(`http://127.0.0.1:8000/api/packages?${params.toString()}`, {
            headers: {
                'Authorization': 'Bearer 1|8OImmqdUzzCwAOzoksoHFeOjpz1iSWSLTbTL3geC43aa48db',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) throw new Error('Failed to fetch packages');
            return response.json();
        })
        .then(data => {
            packageList.innerHTML = '';
            if (data.length === 0) {
                packageList.innerHTML = `
                    <div class="no-packages">
                        <div class="no-packages-icon">📦</div>
                        <p>No packages found with selected filters</p>
                        <p style="color: #adb5bd; margin-top: 10px;">Try adjusting your filters</p>
                    </div>
                `;
                return;
            }
            data.forEach((package, index) => {
                const card = document.createElement('div');
                card.className = 'package-card loading-animation';
                card.style.animationDelay = `${index * 0.1}s`;
                card.innerHTML = `
                    <div class="package-image-wrapper">
                        <img src="${package.cover_image || '{{ asset('images/placeholder.jpg') }}'}" alt="${package.package_name}" onerror="this.src='{{ asset('images/placeholder.jpg') }}';">
                        <div class="package-badge">FEATURED</div>
                        <div class="package-overlay">
                            <div class="overlay-content">
                                <div class="overlay-icon">✨</div>
                                <p>View Details</p>
                            </div>
                        </div>
                    </div>
                    <div class="package-content">
                        <h2 class="package-title">${package.package_name}</h2>
                        <p class="package-description">${package.description || 'No description available'}</p>
                        <div class="package-footer">
                            <div class="package-price">$${package.price || 'N/A'}</div>
                            <a href="/packages/${package.id}" class="btn-read-more">Read More</a>
                        </div>
                    </div>
                `;
                packageList.appendChild(card);
            });
        })
        .catch(error => {
            console.error('Error fetching packages:', error);
            packageList.innerHTML = `
                <div class="no-packages">
                    <div class="no-packages-icon">⚠️</div>
                    <p>Error loading packages</p>
                    <p style="color: #adb5bd; margin-top: 10px;">Please try again later</p>
                </div>
            `;
        });
    }
});
</script>

@include('include.footer')
