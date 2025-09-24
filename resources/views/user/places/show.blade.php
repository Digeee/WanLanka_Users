@extends('layouts.master')
@include('include.header')

<section class="place-details">
    <!-- Header Section -->
    <div class="header-section">
        <div class="container">
            <h1 class="place-title">{{ $place['name'] ?? 'N/A' }}</h1>
            <button id="visitNowBtn" class="btn btn-primary">Visit Now</button>
        </div>
    </div>

    <!-- Main Content Section -->
    <div class="container main-content">
        <div class="row">
            <!-- Details Section -->
            <div class="col-md-6 details-section">
                <div class="details-card">
                    <h2 class="section-title">Details</h2>
                    <div class="details-content">
                        <p><strong>Province:</strong> {{ $place['province'] ?? 'N/A' }}</p>
                        <p><strong>District:</strong> {{ $place['district'] ?? 'N/A' }}</p>
                        <p><strong>Location:</strong> {{ $place['location'] ?? 'N/A' }}</p>
                        <p><strong>Description:</strong> {{ $place['description'] ?? 'N/A' }}</p>
                        <p><strong>Weather:</strong> {{ $place['weather'] ?? 'N/A' }}</p>
                        <p><strong>Best Time to Visit:</strong> {{ $place['best_time_to_visit'] ?? 'N/A' }}</p>
                        <p><strong>Entry Fee:</strong> {{ $place['entry_fee'] ?? 'N/A' }}</p>
                        <p><strong>Opening Hours:</strong> {{ $place['opening_hours'] ?? 'N/A' }}</p>
                        <p><strong>Rating:</strong> {{ $place['rating'] ? $place['rating'] . ' Stars' : 'N/A' }}</p>
                    </div>
                </div>
            </div>
            <!-- Images Section -->
            <div class="col-md-6 images-section">
                <div class="images-card">
                    <h2 class="section-title">Photos</h2>
                    @if($place['image'])
                        <img src="{{ $place['image'] }}" alt="{{ $place['name'] ?? 'Place Image' }}" class="main-image">
                    @else
                        <p class="no-image">No main image available.</p>
                    @endif
                    <h2 class="section-title mt-4">Gallery</h2>
                    @if(!empty($place['gallery']) && is_array($place['gallery']))
                        <div class="gallery-slider">
                            <div class="gallery-wrapper">
                                @foreach($place['gallery'] as $image)
                                    <div class="gallery-slide">
                                        <img src="{{ $image }}" alt="Gallery Image" class="gallery-image">
                                    </div>
                                @endforeach
                            </div>
                            <button class="gallery-prev">◄</button>
                            <button class="gallery-next">►</button>
                        </div>
                    @else
                        <p class="no-image">No gallery images available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Visit Now Modal -->
