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
                @endif

                <form action="{{ route('custom-packages.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

<!-- Section: Basic Information -->
<div class="form-section">
    <h2 class="section-title">
        <i class="fas fa-info-circle"></i> Basic Information
    </h2>

    <div class="form-group" style="position: relative;">
        <label class="form-label required">
            <i class="fas fa-map-marker-alt"></i> Start Location
        </label>
        <input type="text"
               name="start_location"
               id="start_location"
               value="{{ old('start_location') }}"
               class="form-control @error('start_location') is-invalid @enderror"
               placeholder="Where does your journey begin? (e.g., Colombo Airport)"
               autocomplete="off"
               required>

        <!-- Suggestions dropdown -->
        <ul id="locationSuggestions"
            style="position: absolute;
                   top: 100%;
                   left: 0;
                   right: 0;
                   background: white;
                   border: 1px solid #ccc;
                   border-radius: 6px;
                   z-index: 999;
                   list-style: none;
                   margin-top: 2px;
                   padding: 0;
                   display: none;
                   max-height: 180px;
                   overflow-y: auto;">
        </ul>

        <!-- Hidden coordinate fields -->
        <input type="hidden" name="latitude" id="latitude">
        <input type="hidden" name="longitude" id="longitude">

        <button type="button" id="getLocationBtn" class="btn btn-success btn-sm mt-2">
            <i class="fas fa-location-arrow"></i> Use My Current Location
        </button>

        @error('start_location')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <!-- Map container -->
    <div id="map" style="height: 300px; width: 100%; border-radius: 10px; margin-top: 10px;"></div>

    <div class="form-group mt-3">
        <label class="form-label">
            <i class="fas fa-pen"></i> Package Description
        </label>
        <textarea name="description"
                  rows="3"
                  class="form-control @error('description') is-invalid @enderror"
                  placeholder="Describe your travel package...">{{ old('description') }}</textarea>
        @error('description')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
</div>

