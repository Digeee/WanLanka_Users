@extends('layouts.app')

@section('title', 'Design Your Journey')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
    :root {
        --primary: #4361ee;
        --primary-dark: #3a56d4;
        --secondary: #7209b7;
        --accent: #4cc9f0;
        --light: #f8f9fa;
        --dark: #212529;
        --success: #4ade80;
        --warning: #facc15;
        --danger: #f87171;
        --gray-100: #f8f9fa;
        --gray-200: #e9ecef;
        --gray-300: #dee2e6;
        --gray-400: #ced4da;
        --gray-500: #adb5bd;
        --gray-600: #6c757d;
        --gray-700: #495057;
        --gray-800: #343a40;
        --gray-900: #212529;
        --shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        --radius: 16px;
        --transition: all 0.3s ease;
    }

    * {
        box-sizing: border-box;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #f5f7fa 0%, #e4edf5 100%);
        color: var(--gray-800);
        line-height: 1.6;
    }

    .custom-package-container {
        min-height: 100vh;
        padding: 2rem 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .form-card {
        background: white;
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        overflow: hidden;
        transition: var(--transition);
        max-width: 1200px;
        width: 100%;
        margin: 0 auto;
    }

    .form-header {
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        color: white;
        padding: 3rem 2rem;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .form-header::before {
        content: "";
        position: absolute;
        top: -50px;
        right: -50px;
        width: 200px;
        height: 200px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
    }

    .form-header::after {
        content: "";
        position: absolute;
        bottom: -80px;
        left: -80px;
        width: 300px;
        height: 300px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.07);
    }

    .form-header h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin: 0 0 1rem 0;
        position: relative;
        z-index: 2;
    }

    .form-header p {
        font-size: 1.1rem;
        opacity: 0.9;
        max-width: 600px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }

    .form-body {
        padding: 3rem 2rem;
    }

    .form-section {
        margin-bottom: 2.5rem;
        padding: 2rem;
        background: var(--gray-100);
        border-radius: var(--radius);
        border: 1px solid var(--gray-200);
        transition: var(--transition);
        position: relative;
    }

    .form-section:hover {
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        transform: translateY(-3px);
    }

    .section-title {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        color: var(--primary-dark);
    }

    .section-title i {
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 16px;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        font-weight: 600;
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--gray-800);
    }

    .form-control, 
    .form-select {
        width: 100%;
        padding: 1rem;
        border: 2px solid var(--gray-300);
        border-radius: 12px;
        font-family: 'Poppins', sans-serif;
        font-size: 1rem;
        transition: var(--transition);
    }

    .form-control:focus, 
    .form-select:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
    }

    .form-control::placeholder {
        color: var(--gray-500);
    }

    #map {
        height: 300px;
        width: 100%;
        border-radius: 12px;
        margin-top: 1rem;
        border: 1px solid var(--gray-300);
    }

    .btn {
        padding: 0.8rem 1.5rem;
        border-radius: 10px;
        cursor: pointer;
        font-weight: 600;
        border: none;
        transition: var(--transition);
        font-family: 'Poppins', sans-serif;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3);
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, var(--primary-dark) 0%, #2a47c2 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(67, 97, 238, 0.4);
    }

    .btn-secondary {
        background: var(--gray-200);
        color: var(--gray-800);
    }

    .btn-secondary:hover {
        background: var(--gray-300);
        transform: translateY(-2px);
    }

    .btn-add {
        background: linear-gradient(135deg, var(--success) 0%, #2dd4bf 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(76, 201, 240, 0.3);
    }

    .btn-add:hover {
        background: linear-gradient(135deg, #2dd4bf 0%, #0d9488 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(76, 201, 240, 0.4);
    }

    .mode-selector {
        display: flex;
        gap: 1rem;
        margin-top: 1rem;
    }

    .mode-selector .btn {
        flex: 1;
        padding: 1rem;
        font-size: 1rem;
        border: 2px solid transparent;
    }

    .mode-selector .btn.active {
        border-color: var(--primary);
        background: rgba(67, 97, 238, 0.1);
        color: var(--primary);
    }

    .multi-province-set {
        padding: 1.5rem;
        background: white;
        border-radius: 12px;
        border: 1px solid var(--gray-300);
        margin-bottom: 1.5rem;
    }

    .multi-province-set:last-child {
        margin-bottom: 0;
    }

    .form-actions {
        text-align: center;
        margin-top: 2rem;
    }

    .form-actions .btn {
        padding: 1rem 2.5rem;
        font-size: 1.1rem;
        box-shadow: 0 6px 20px rgba(67, 97, 238, 0.4);
    }

    /* Suggestion dropdown */
    #locationSuggestions {
        position: absolute;
        z-index: 999;
        list-style: none;
        margin: 0;
        padding: 0;
        display: none;
        width: 100%;
        background: #fff;
        border: 1px solid var(--gray-300);
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        max-height: 250px;
        overflow-y: auto;
        margin-top: 8px;
    }

    #locationSuggestions li {
        padding: 12px 16px;
        cursor: pointer;
        border-bottom: 1px solid var(--gray-200);
        transition: var(--transition);
    }

    #locationSuggestions li:last-child {
        border-bottom: none;
    }

    #locationSuggestions li:hover {
        background: var(--gray-100);
        padding-left: 20px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .form-header h1 {
            font-size: 2rem;
        }
        
        .form-body {
            padding: 2rem 1.5rem;
        }
        
        .form-section {
            padding: 1.5rem;
        }
        
        .mode-selector {
            flex-direction: column;
        }
        
        .row {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }
        
        .col-md-4 {
            width: 100%;
        }
    }

    /* Loading animation */
    .loading {
        display: inline-block;
        width: 20px;
        height: 20px;
        border: 3px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        border-top-color: white;
        animation: spin 1s ease-in-out infinite;
        margin-right: 10px;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    /* Success message */
    .success-message {
        position: fixed;
        top: 20px;
        right: 20px;
        background: var(--success);
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        display: none;
        z-index: 1000;
        animation: fadeIn 0.5s;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection

@section('content')
<div class="custom-package-container">
    <div class="form-card">
        <div class="form-header">
            <h1>Design Your Journey</h1>
            <p>Craft your perfect travel experience with smart selections</p>
        </div>

        <div class="form-body">
            <form id="travelForm" action="{{ route('custom-packages.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Hidden fields to store JSON data -->
                <input type="hidden" name="destinations" id="destinationsInput">
                <input type="hidden" name="vehicles" id="vehiclesInput">
                <input type="hidden" name="accommodations" id="accommodationsInput">

                <!-- 1️⃣ START LOCATION -->
                <div class="form-section">
                    <h2 class="section-title"><i class="fas fa-map-marker-alt"></i> Start Location</h2>
                    <div style="position: relative;">
                        <input type="text" id="start_location" name="start_location" class="form-control mb-2"
                               placeholder="Enter or select your starting point" autocomplete="off" required>
                        <ul id="locationSuggestions"></ul>
                    </div>
                    <input type="hidden" id="latitude" name="latitude">
                    <input type="hidden" id="longitude" name="longitude">
                    <button type="button" id="getLocationBtn" class="btn btn-secondary mt-2">
                        <i class="fas fa-location-arrow"></i> Use My Location
                    </button>
                    <div id="map"></div>
                </div>

                <!-- 2️⃣ TRAVEL OPTIONS -->
                <div class="form-section">
                    <h2 class="section-title"><i class="fas fa-route"></i> Travel Options</h2>

                    <div class="form-group mb-3">
                        <label class="form-label"><i class="fas fa-map"></i> Choose Province Mode</label>
                        <div class="mode-selector">
                            <button type="button" class="btn btn-primary active" id="btnSingleProvince">Single Province</button>
                            <button type="button" class="btn btn-primary" id="btnMultipleProvince">Multiple Province</button>
                        </div>
                    </div>

                    <!-- SINGLE PROVINCE -->
                    <div id="singleProvinceBlock">
                        <div class="form-group mb-3">
                            <label class="form-label"><i class="fas fa-map"></i> Select Province</label>
                            <select id="provinceSingle" class="form-select mb-2">
                                <option value="">-- Select Province --</option>
                                @foreach ($provinces as $province => $districts)
                                    <option value="{{ $province }}">{{ $province }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label"><i class="fas fa-map-marker-alt"></i> Select District</label>
                            <select id="districtSingle" class="form-select mb-2" disabled>
                                <option value="">-- Select District --</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label"><i class="fas fa-map-pin"></i> Select Place</label>
                            <select id="placeSingle" class="form-select mb-2" disabled>
                                <option value="">-- Select Place --</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label"><i class="fas fa-hotel"></i> Select Accommodation</label>
                            <select id="accommodationSingle" class="form-select mb-2" disabled>
                                <option value="">-- Select Accommodation --</option>
                            </select>
                        </div>

                        <button type="button" id="addSinglePlaceBtn" class="btn btn-add mt-2">
                            <i class="fas fa-plus"></i> Add Place to Itinerary
                        </button>
                    </div>

                    <!-- MULTIPLE PROVINCE -->
                    <div id="multipleProvinceBlock" style="display:none;">
                        <div id="multi-province-container">
                            <div class="multi-province-set mb-3">
                                <div class="form-group">
                                    <label class="form-label"><i class="fas fa-map"></i> Select Province</label>
                                    <select class="provinceMulti form-select mb-2">
                                        <option value="">-- Select Province --</option>
                                        @foreach ($provinces as $province => $districts)
                                            <option value="{{ $province }}">{{ $province }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label"><i class="fas fa-map-marker-alt"></i> Select District</label>
                                    <select class="districtMulti form-select mb-2" disabled>
                                        <option value="">-- Select District --</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label"><i class="fas fa-map-pin"></i> Select Place</label>
                                    <select class="placeMulti form-select mb-2" disabled>
                                        <option value="">-- Select Place --</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label"><i class="fas fa-hotel"></i> Select Accommodation</label>
                                    <select class="accommodationMulti form-select mb-2" disabled>
                                        <option value="">-- Select Accommodation --</option>
                                    </select>
                                </div>

                                <button type="button" class="btn btn-add add-multi-place-btn mt-2">
                                    <i class="fas fa-plus"></i> Add Place to Itinerary
                                </button>
                            </div>
                        </div>
                        <button type="button" id="addPlaceBtn" class="btn btn-add mt-2">
                            <i class="fas fa-plus"></i> Add Another Place
                        </button>
                    </div>
                </div>

                <!-- 3️⃣ PACKAGE DETAILS -->
                <div class="form-section">
                    <h2 class="section-title"><i class="fas fa-info-circle"></i> Package Details</h2>

                    <div class="form-group">
                        <label class="form-label"><i class="fas fa-heading"></i> Package Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Give your package a name" required>
                    </div>

                    <!-- Hidden fields - not displayed to user but still sent to backend -->
                    <input type="hidden" name="description" value="">
                    <input type="hidden" name="image" value="">

                    <!--
                    <div class="form-group">
                        <label class="form-label"><i class="fas fa-align-left"></i> Description</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Describe your travel package"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label"><i class="fas fa-image"></i> Package Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    -->
                </div>

                <!-- 4️⃣ LOGISTICS -->
                <div class="form-section">
                    <h2 class="section-title"><i class="fas fa-calendar-alt"></i> Logistics</h2>

                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label"><i class="fas fa-clock"></i> Duration (days)</label>
                            <input type="number" name="duration" id="duration" class="form-control" min="1" value="5" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label"><i class="fas fa-users"></i> Number of People</label>
                            <input type="number" name="num_people" id="num_people" class="form-control" min="1" value="2" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label"><i class="fas fa-calendar-day"></i> Travel Date</label>
                            <input type="date" name="travel_date" id="travel_date" class="form-control">
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label class="form-label"><i class="fas fa-car"></i> Vehicle Type</label>
                            <select name="vehicle" id="vehicleSelect" class="form-select" required>
                                <option value="">-- Select Vehicle --</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- 5️⃣ SELECTED PLACES -->
                <div class="form-section">
                    <h2 class="section-title"><i class="fas fa-list"></i> Selected Places</h2>
                    <div id="selectedPlacesContainer">
                        <p id="noPlacesMessage">No places selected yet. Add places using the options above.</p>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i> Create My Package
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="success-message" id="successMessage">
    <i class="fas fa-check-circle"></i> Your travel package has been created successfully!
</div>

<!-- Template for selected places (hidden) -->
<div id="selectedPlaceTemplate" style="display: none;">
    <div class="selected-place-item mb-2 p-3 border rounded">
        <div class="d-flex justify-content-between">
            <div>
                <span class="place-name fw-bold"></span> - 
                <span class="accommodation-name text-muted"></span>
            </div>
            <button type="button" class="btn btn-sm btn-danger remove-place-btn">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
</div>

<!-- JS -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const provinces = @json($provinces);
    const places = @json($placesByDistrict);
    const accommodations = @json($accommodationsByDistrict);

    // Debug: Log the data to console
    console.log('Provinces data:', provinces);
    console.log('Places data:', places);
    console.log('Accommodations data:', accommodations);

    // Store selected places
    let selectedPlaces = [];

    /* ---------- MAP ---------- */
    const map = L.map('map').setView([7.8731, 80.7718], 7);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19, 
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    
    let marker = null;
    const latInput = document.getElementById('latitude');
    const lonInput = document.getElementById('longitude');
    const startInput = document.getElementById('start_location');

    function updateMarker(lat, lon) {
        if (marker) map.removeLayer(marker);
        marker = L.marker([lat, lon]).addTo(map);
        map.setView([lat, lon], 13);
    }

    map.on('click', e => {
        // Check if the clicked location is in Sri Lanka by reverse geocoding
        fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${e.latlng.lat}&lon=${e.latlng.lng}&addressdetails=1`)
            .then(res => res.json())
            .then(data => {
                // Check if the location is in Sri Lanka
                if (data.address && data.address.country_code === 'lk') {
                    updateMarker(e.latlng.lat, e.latlng.lng);
                    latInput.value = e.latlng.lat;
                    lonInput.value = e.latlng.lng;
                    
                    if (data.display_name) {
                        startInput.value = data.display_name;
                    } else {
                        startInput.value = `Lat: ${e.latlng.lat.toFixed(6)}, Lng: ${e.latlng.lng.toFixed(6)}`;
                    }
                } else {
                    alert('Please select a location within Sri Lanka.');
                }
            })
            .catch(() => {
                alert('Unable to verify location. Please select a location within Sri Lanka.');
            });
    });

    document.getElementById('getLocationBtn').addEventListener('click', () => {
        const btn = document.getElementById('getLocationBtn');
        btn.innerHTML = '<span class="loading"></span> Getting Location...';
        btn.disabled = true;
        
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(pos => {
                const lat = pos.coords.latitude;
                const lon = pos.coords.longitude;
                updateMarker(lat, lon);
                latInput.value = lat;
                lonInput.value = lon;
                
                // Reverse geocode to get address
                fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}&addressdetails=1`)
                    .then(res => res.json())
                    .then(data => {
                        if (data.display_name) {
                            startInput.value = data.display_name;
                        } else {
                            startInput.value = `Lat: ${lat.toFixed(6)}, Lng: ${lon.toFixed(6)}`;
                        }
                        btn.innerHTML = '<i class="fas fa-location-arrow"></i> Use My Location';
                        btn.disabled = false;
                    })
                    .catch(() => {
                        startInput.value = `Lat: ${lat.toFixed(6)}, Lng: ${lon.toFixed(6)}`;
                        btn.innerHTML = '<i class="fas fa-location-arrow"></i> Use My Location';
                        btn.disabled = false;
                    });
            }, () => {
                alert('Unable to get location. Please allow location access.');
                btn.innerHTML = '<i class="fas fa-location-arrow"></i> Use My Location';
                btn.disabled = false;
            });
        } else {
            alert('Geolocation is not supported by this browser.');
            btn.innerHTML = '<i class="fas fa-location-arrow"></i> Use My Location';
            btn.disabled = false;
        }
    });

    /* ---------- AUTOCOMPLETE ---------- */
    const suggestionsBox = document.getElementById('locationSuggestions');
    let typingTimer;

    startInput.addEventListener('input', function() {
        clearTimeout(typingTimer);
        const query = this.value.trim();
        if (query.length < 3) {
            suggestionsBox.style.display = 'none';
            return;
        }
        typingTimer = setTimeout(() => fetchSuggestions(query), 400);
    });

    function fetchSuggestions(query) {
        fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(query)}&addressdetails=1&countrycodes=lk&limit=7`)
            .then(res => res.json())
            .then(data => {
                suggestionsBox.innerHTML = '';
                if (!data.length) {
                    suggestionsBox.style.display = 'none';
                    return;
                }
                data.forEach(place => {
                    // Check if the place is in Sri Lanka
                    if (place.address && place.address.country_code === 'lk') {
                        const li = document.createElement('li');
                        li.textContent = place.display_name;
                        li.addEventListener('click', () => {
                            startInput.value = place.display_name;
                            latInput.value = place.lat;
                            lonInput.value = place.lon;
                            updateMarker(place.lat, place.lon);
                            suggestionsBox.style.display = 'none';
                        });
                        suggestionsBox.appendChild(li);
                    }
                });
                // Only show suggestions box if there are Sri Lankan places
                if (suggestionsBox.children.length > 0) {
                    suggestionsBox.style.display = 'block';
                } else {
                    suggestionsBox.style.display = 'none';
                }
            })
            .catch(() => suggestionsBox.style.display = 'none');
    }

    document.addEventListener('click', e => {
        if (!suggestionsBox.contains(e.target) && e.target !== startInput)
            suggestionsBox.style.display = 'none';
    });

    /* ---------- PROVINCE LOGIC ---------- */
    const btnSingle = document.getElementById('btnSingleProvince');
    const btnMulti = document.getElementById('btnMultipleProvince');
    const singleBlock = document.getElementById('singleProvinceBlock');
    const multiBlock = document.getElementById('multipleProvinceBlock');

    btnSingle.addEventListener('click', () => { 
        singleBlock.style.display = 'block'; 
        multiBlock.style.display = 'none'; 
        btnSingle.classList.add('active');
        btnMulti.classList.remove('active');
    });
    
    btnMulti.addEventListener('click', () => { 
        multiBlock.style.display = 'block'; 
        singleBlock.style.display = 'none'; 
        btnMulti.classList.add('active');
        btnSingle.classList.remove('active');
    });

    function populateDistricts(province, target) {
        console.log('populateDistricts called with province:', province, 'and target:', target);
        console.log('Provinces data available:', provinces);
        
        // Clear the target select
        target.innerHTML = '<option value="">-- Select District --</option>';
        
        // Check if provinces data exists and the selected province is valid
        if (provinces && province && provinces[province]) {
            console.log('Found districts for province:', provinces[province]);
            // Populate districts
            provinces[province].forEach(function(district) {
                const option = document.createElement('option');
                option.value = district;
                option.textContent = district;
                target.appendChild(option);
            });
            target.disabled = false;
            console.log('Districts populated successfully');
        } else {
            console.log('No districts found for province or provinces data not available');
            target.disabled = true;
        }
    }

    function populatePlacesAndAccommodation(district, placeSel, accSel) {
        placeSel.innerHTML = '<option value="">-- Select Place --</option>';
        accSel.innerHTML = '<option value="">-- Select Accommodation --</option>';
        if (places[district]) {
            places[district].forEach(p => placeSel.innerHTML += `<option>${p}</option>`);
            placeSel.disabled = false;
        } else placeSel.disabled = true;
        if (accommodations[district]) {
            accommodations[district].forEach(a => accSel.innerHTML += `<option>${a}</option>`);
            accSel.disabled = false;
        } else accSel.disabled = true;
    }

    // Single province selection
    const provinceSingle = document.getElementById('provinceSingle');
    const districtSingle = document.getElementById('districtSingle');
    const placeSingle = document.getElementById('placeSingle');
    const accommodationSingle = document.getElementById('accommodationSingle');

    provinceSingle.addEventListener('change', function() {
        populateDistricts(this.value, districtSingle);
        // Reset dependent selects
        placeSingle.innerHTML = '<option value="">-- Select Place --</option>';
        placeSingle.disabled = true;
        accommodationSingle.innerHTML = '<option value="">-- Select Accommodation --</option>';
        accommodationSingle.disabled = true;
    });
    
    districtSingle.addEventListener('change', function() {
        populatePlacesAndAccommodation(this.value, placeSingle, accommodationSingle);
    });

    // Add single place to itinerary
    document.getElementById('addSinglePlaceBtn').addEventListener('click', function() {
        if (!placeSingle.value || !accommodationSingle.value) {
            alert('Please select both a place and accommodation');
            return;
        }
        
        addPlaceToItinerary(placeSingle.value, accommodationSingle.value);
        
        // Reset the selects but keep province/district selected
        placeSingle.value = '';
        accommodationSingle.value = '';
        accommodationSingle.disabled = true;
    });

    // Multiple province selection
    document.getElementById('addPlaceBtn').addEventListener('click', function() {
        const container = document.getElementById('multi-province-container');
        const newSet = container.querySelector('.multi-province-set').cloneNode(true);
        
        // Reset selects in the new set
        newSet.querySelectorAll('select').forEach(sel => { 
            sel.value = ''; 
            sel.disabled = true; 
        });
        
        // Enable the province select
        const provinceSelect = newSet.querySelector('.provinceMulti');
        provinceSelect.disabled = false;
        
        // Get other selects
        const districtSelect = newSet.querySelector('.districtMulti');
        const placeSelect = newSet.querySelector('.placeMulti');
        const accommodationSelect = newSet.querySelector('.accommodationMulti');
        const addButton = newSet.querySelector('.add-multi-place-btn');
        
        // Attach event listeners to the new set
        provinceSelect.addEventListener('change', function() {
            populateDistricts(this.value, districtSelect);
            // Reset dependent selects
            placeSelect.innerHTML = '<option value="">-- Select Place --</option>';
            placeSelect.disabled = true;
            accommodationSelect.innerHTML = '<option value="">-- Select Accommodation --</option>';
            accommodationSelect.disabled = true;
        });
        
        districtSelect.addEventListener('change', function() {
            populatePlacesAndAccommodation(this.value, placeSelect, accommodationSelect);
        });
        
        addButton.addEventListener('click', function() {
            if (!placeSelect.value || !accommodationSelect.value) {
                alert('Please select both a place and accommodation');
                return;
            }
            
            addPlaceToItinerary(placeSelect.value, accommodationSelect.value);
            
            // Reset the selects but keep province/district selected
            placeSelect.value = '';
            accommodationSelect.value = '';
            accommodationSelect.disabled = true;
        });
        
        container.appendChild(newSet);
    });

    // Attach event listeners to the original multi-province set
    function attachMultiProvinceEventListeners() {
        const originalSet = document.querySelector('.multi-province-set');
        if (originalSet) {
            const provinceSelect = originalSet.querySelector('.provinceMulti');
            const districtSelect = originalSet.querySelector('.districtMulti');
            const placeSelect = originalSet.querySelector('.placeMulti');
            const accommodationSelect = originalSet.querySelector('.accommodationMulti');
            const addButton = originalSet.querySelector('.add-multi-place-btn');
            
            if (provinceSelect && districtSelect) {
                provinceSelect.addEventListener('change', function() {
                    populateDistricts(this.value, districtSelect);
                    // Reset dependent selects
                    placeSelect.innerHTML = '<option value="">-- Select Place --</option>';
                    placeSelect.disabled = true;
                    accommodationSelect.innerHTML = '<option value="">-- Select Accommodation --</option>';
                    accommodationSelect.disabled = true;
                });
            }
            
            if (districtSelect && placeSelect && accommodationSelect) {
                districtSelect.addEventListener('change', function() {
                    populatePlacesAndAccommodation(this.value, placeSelect, accommodationSelect);
                });
            }
            
            if (addButton && placeSelect && accommodationSelect) {
                addButton.addEventListener('click', function() {
                    if (!placeSelect.value || !accommodationSelect.value) {
                        alert('Please select both a place and accommodation');
                        return;
                    }
                    
                    addPlaceToItinerary(placeSelect.value, accommodationSelect.value);
                    
                    // Reset the selects but keep province/district selected
                    placeSelect.value = '';
                    accommodationSelect.value = '';
                    accommodationSelect.disabled = true;
                });
            }
        }
    }
    
    // Call this function when the DOM is loaded
    attachMultiProvinceEventListeners();

    // Handle existing multiple province sets using event delegation
    // (This is now handled by direct event listeners on cloned elements)

    // Handle add buttons for existing multiple province sets using event delegation
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('add-multi-place-btn')) {
            const wrapper = e.target.closest('.multi-province-set');
            if (wrapper) {
                const placeSelect = wrapper.querySelector('.placeMulti');
                const accommodationSelect = wrapper.querySelector('.accommodationMulti');
                
                if (placeSelect && accommodationSelect) {
                    if (!placeSelect.value || !accommodationSelect.value) {
                        alert('Please select both a place and accommodation');
                        return;
                    }
                    
                    addPlaceToItinerary(placeSelect.value, accommodationSelect.value);
                    
                    // Reset the selects but keep province/district selected
                    placeSelect.value = '';
                    accommodationSelect.value = '';
                    accommodationSelect.disabled = true;
                }
            }
        }
    });

    // Function to add place to itinerary
    function addPlaceToItinerary(place, accommodation) {
        // Add to selected places array
        selectedPlaces.push({ place: place, accommodation: accommodation });
        
        // Update UI
        updateSelectedPlacesUI();
        
        // Hide "no places" message
        document.getElementById('noPlacesMessage').style.display = 'none';
    }

    // Function to update selected places UI
    function updateSelectedPlacesUI() {
        const container = document.getElementById('selectedPlacesContainer');
        
        // Clear container except for "no places" message
        while (container.firstChild && container.firstChild.id !== 'noPlacesMessage') {
            container.removeChild(container.firstChild);
        }
        
        // Add each selected place
        selectedPlaces.forEach((item, index) => {
            const template = document.getElementById('selectedPlaceTemplate').firstElementChild.cloneNode(true);
            template.querySelector('.place-name').textContent = item.place;
            template.querySelector('.accommodation-name').textContent = item.accommodation;
            template.querySelector('.remove-place-btn').addEventListener('click', function() {
                removePlace(index);
            });
            container.insertBefore(template, document.getElementById('noPlacesMessage'));
        });
        
        // Show/hide "no places" message
        document.getElementById('noPlacesMessage').style.display = selectedPlaces.length ? 'none' : 'block';
    }

    // Function to remove place from itinerary
    function removePlace(index) {
        selectedPlaces.splice(index, 1);
        updateSelectedPlacesUI();
    }

    /* ---------- VEHICLE LOGIC ---------- */
    const numPeople = document.getElementById('num_people');
    const vehicleSelect = document.getElementById('vehicleSelect');

    function updateVehicleOptions() {
        const count = parseInt(numPeople.value);
        vehicleSelect.innerHTML = '<option value="">-- Select Vehicle --</option>';

        if (!count || count < 1) return;

        if (count === 1) vehicleSelect.innerHTML += '<option value="bike">Bike</option>';
        else if (count >= 2 && count <= 3) vehicleSelect.innerHTML += '<option value="three_wheeler">Three Wheeler</option>';
        else if (count === 4) vehicleSelect.innerHTML += '<option value="car">Car</option>';
        else if (count >= 5 && count <= 9) vehicleSelect.innerHTML += '<option value="van">Van</option>';
        else if (count >= 10) vehicleSelect.innerHTML += '<option value="bus">Bus</option>';
    }

    numPeople.addEventListener('input', updateVehicleOptions);
    updateVehicleOptions(); // Initialize on load

    /* ---------- FORM SUBMISSION ---------- */
    document.getElementById('travelForm').addEventListener('submit', function(e) {
        // Set destinations, vehicles, and accommodations as JSON in hidden inputs
        document.getElementById('destinationsInput').value = JSON.stringify(selectedPlaces.map(item => item.place));
        document.getElementById('vehiclesInput').value = JSON.stringify([document.getElementById('vehicleSelect').value]);
        document.getElementById('accommodationsInput').value = JSON.stringify(selectedPlaces.map(item => item.accommodation));

        // Validation
        if (selectedPlaces.length === 0) {
            e.preventDefault();
            alert('Please add at least one place to your itinerary');
            return;
        }

        if (!document.getElementById('vehicleSelect').value) {
            e.preventDefault();
            alert('Please select a vehicle type');
            return;
        }

        // Show loading state
        const submitBtn = this.querySelector('.btn-primary');
        submitBtn.innerHTML = '<span class="loading"></span> Creating Package...';
        submitBtn.disabled = true;
    });

    // Show success message if it's present in the URL or session
    window.addEventListener('DOMContentLoaded', function() {
        // Check for success message in session (Laravel)
        const successMessage = "{{ session('success') ?? '' }}";
        const urlParams = new URLSearchParams(window.location.search);
        
        if (successMessage || urlParams.has('success')) {
            showSuccessPopup();
        }
    });

    // Function to show success popup
    function showSuccessPopup() {
        // Create popup element
        const popup = document.createElement('div');
        popup.id = 'successPopup';
        popup.innerHTML = `
            <div class="popup-overlay">
                <div class="popup-content">
                    <div class="popup-header">
                        <h3>Success!</h3>
                        <span class="popup-close">&times;</span>
                    </div>
                    <div class="popup-body">
                        <p>Your application submitted successfully. Wait for the admin approval and check your email for payment methods.</p>
                    </div>
                    <div class="popup-footer">
                        <button class="btn btn-primary popup-ok">OK</button>
                    </div>
                </div>
            </div>
        `;
        document.body.appendChild(popup);

        // Add styles for popup
        const style = document.createElement('style');
        style.textContent = `
            #successPopup {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                z-index: 10000;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            
            .popup-overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }
            
            .popup-content {
                background: white;
                border-radius: 12px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
                max-width: 500px;
                width: 90%;
                margin: 0 auto;
                position: relative;
                animation: popupFadeIn 0.3s ease-out;
            }
            
            @keyframes popupFadeIn {
                from { opacity: 0; transform: translateY(-20px); }
                to { opacity: 1; transform: translateY(0); }
            }
            
            .popup-header {
                padding: 20px;
                border-bottom: 1px solid var(--gray-200);
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            
            .popup-header h3 {
                margin: 0;
                color: var(--success);
                font-weight: 600;
            }
            
            .popup-close {
                font-size: 24px;
                cursor: pointer;
                color: var(--gray-500);
            }
            
            .popup-body {
                padding: 20px;
            }
            
            .popup-body p {
                margin: 0;
                font-size: 16px;
                line-height: 1.6;
                color: var(--gray-700);
            }
            
            .popup-footer {
                padding: 20px;
                border-top: 1px solid var(--gray-200);
                text-align: right;
            }
            
            .popup-ok {
                padding: 10px 20px;
                background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
                color: white;
                border: none;
                border-radius: 8px;
                font-weight: 600;
                cursor: pointer;
                transition: var(--transition);
            }
            
            .popup-ok:hover {
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3);
            }
        `;
        document.head.appendChild(style);

        // Add event listeners to close popup
        const closeBtn = popup.querySelector('.popup-close');
        const okBtn = popup.querySelector('.popup-ok');
        const overlay = popup.querySelector('.popup-overlay');
        
        const closePopup = function() {
            document.body.removeChild(popup);
            document.head.removeChild(style);
        };
        
        closeBtn.addEventListener('click', closePopup);
        okBtn.addEventListener('click', closePopup);
        overlay.addEventListener('click', function(e) {
            if (e.target === overlay) {
                closePopup();
            }
        });
    }
});
</script>
@endsection