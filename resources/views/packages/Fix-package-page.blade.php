@extends('layouts.master')
@include('include.header')

<div class="container mt-4">
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
                        <h2>{{ $package['package_name'] }}</h2>
                        @if ($package['cover_image'])
                            <img src="{{ $package['cover_image'] }}" alt="{{ $package['package_name'] }} Image" onerror="this.src='{{ asset('images/placeholder.jpg') }}';">
                        @else
                            <img src="{{ asset('images/placeholder.jpg') }}" alt="No Image">
                        @endif
                        <p>{{ $package['description'] ?? 'No description available' }}</p>
                        <p><strong>Price:</strong> ${{ $package['price'] ?? 'N/A' }}</p>
                        <a href="/packages/{{ $package['id'] }}" class="btn btn-primary btn-read-more">Read More</a>
                    </div>
                @endforeach
                @if (empty($packages))
                    <p>No packages available.</p>
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
            if (value) params.append(key, value); // Only include non-empty values
        });

        packageList.innerHTML = '<p>Loading...</p>';
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
                packageList.innerHTML = '<p>No packages available.</p>';
                return;
            }
            data.forEach(package => {
                const card = document.createElement('div');
                card.className = 'package-card';
                card.innerHTML = `
                    <h2>${package.package_name}</h2>
                    <img src="${package.cover_image || '{{ asset('images/placeholder.jpg') }}'}" alt="${package.package_name} Image" onerror="this.src='{{ asset('images/placeholder.jpg') }}';">
                    <p>${package.description || 'No description available'}</p>
                    <p><strong>Price:</strong> $${package.price || 'N/A'}</p>
                    <a href="/packages/${package.id}" class="btn btn-primary btn-read-more">Read More</a>
                `;
                packageList.appendChild(card);
            });
        })
        .catch(error => {
            console.error('Error fetching packages:', error);
            packageList.innerHTML = '<p>Error loading packages. Please try again.</p>';
        });
    }
});
</script>

<style>
.container {
    margin-top: 20px;
}
.packages {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}
.package-card {
    width: 300px;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background: #fff;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}
.package-card img {
    max-width: 100%;
    height: auto;
    border-radius: 5px;
}
.package-card h2 {
    font-size: 1.5rem;
    margin-bottom: 10px;
}
.package-card p {
    margin-bottom: 10px;
}
.btn-read-more {
    padding: 8px 15px;
    border-radius: 5px;
    text-decoration: none;
}
</style>

@include('include.footer')