<!-- Leaflet CSS & JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<!-- Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const btn = document.getElementById('getLocationBtn');
    const input = document.getElementById('start_location');
    const latField = document.getElementById('latitude');
    const lonField = document.getElementById('longitude');
    const suggestionsBox = document.getElementById('locationSuggestions');

    // --- Initialize map ---
    const map = L.map('map').setView([7.8731, 80.7718], 7); // Default Sri Lanka center
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);
    let marker = null;

    function updateMap(lat, lon) {
        if (marker) map.removeLayer(marker);
        marker = L.marker([lat, lon]).addTo(map);
        map.setView([lat, lon], 13);
    }

    // --- Reverse geocode helper ---
    function reverseGeocode(lat, lon) {
        fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}`)
            .then(res => res.json())
            .then(data => {
                input.value = data.display_name || `${lat}, ${lon}`;
                latField.value = lat;
                lonField.value = lon;
            });
    }

    // --- Map click event ---
    map.on('click', function(e) {
        const lat = e.latlng.lat;
        const lon = e.latlng.lng;
        updateMap(lat, lon);
        reverseGeocode(lat, lon);
    });

    // --- Use My Current Location ---
    btn.addEventListener('click', function() {
        if (!navigator.geolocation) {
            alert('Geolocation not supported by this browser.');
            return;
        }
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Getting location...';
        navigator.geolocation.getCurrentPosition(success, error);
    });

    function success(position) {
        const lat = position.coords.latitude;
        const lon = position.coords.longitude;
        latField.value = lat;
        lonField.value = lon;
        updateMap(lat, lon);
        reverseGeocode(lat, lon);
        btn.innerHTML = '<i class="fas fa-location-arrow"></i> Use My Current Location';
        btn.disabled = false;
    }

    function error() {
        alert('Unable to retrieve location.');
        btn.innerHTML = '<i class="fas fa-location-arrow"></i> Use My Current Location';
        btn.disabled = false;
    }

    // --- Autocomplete ---
    let typingTimer;
    input.addEventListener('input', function() {
        clearTimeout(typingTimer);
        const query = this.value.trim();
        if (query.length < 3) {
            suggestionsBox.style.display = 'none';
            return;
        }
        typingTimer = setTimeout(() => fetchSuggestions(query), 400);
    });

    function fetchSuggestions(query) {
        fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(query)}&limit=5`)
            .then(res => res.json())
            .then(data => {
                suggestionsBox.innerHTML = '';
                if (!data.length) {
                    suggestionsBox.style.display = 'none';
                    return;
                }
                data.forEach(place => {
                    const li = document.createElement('li');
                    li.textContent = place.display_name;
                    li.style.padding = '8px 10px';
                    li.style.cursor = 'pointer';
                    li.addEventListener('click', () => {
                        input.value = place.display_name;
                        latField.value = place.lat;
                        lonField.value = place.lon;
                        suggestionsBox.style.display = 'none';
                        updateMap(place.lat, place.lon);
                    });
                    li.addEventListener('mouseenter', () => li.style.background = '#f0f0f0');
                    li.addEventListener('mouseleave', () => li.style.background = 'white');
                    suggestionsBox.appendChild(li);
                });
                suggestionsBox.style.display = 'block';
            })
            .catch(() => suggestionsBox.style.display = 'none');
    }

    document.addEventListener('click', function(e) {
        if (!suggestionsBox.contains(e.target) && e.target !== input) {
            suggestionsBox.style.display = 'none';
        }
    });
});
</script>





                    <!-- Section: Travel Options -->
                    <div class="form-section">
                        <h2 class="section-title">
                            <i class="fas fa-route"></i>Travel Options
                        </h2>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label required">
                                        <i class="fas fa-map-marked-alt"></i>Destinations (You'll visit)
                                    </label>
                                    <select name="destinations[]"
                                            class="form-select @error('destinations') is-invalid @enderror"
                                            multiple required>
                                        @foreach($availablePlaces as $place)
                                            <option value="{{ $place->id }}" {{ in_array($place->id, old('destinations', [])) ? 'selected' : '' }}>
                                                {{ $place->name }}
                                                @if(isset($place->district) && $place->district) - {{ $place->district }} @endif
                                                @if(isset($place->province) && $place->province) ({{ $place->province }}) @endif
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label required">
                                        <i class="fas fa-car"></i>Vehicles
                                    </label>
                                    <select name="vehicles[]"
                                            class="form-select @error('vehicles') is-invalid @enderror"
                                            multiple required>
                                        @foreach($vehicleOptions as $vehicle)
                                            <option value="{{ $vehicle->id }}" {{ in_array($vehicle->id, old('vehicles', [])) ? 'selected' : '' }}>
                                                {{ ucfirst(str_replace('_', ' ', $vehicle->name)) }}
                                                @if(isset($vehicle->type) && $vehicle->type && $vehicle->type !== $vehicle->name)
                                                    ({{ ucfirst(str_replace('_', ' ', $vehicle->type)) }})
                                                @endif
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section: Accommodation -->
                    <div class="form-section">
                        <h2 class="section-title">
                            <i class="fas fa-bed"></i>Accommodation
                        </h2>

                        <div class="form-group">
                            <label class="form-label required">
                                <i class="fas fa-hotel"></i>Accommodations
                            </label>
                            <select name="accommodations[]"
                                    class="form-select @error('accommodations') is-invalid @enderror"
                                    multiple required>
                                @if(isset($accommodationOptions) && $accommodationOptions->count() > 0)
                                    @foreach($accommodationOptions as $acc)
                                        <option value="{{ $acc->id }}" {{ in_array($acc->id, old('accommodations', [])) ? 'selected' : '' }}>
                                            {{ $acc->name }}
                                            @if(isset($acc->type) && $acc->type) ({{ $acc->type }}) @endif
                                            @if(isset($acc->location) && $acc->location) - {{ $acc->location }} @endif
                                        </option>
                                    @endforeach
                                @else
                                    <option value="">No accommodations available</option>
                                @endif
                            </select>
                            <div class="form-text">Choose your preferred accommodation types</div>
                            @error('accommodations') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <!-- Section: Logistics -->
                    <div class="form-section">
                        <h2 class="section-title">
                            <i class="fas fa-calendar-alt"></i>Logistics
                        </h2>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label required">
                                        <i class="fas fa-clock"></i>Duration (days)
                                    </label>
                                    <input type="number"
                                           name="duration"
                                           min="1"
                                           value="{{ old('duration') }}"
                                           class="form-control @error('duration') is-invalid @enderror"
                                           placeholder="7"
                                           required>
                                    @error('duration') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label required">
                                        <i class="fas fa-users"></i>Number of People
                                    </label>
                                    <input type="number"
                                           name="num_people"
                                           min="1"
                                           value="{{ old('num_people', 1) }}"
                                           class="form-control @error('num_people') is-invalid @enderror"
                                           placeholder="2"
                                           required>
                                    @error('num_people') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                                </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-calendar-check"></i>Start Date
                                    </label>
                                    <input type="date"
                                           name="start_date"
                                           value="{{ old('start_date') }}"
                                           min="{{ date('Y-m-d') }}"
                                           class="form-control @error('start_date') is-invalid @enderror">
                                    @error('start_date') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                                </div>
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
                            <label class="form-label">
                                <i class="fas fa-image"></i>Package Image
                            </label>
                            <input type="file"
                                   name="image"
                                   class="form-control @error('image') is-invalid @enderror"
                                   accept="image/*">
                            <div class="form-text">Upload an image for your package (Max: 2MB)</div>
                            @error('image') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
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
    // Progress steps interaction
    const steps = document.querySelectorAll('.step');

    steps.forEach(step => {
        step.addEventListener('click', function() {
            steps.forEach(s => s.classList.remove('active'));
            this.classList.add('active');
        });
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
                });
                suggestionsBox.style.display = 'block';
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
        target.innerHTML = '<option value="">-- Select District --</option>';
        if (provinces[province]) {
            provinces[province].forEach(d => target.innerHTML += `<option value="${d}">${d}</option>`);
            target.disabled = false;
        } else target.disabled = true;
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
        newSet.querySelector('.provinceMulti').disabled = false;
        
        // Add event listeners to the new set
        const provinceSelect = newSet.querySelector('.provinceMulti');
        const districtSelect = newSet.querySelector('.districtMulti');
        const placeSelect = newSet.querySelector('.placeMulti');
        const accommodationSelect = newSet.querySelector('.accommodationMulti');
        const addButton = newSet.querySelector('.add-multi-place-btn');
        
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

    // Handle existing multiple province sets
    document.addEventListener('change', function(e) {
        if (e.target.classList.contains('provinceMulti')) {
            const wrapper = e.target.closest('.multi-province-set');
            populateDistricts(e.target.value, wrapper.querySelector('.districtMulti'));
        }
        if (e.target.classList.contains('districtMulti')) {
            const wrapper = e.target.closest('.multi-province-set');
            populatePlacesAndAccommodation(
                e.target.value,
                wrapper.querySelector('.placeMulti'),
                wrapper.querySelector('.accommodationMulti')
            );
        }
    });

    // Handle add buttons for existing multiple province sets
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('add-multi-place-btn')) {
            const wrapper = e.target.closest('.multi-province-set');
            const placeSelect = wrapper.querySelector('.placeMulti');
            const accommodationSelect = wrapper.querySelector('.accommodationMulti');
            
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
