
@extends('layouts.master')
@include('include.header')

<style>
    .booking-container { max-width: 1200px; margin: 40px auto; padding: 0 15px; }
    .steps-header { display: flex; justify-content: space-between; margin-bottom: 40px; position: relative; }
    .steps-header::after {
        content: '';
        position: absolute;
        top: 20px;
        left: 25%;
        right: 25%;
        height: 2px;
        background: #e9ecef;
        z-index: 1;
    }
    .step-indicator {
        display: flex;
        flex-direction: column;
        align-items: center;
        z-index: 2;
        position: relative;
    }
    .step-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #e9ecef;
        display: grid;
        place-items: center;
        font-weight: bold;
        margin-bottom: 10px;
        transition: all 0.3s ease;
    }
    .step-circle.active { background: #0a4da2; color: white; }
    .step-label { font-size: 0.9rem; color: #6c757d; font-weight: 500; }
    .step-section { display: none; }
    .step-section.active { display: block; animation: fadeIn 0.4s ease; }
    @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }

    .form-section { background: white; padding: 35px; border-radius: 16px; box-shadow: 0 5px 25px rgba(0,0,0,0.08); margin-bottom: 30px; }
    .section-title { font-size: 1.8rem; font-weight: 700; color: #1a2b47; margin-bottom: 20px; }
    .form-row { display: flex; gap: 20px; margin-bottom: 20px; }
    .form-group { flex: 1; }
    .form-group label { display: block; margin-bottom: 8px; font-weight: 600; color: #333; }
    .form-control {
        width: 100%; padding: 14px; border: 1px solid #dee2e6; border-radius: 10px;
        font-size: 1rem; transition: border 0.3s ease;
    }
    .form-control:focus {
        outline: none; border-color: #0a4da2;
        box-shadow: 0 0 0 3px rgba(10, 77, 162, 0.1);
    }
    .btn-group { display: flex; justify-content: space-between; margin-top: 30px; }
    .btn { padding: 12px 30px; border-radius: 30px; font-weight: 600; cursor: pointer; transition: all 0.3s ease; }
    .btn-back { background: #f1f3f5; color: #495057; border: none; }
    .btn-back:hover { background: #e9ecef; }
    .btn-next, .btn-book { background: #0a4da2; color: white; border: none; }
    .btn-next:hover, .btn-book:hover { background: #083b7a; transform: translateY(-2px); }
    .btn-book { background: #28a745; width: 100%; padding: 16px; font-size: 1.1rem; }
    .btn-outline-primary {
        border: 1px solid #0a4da2;
        color: #0a4da2;
        background: transparent;
    }
    .btn-outline-primary:hover {
        background: #0a4da2;
        color: white;
    }

    .sidebar { background: white; padding: 30px; border-radius: 16px; box-shadow: 0 5px 25px rgba(0,0,0,0.08); }
    .sidebar h4 { font-size: 1.4rem; margin-bottom: 20px; color: #1a2b47; }
    .sidebar-item { display: flex; justify-content: space-between; margin: 16px 0; }
    .free-cancel { color: #28a745; font-size: 0.95rem; margin-top: 20px; display: flex; align-items: center; gap: 8px; }
    .terms { font-size: 0.9rem; color: #6c757d; line-height: 1.6; margin-top: 20px; }

    /* Location Suggestions */
    #locationSuggestions {
        position: absolute;
        z-index: 1000;
        list-style: none;
        margin: 0;
        padding: 0;
        display: none;
        width: 100%;
        background: #fff;
        border: 1px solid #dee2e6;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        max-height: 200px;
        overflow-y: auto;
        margin-top: 5px;
    }
    #locationSuggestions li {
        padding: 10px 14px;
        cursor: pointer;
        border-bottom: 1px solid #dee2e6;
        transition: background 0.2s;
    }
    #locationSuggestions li:last-child {
        border-bottom: none;
    }
    #locationSuggestions li:hover {
        background: #f8f9fa;
    }

    /* Map Styling */
    #map {
        height: 300px;
        margin-top: 15px;
        border-radius: 10px;
        border: 1px solid #dee2e6;
    }

    /* Loading Animation */
    .loading {
        display: inline-block;
        width: 16px;
        height: 16px;
        border: 2px solid #fff;
        border-top-color: #0a4da2;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin-right: 8px;
    }
    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    @media (max-width: 992px) {
        .booking-layout { flex-direction: column; }
        .sidebar { margin-top: 30px; }
        .steps-header::after { display: none; }
        .step-indicator { margin-bottom: 20px; }
    }
</style>

<div class="booking-container">
    <div class="steps-header">
        <div class="step-indicator" data-step="1">
            <div class="step-circle active" id="circle1">1</div>
            <div class="step-label">Contact</div>
        </div>
        <div class="step-indicator" data-step="2">
            <div class="step-circle" id="circle2">2</div>
            <div class="step-label">Activity</div>
        </div>
        <div class="step-indicator" data-step="3">
            <div class="step-circle" id="circle3">3</div>
            <div class="step-label">Payment</div>
        </div>
    </div>

    <form action="{{ route('fixedbooking.store') }}" method="POST" enctype="multipart/form-data" id="bookingForm">
        @csrf
        <input type="hidden" name="package_id" value="{{ $package->id }}">

        <!-- STEP 1: CONTACT -->
        <div class="step-section active" id="step1">
            <div class="form-section">
                <h2 class="section-title">Contact Details</h2>
                <p>We'll use this information to send you confirmation and updates about your booking.</p>

                <div class="form-row">
                    <div class="form-group">
                        <label for="first_name">First Name *</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" required value="{{ old('first_name') }}">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name *</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" required value="{{ old('last_name') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" name="email" id="email" class="form-control" required value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number *</label>
                    <div style="display: flex; gap: 5px;">
                        <input type="text" value="+94" readonly style="width: 60px; background: #f8f9fa; border: 1px solid #dee2e6; border-radius: 10px 0 0 10px; text-align: center;">
                        <input type="tel" name="phone" id="phone" class="form-control" required value="{{ old('phone') }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input type="checkbox" name="sms_opt_in" id="sms_opt_in" class="form-check-input">
                        <label class="form-check-label" for="sms_opt_in">Receive SMS updates about your booking. Message rates may apply.</label>
                    </div>
                </div>

                <div class="btn-group">
                    <div></div> <!-- empty for left -->
                    <button type="button" class="btn btn-next" onclick="showStep(2)">Next</button>
                </div>
            </div>
        </div>

        <!-- STEP 2: ACTIVITY -->
        <div class="step-section" id="step2">
            <div class="form-section">
                <h2 class="section-title">Activity Details</h2>
                <p>Please provide lead traveler information and preferences.</p>

                <div class="form-group">
                    <label>Lead Traveler</label>
                    <div class="form-row">
                        <div class="form-group">
                            <input type="text" name="lead_first_name" class="form-control" placeholder="First Name *" required value="{{ old('lead_first_name') }}">
                        </div>
                        <div class="form-group">
                            <input type="text" name="lead_last_name" class="form-control" placeholder="Last Name *" required value="{{ old('lead_last_name') }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="pickup_location">Pickup Location *</label>
                    <input type="text" 
                           id="pickup_location" 
                           name="pickup_location" 
                           class="form-control" 
                           placeholder="Search for your pickup location..." 
                           autocomplete="off" 
                           required>
                    <small class="text-muted">Start typing your location — suggestions will appear below (Sri Lanka only).</small>
                    
                    <!-- Hidden fields for latitude and longitude -->
                    <input type="hidden" id="latitude" name="latitude">
                    <input type="hidden" id="longitude" name="longitude">
                    
                    <!-- Use My Location -->
                    <div style="margin-top: 10px;">
                        <button type="button" class="btn btn-sm btn-outline-primary" id="useMyLocation">
                            📍 Use My Current Location
                        </button>
                    </div>
                    
                    <!-- Suggestions Dropdown -->
                    <ul id="locationSuggestions"></ul>
                    
                    <!-- Map -->
                    <div id="map"></div>
                </div>

                <div class="form-group">
                    <label for="language">Tour/Activity Language</label>
                    <select name="language" id="language" class="form-control">
                        <option value="">Select language</option>
                        <option value="English - Guide">English - Guide</option>
                        <option value="Sinhala - Guide">Sinhala - Guide</option>
                        <option value="Tamil - Guide">Tamil - Guide</option>
                    </select>
                </div>

                <div class="btn-group">
                    <button type="button" class="btn btn-back" onclick="showStep(1)">Back</button>
                    <button type="button" class="btn btn-next" onclick="showStep(3)">Next</button>
                </div>
            </div>
        </div>

        <!-- STEP 3: PAYMENT -->
        <div class="step-section" id="step3">
            <div class="form-section">
                <h2 class="section-title">Payment Details</h2>

                <div class="form-group">
                    <label for="payment_method">Payment Method *</label>
                    <select name="payment_method" id="payment_method" class="form-control" required>
                        <option value="">Select payment method</option>
                        <option value="cash">Cash on Arrival</option>
                        <option value="online">Online Payment</option>
                    </select>
                </div>

                <div class="form-group" id="receiptUpload" style="display: none;">
                    <label for="receipt">Upload Payment Receipt</label>
                    <input type="file" name="receipt" id="receipt" class="form-control" accept="image/*,application/pdf">
                    <small class="text-muted">Upload proof of payment if paying online.</small>
                </div>

                <!-- Participants & Total Price hidden fields (to store in DB) -->
                <input type="hidden" name="participants" id="participantsHidden" value="1">
                <input type="hidden" name="total_price" id="totalPriceHidden" value="{{ $package->price }}">

                <button type="button" class="btn btn-book" onclick="submitBooking()">Book Now</button>
            </div>
        </div>
    </form>

    <!-- SIDEBAR -->
    <div class="booking-layout" style="display: flex; gap: 30px; margin-top: 40px;">
        <div style="flex:1;"></div>
        <div class="sidebar">
            <h4>{{ $package->package_name }}</h4>
            <div class="sidebar-item">
                <span>Date</span>
                <span>Monday, October 6, 2025</span>
            </div>
            <div class="sidebar-item">
                <span>Time</span>
                <span>5:00 AM</span>
            </div>
            <div class="sidebar-item">
                <span>Participants</span>
                <input type="number" id="participants" name="participants" value="1" min="1" style="width:60px; text-align:center; border:1px solid #dee2e6; border-radius:6px; padding:4px;">
            </div>
            <div class="sidebar-item">
                <span>Total</span>
                <span id="totalPrice">${{ number_format($package->price, 2) }}</span>
            </div>
            <div class="free-cancel">
                <svg fill="#28a745" width="16" height="16"><use href="#clock"/></svg>
                Free cancellation before 5:00 AM on October 5
            </div>
        </div>
    </div>
</div>

<svg style="display:none">
    <symbol id="clock" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></symbol>
</svg>

<!-- Confirmation Modal -->
<div id="confirmModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-4">
                <div class="mb-3">
                    <svg width="60" height="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" fill="#0a4da2" fill-opacity="0.1"/>
                        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#0a4da2" stroke-width="2"/>
                        <path d="M8 12L11 15L16 9" stroke="#0a4da2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h5 class="mb-3">Booking Request Submitted!</h5>
                <p class="text-muted">
                    Your request has been sent to our admin team.<br>
                    They will contact you via email as soon as possible.
                </p>
            </div>
            <div class="modal-footer justify-content-center border-0">
                <button type="button" class="btn btn-primary" onclick="submitBooking()">OK, Got it</button>
            </div>
        </div>
    </div>
</div>

<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>

<!-- Existing booking form logic -->
<script>
function showStep(step) {
    // Hide all steps
    document.querySelectorAll('.step-section').forEach(el => el.classList.remove('active'));
    // Show current step
    document.getElementById('step' + step).classList.add('active');

    // Update circles
    document.querySelectorAll('.step-circle').forEach((el, i) => {
        if (i + 1 <= step) {
            el.classList.add('active');
        } else {
            el.classList.remove('active');
        }
    });
}

// Toggle receipt upload visibility
document.getElementById('payment_method')?.addEventListener('change', function() {
    const upload = document.getElementById('receiptUpload');
    if (this.value === 'online') {
        upload.style.display = 'block';
    } else {
        upload.style.display = 'none';
    }
});

function showConfirmModal() {
    const modal = new bootstrap.Modal(document.getElementById('confirmModal'));
    modal.show();
}

function submitBooking() {
    document.getElementById('bookingForm').submit();
}

// Update total price dynamically based on participants
document.addEventListener('DOMContentLoaded', function() {
    const participantsInput = document.getElementById('participants');
    const totalPriceElem = document.getElementById('totalPrice');
    const totalPriceHidden = document.getElementById('totalPriceHidden');
    const basePrice = parseFloat("{{ $package->price }}");

    function updateTotalPrice() {
        let count = parseInt(participantsInput.value);
        if (isNaN(count) || count < 1) count = 1;
        const total = (basePrice * count).toFixed(2);
        totalPriceElem.textContent = `$${total}`;
        totalPriceHidden.value = total;
    }

    participantsInput.addEventListener('input', updateTotalPrice);
    updateTotalPrice(); // Initialize on load
});
</script>

<!-- Leaflet JS and leaflet-geosearch -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script src="https://unpkg.com/leaflet-geosearch@3.8.0/dist/geosearch.umd.js"></script>

<!-- Pickup location search + map -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    console.log("Initializing Leaflet Map...");
    const locationInput = document.getElementById("pickup_location");
    const latInput = document.getElementById("latitude");
    const lonInput = document.getElementById("longitude");
    const suggestionsBox = document.getElementById("locationSuggestions");
    const useMyLocationBtn = document.getElementById("useMyLocation");
    const defaultLocation = [6.9271, 79.8612]; // Default: Colombo

    // Initialize Leaflet map
    let map, marker;
    try {
        map = L.map('map').setView(defaultLocation, 10);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
            maxZoom: 18,
        }).addTo(map);
        marker = L.marker(defaultLocation, { draggable: true }).addTo(map);
        console.log("Leaflet map initialized successfully");
    } catch (error) {
        console.error("Map initialization failed:", error);
        alert("Failed to load map. Please try again later.");
        return;
    }

    // Initialize leaflet-geosearch
    const provider = new GeoSearch.OpenStreetMapProvider({
        params: {
            countrycodes: 'lk', // Restrict to Sri Lanka
        }
    });

    // Autocomplete suggestions
    locationInput.addEventListener("input", async function () {
        const query = this.value.trim();
        if (query.length < 3) {
            suggestionsBox.style.display = "none";
            return;
        }

        try {
            const results = await provider.search({ query });
            suggestionsBox.innerHTML = "";
            if (!results || results.length === 0) {
                suggestionsBox.style.display = "none";
                return;
            }

            results.forEach((result) => {
                const li = document.createElement("li");
                li.textContent = result.label;
                li.style.padding = "10px 14px";
                li.style.cursor = "pointer";
                li.style.borderBottom = "1px solid #dee2e6";
                li.style.transition = "background 0.2s";
                li.addEventListener("mouseover", () => (li.style.background = "#f8f9fa"));
                li.addEventListener("mouseout", () => (li.style.background = "#fff"));
                li.addEventListener("click", () => {
                    locationInput.value = result.label;
                    const latlng = [result.y, result.x];
                    map.setView(latlng, 15);
                    marker.setLatLng(latlng);
                    latInput.value = result.y;
                    lonInput.value = result.x;
                    suggestionsBox.style.display = "none";
                });
                suggestionsBox.appendChild(li);
            });

            suggestionsBox.style.display = results.length ? "block" : "none";
        } catch (error) {
            console.error("Search failed:", error);
            suggestionsBox.style.display = "none";
        }
    });

    // Hide suggestions when clicking outside
    document.addEventListener("click", (e) => {
        if (!suggestionsBox.contains(e.target) && e.target !== locationInput) {
            suggestionsBox.style.display = "none";
        }
    });

    // Update address when marker is dragged
    marker.on("dragend", async function () {
        const pos = marker.getLatLng();
        try {
            const response = await fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${pos.lat}&lon=${pos.lng}&zoom=18&addressdetails=1`);
            const data = await response.json();
            if (data && data.address && data.address.country_code === "lk") {
                locationInput.value = data.display_name;
                latInput.value = pos.lat;
                lonInput.value = pos.lng;
            } else {
                alert("Please select a location within Sri Lanka.");
                resetToDefault();
            }
        } catch (error) {
            console.error("Reverse geocoding failed:", error);
            alert("Unable to retrieve address. Please try again.");
        }
    });

    // Use My Current Location
    if (useMyLocationBtn) {
        useMyLocationBtn.addEventListener("click", function () {
            useMyLocationBtn.innerHTML = '<span class="loading"></span> Getting Location...';
            useMyLocationBtn.disabled = true;

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    async (position) => {
                        const pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
                        };

                        try {
                            const response = await fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${pos.lat}&lon=${pos.lng}&zoom=18&addressdetails=1`);
                            const data = await response.json();
                            if (data && data.address && data.address.country_code === "lk") {
                                map.setView([pos.lat, pos.lng], 15);
                                marker.setLatLng([pos.lat, pos.lng]);
                                locationInput.value = data.display_name;
                                latInput.value = pos.lat;
                                lonInput.value = pos.lng;
                            } else {
                                alert("Your location is outside Sri Lanka. Please select a location within Sri Lanka.");
                                resetToDefault();
                            }
                        } catch (error) {
                            console.error("Geolocation reverse geocoding failed:", error);
                            alert("Unable to retrieve address. Please try again.");
                        } finally {
                            useMyLocationBtn.innerHTML = "📍 Use My Current Location";
                            useMyLocationBtn.disabled = false;
                        }
                    },
                    () => {
                        alert("Unable to retrieve your location. Please enable location services.");
                        useMyLocationBtn.innerHTML = "📍 Use My Current Location";
                        useMyLocationBtn.disabled = false;
                    }
                );
            } else {
                alert("Geolocation is not supported by your browser.");
                useMyLocationBtn.innerHTML = "📍 Use My Current Location";
                useMyLocationBtn.disabled = false;
            }
        });
    }

    // Reset to default location
    function resetToDefault() {
        map.setView(defaultLocation, 10);
        marker.setLatLng(defaultLocation);
        locationInput.value = "";
        latInput.value = "";
        lonInput.value = "";
        suggestionsBox.style.display = "none";
    }
});
</script>

@include('include.footer')
