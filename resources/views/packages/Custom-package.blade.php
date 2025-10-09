@extends('layouts.app')

@section('title', 'Design Your Journey')

@section('styles')
<style>
    .custom-package-container {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        padding: 2rem 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .form-wrapper {
        max-width: 1000px;
        width: 100%;
        margin: 0 auto;
    }

    .form-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .form-header {
        background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 100%);
        color: white;
        padding: 3rem 2rem;
        text-align: center;
    }

    .form-header h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin: 0 0 1rem 0;
        letter-spacing: -0.025em;
    }

    .form-header p {
        font-size: 1.2rem;
        opacity: 0.9;
        margin: 0;
        font-weight: 400;
    }

    .form-body {
        padding: 3rem 2rem;
    }

    /* Progress Steps */
    .progress-steps {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 3rem;
        gap: 2rem;
    }

    .step {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
    }

    .step:not(:last-child)::after {
        content: '';
        position: absolute;
        top: 24px;
        right: -30px;
        width: 60px;
        height: 2px;
        background: #E5E7EB;
    }

    .step-circle {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: #F3F4F6;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        color: #6B7280;
        font-size: 1.1rem;
        margin-bottom: 0.75rem;
        border: 2px solid #E5E7EB;
    }

    .step.active .step-circle {
        background: #4F46E5;
        color: white;
        border-color: #4F46E5;
    }

    .step-label {
        font-size: 0.9rem;
        color: #6B7280;
        font-weight: 500;
    }

    .step.active .step-label {
        color: #4F46E5;
        font-weight: 600;
    }

    /* Form Sections */
    .form-section {
        margin-bottom: 3rem;
        padding: 2rem;
        background: #F8FAFC;
        border-radius: 16px;
        border: 1px solid #E2E8F0;
    }

    .section-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #1F2937;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .section-title i {
        color: #4F46E5;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        font-weight: 600;
        color: #374151;
        margin-bottom: 0.5rem;
        font-size: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .form-label i {
        color: #4F46E5;
        width: 16px;
    }

    .form-control, .form-select {
        width: 100%;
        padding: 1rem 1.25rem;
        border: 2px solid #E5E7EB;
        border-radius: 12px;
        font-size: 1rem;
        transition: all 0.2s ease;
        background: white;
    }

    .form-control:focus, .form-select:focus {
        outline: none;
        border-color: #4F46E5;
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
    }

    .form-control::placeholder {
        color: #9CA3AF;
    }

    .form-select[multiple] {
        min-height: 150px;
        padding: 1rem;
    }

    .form-select[multiple] option {
        padding: 0.75rem 1rem;
        margin: 0.25rem 0;
        border-radius: 8px;
        cursor: pointer;
    }

    .form-select[multiple] option:hover {
        background: #4F46E5 !important;
        color: white;
    }

    .form-select[multiple] option:checked {
        background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 100%);
        color: white;
        font-weight: 600;
    }

    .required::after {
        content: '*';
        color: #EF4444;
        margin-left: 4px;
    }

    .form-text {
        font-size: 0.85rem;
        color: #6B7280;
        margin-top: 0.5rem;
        padding-left: 1.5rem;
    }

    .row {
        display: flex;
        gap: 1.5rem;
        margin: 0 -0.75rem;
    }

    .col-md-6 {
        flex: 1;
        padding: 0 0.75rem;
    }

    /* Buttons */
    .form-actions {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-top: 3rem;
        padding-top: 2rem;
        border-top: 1px solid #E5E7EB;
    }

    .btn {
        padding: 1rem 2.5rem;
        border: none;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-primary {
        background: #4F46E5;
        color: white;
    }

    .btn-primary:hover {
        background: #4338CA;
        transform: translateY(-1px);
        box-shadow: 0 10px 25px rgba(79, 70, 229, 0.3);
    }

    .btn-secondary {
        background: #F3F4F6;
        color: #374151;
    }

    .btn-secondary:hover {
        background: #E5E7EB;
    }

    /* Alerts */
    .alert {
        padding: 1.5rem;
        border-radius: 12px;
        margin-bottom: 2rem;
        border-left: 4px solid;
    }

    .alert-success {
        background: #D1FAE5;
        color: #065F46;
        border-left-color: #10B981;
    }

    .alert-danger {
        background: #FEE2E2;
        color: #DC2626;
        border-left-color: #EF4444;
    }

    .alert ul {
        margin: 0.5rem 0 0 0;
        padding-left: 1.5rem;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .custom-package-container {
            padding: 1rem;
        }

        .form-header {
            padding: 2rem 1.5rem;
        }

        .form-header h1 {
            font-size: 2rem;
        }

        .form-header p {
            font-size: 1.1rem;
        }

        .form-body {
            padding: 2rem 1.5rem;
        }

        .progress-steps {
            gap: 1rem;
        }

        .step:not(:last-child)::after {
            width: 40px;
            right: -22px;
        }

        .step-circle {
            width: 40px;
            height: 40px;
            font-size: 1rem;
        }

        .step-label {
            font-size: 0.8rem;
        }

        .form-section {
            padding: 1.5rem;
        }

        .row {
            flex-direction: column;
            gap: 0;
        }

        .col-md-6 {
            margin-bottom: 1rem;
        }

        .btn {
            padding: 0.875rem 2rem;
        }
    }

    @media (max-width: 576px) {
        .form-header {
            padding: 1.5rem 1rem;
        }

        .form-header h1 {
            font-size: 1.75rem;
        }

        .form-body {
            padding: 1.5rem 1rem;
        }

        .progress-steps {
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .step:not(:last-child)::after {
            display: none;
        }

        .form-section {
            padding: 1rem;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endsection

@section('content')
<div class="custom-package-container">
    <div class="form-wrapper">
        <div class="form-card">
            <div class="form-header">
                <h1>Design Your Journey</h1>
                <p>Craft your perfect travel experience with our expert guidance</p>
            </div>

            <div class="form-body">
                <!-- Progress Steps -->
                <div class="progress-steps">
                    <div class="step active">
                        <div class="step-circle">1</div>
                        <div class="step-label">Basic Info</div>
                    </div>
                    <div class="step">
                        <div class="step-circle">2</div>
                        <div class="step-label">Destinations</div>
                    </div>
                    <div class="step">
                        <div class="step-circle">3</div>
                        <div class="step-label">Preferences</div>
                    </div>
                    <div class="step">
                        <div class="step-circle">4</div>
                        <div class="step-label">Review</div>
                    </div>
                </div>

                {{-- Validation Summary --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>There were some issues with your submission:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success">
                        <strong>Success!</strong> {{ session('success') }}
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
                                    <div class="form-text">Hold Ctrl (Cmd on Mac) to select multiple destinations</div>
                                    @error('destinations') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
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
                                    <div class="form-text">Select transportation options for your trip</div>
                                    @error('vehicles') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
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
                            </div>

                            <div class="col-md-4">
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

                    <!-- Form Actions -->
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i>Back
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i>Submit for Approval
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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

    // Form validation
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        const requiredFields = this.querySelectorAll('[required]');
        let isValid = true;

        requiredFields.forEach(field => {
            if (field.type === 'select-multiple') {
                if (field.selectedOptions.length === 0) {
                    isValid = false;
                    field.style.borderColor = '#EF4444';
                } else {
                    field.style.borderColor = '#E5E7EB';
                }
            } else if (!field.value.trim()) {
                isValid = false;
                field.style.borderColor = '#EF4444';
            } else {
                field.style.borderColor = '#E5E7EB';
            }
        });

        if (!isValid) {
            e.preventDefault();
            alert('Please fill in all required fields.');
        } else if (!confirm('Are you ready to submit your custom package for approval?')) {
            e.preventDefault();
        }
    });

    // Input focus effects
    const inputs = document.querySelectorAll('.form-control, .form-select');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.style.borderColor = '#4F46E5';
            this.style.boxShadow = '0 0 0 3px rgba(79, 70, 229, 0.1)';
        });

        input.addEventListener('blur', function() {
            this.style.boxShadow = 'none';
            if (!this.value && !this.classList.contains('is-invalid')) {
                this.style.borderColor = '#E5E7EB';
            }
        });
    });

    // Multiple select enhancement
    const multipleSelects = document.querySelectorAll('select[multiple]');
    multipleSelects.forEach(select => {
        select.addEventListener('change', function() {
            const selectedCount = this.selectedOptions.length;
            if (selectedCount > 0) {
                this.style.borderColor = '#10B981';
            } else {
                this.style.borderColor = '#E5E7EB';
            }
        });
    });
});
</script>
@endsection