<div class="modal fade" id="visitNowModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Visit {{ $place['name'] ?? 'Place' }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="bookingForm">
                    <div class="mb-3">
                        <label for="pickupDistrict" class="form-label">Pickup District</label>
                        <select class="form-select" id="pickupDistrict" name="pickup_district" required>
                            <option value="">Select District</option>
                            <option value="Colombo">Colombo</option>
                            <option value="Gampaha">Gampaha</option>
                            <option value="Kalutara">Kalutara</option>
                            <option value="Kandy">Kandy</option>
                            <option value="Matale">Matale</option>
                            <option value="Nuwara Eliya">Nuwara Eliya</option>
                            <option value="Galle">Galle</option>
                            <option value="Matara">Matara</option>
                            <option value="Hambantota">Hambantota</option>
                            <option value="Jaffna">Jaffna</option>
                            <option value="Mannar">Mannar</option>
                            <option value="Vavuniya">Vavuniya</option>
                            <option value="Mullaitivu">Mullaitivu</option>
                            <option value="Kilinochchi">Kilinochchi</option>
                            <option value="Batticaloa">Batticaloa</option>
                            <option value="Ampara">Ampara</option>
                            <option value="Trincomalee">Trincomalee</option>
                            <option value="Kurunegala">Kurunegala</option>
                            <option value="Puttalam">Puttalam</option>
                            <option value="Anuradhapura">Anuradhapura</option>
                            <option value="Polonnaruwa">Polonnaruwa</option>
                            <option value="Badulla">Badulla</option>
                            <option value="Monaragala">Monaragala</option>
                            <option value="Ratnapura">Ratnapura</option>
                            <option value="Kegalle">Kegalle</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="pickupLocation" class="form-label">Specific Pickup Location</label>
                        <input type="text" class="form-control" id="pickupLocation" name="pickup_location" placeholder="e.g., No. 123, Main Street, Jaffna" required>
                    </div>
                    <div class="mb-3">
                        <label for="peopleCount" class="form-label">Number of People</label>
                        <input type="number" class="form-control" id="peopleCount" name="people_count" min="1" value="1" required>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="mb-3">
                        <label for="time" class="form-label">Time</label>
                        <input type="time" class="form-control" id="time" name="time" required>
                    </div>
                    <div class="mb-3">
                        <label for="vehicleSelect" class="form-label">Select Vehicle</label>
                        <select class="form-select" id="vehicleSelect" name="vehicle_id" required>
                            <option value="">Loading vehicles...</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="guiderSelect" class="form-label">Do you want a guider?</label>
                        <select class="form-select" id="guiderSelect" name="guider" required>
                            <option value="no">No</option>
                            <option value="yes">Yes</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <p><strong>Total Price: $<span id="totalPrice">0.00</span></strong></p>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Order Now</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Gallery Slider
    const galleryWrapper = document.querySelector('.gallery-wrapper');
    const slides = document.querySelectorAll('.gallery-slide');
    const prevButton = document.querySelector('.gallery-prev');
    const nextButton = document.querySelector('.gallery-next');
    let currentIndex = 0;
    const totalSlides = slides.length;

    if (galleryWrapper && slides.length > 0) {
        function updateSlider() {
            galleryWrapper.style.transform = `translateX(-${currentIndex * 100}%)`;
        }

        prevButton.addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
            updateSlider();
        });

        nextButton.addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % totalSlides;
            updateSlider();
        });

        let autoSlide = setInterval(() => {
            currentIndex = (currentIndex + 1) % totalSlides;
            updateSlider();
        }, 5000);

        galleryWrapper.addEventListener('mouseenter', () => clearInterval(autoSlide));
        galleryWrapper.addEventListener('mouseleave', () => {
            autoSlide = setInterval(() => {
                currentIndex = (currentIndex + 1) % totalSlides;
                updateSlider();
            }, 5000);
        });
    }

    // Visit Now Modal
    const visitNowBtn = document.getElementById('visitNowBtn');
    const modal = new bootstrap.Modal(document.getElementById('visitNowModal'));
    const form = document.getElementById('bookingForm');
    const vehicleSelect = document.getElementById('vehicleSelect');
    const guiderSelect = document.getElementById('guiderSelect');
    const totalPriceSpan = document.getElementById('totalPrice');
    const pickupDistrict = document.getElementById('pickupDistrict');
    const peopleCount = document.getElementById('peopleCount');

    console.log('Script loaded, visitNowBtn:', visitNowBtn);

    if (visitNowBtn) {
        visitNowBtn.addEventListener('click', () => {
            console.log('Visit Now clicked');
            modal.show();
        });
    }

    // Fetch vehicles
    fetch('http://127.0.0.1:8000/api/vehicles', {
        headers: {
            'Authorization': 'Bearer 1|8OImmqdUzzCwAOzoksoHFeOjpz1iSWSLTbTL3geC43aa48db',
            'Accept': 'application/json'
        }
    })
    .then(response => {
        console.log('Vehicles API response status:', response.status);
        if (!response.ok) throw new Error('Failed to fetch vehicles: ' + response.status);
        return response.json();
    })
    .then(vehicles => {
        console.log('Vehicles data:', vehicles);
        vehicleSelect.innerHTML = '<option value="">Select Vehicle</option>';
        if (vehicles.length === 0) {
            vehicleSelect.innerHTML = '<option value="">No vehicles available</option>';
        } else {
            vehicles.forEach(vehicle => {
                const option = document.createElement('option');
                option.value = vehicle.id;
                option.textContent = `${vehicle.type} (${vehicle.seat_count} seats) - Base $${vehicle.base_price}`;
                vehicleSelect.appendChild(option);
            });
        }
    })
    .catch(error => {
        console.error('Error loading vehicles:', error);
        vehicleSelect.innerHTML = '<option value="">No vehicles available</option>';
    });

    // Calculate price
    const priceElements = [pickupDistrict, peopleCount, vehicleSelect, guiderSelect];
    priceElements.forEach(element => {
        element.addEventListener('change', calculatePrice);
    });

    function calculatePrice() {
        const district = pickupDistrict.value;
        const people = parseInt(peopleCount.value);
        const vehicleId = vehicleSelect.value;
        const guider = guiderSelect.value;
        if (!district || !people || !vehicleId) {
            totalPriceSpan.textContent = '0.00';
            return;
        }

        const districtMatrix = {
            'Colombo': 0, 'Gampaha': 1, 'Kalutara': 2, 'Kandy': 3, 'Matale': 4,
            'Nuwara Eliya': 5, 'Galle': 6, 'Matara': 7, 'Hambantota': 8, 'Jaffna': 9,
            'Mannar': 10, 'Vavuniya': 11, 'Mullaitivu': 12, 'Kilinochchi': 13,
            'Batticaloa': 14, 'Ampara': 15, 'Trincomalee': 16, 'Kurunegala': 17,
            'Puttalam': 18, 'Anuradhapura': 19, 'Polonnaruwa': 20, 'Badulla': 21,
            'Monaragala': 22, 'Ratnapura': 23, 'Kegalle': 24
        };

        const placeDistrict = '{{ $place['district'] ?? 'Jaffna' }}';
        const distance = Math.abs(districtMatrix[district] - districtMatrix[placeDistrict]);
        const basePrice = 50;
        const extraPrice = distance * 10;
        const guiderPrice = guider === 'yes' ? 20 : 0;
        const totalPrice = (basePrice + extraPrice + guiderPrice) * people;
        totalPriceSpan.textContent = totalPrice.toFixed(2);
    }

    // Submit booking
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(form);
        formData.append('place_id', '{{ $place['id'] ?? '' }}');
        formData.append('total_price', totalPriceSpan.textContent);

        console.log('Form data:', Object.fromEntries(formData));

        fetch('http://127.0.0.1:8000/api/bookings', {
            method: 'POST',
            headers: {
                'Authorization': 'Bearer 1|8OImmqdUzzCwAOzoksoHFeOjpz1iSWSLTbTL3geC43aa48db',
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(response => {
            console.log('Booking API response status:', response.status);
            if (!response.ok) {
                return response.json().then(err => { throw new Error(JSON.stringify(err)) });
            }
            return response.json();
        })
        .then(data => {
            console.log('Booking response:', data);
            alert('Booking created successfully! ID: ' + data.booking_id);
            modal.hide();
            form.reset();
            totalPriceSpan.textContent = '0.00';
            vehicleSelect.innerHTML = '<option value="">Select Vehicle</option>';
        })
        .catch(error => {
            console.error('Booking error:', error);
            alert('Error creating booking: ' + error.message);
        });
    });
});
</script>

@include('include.footer')
