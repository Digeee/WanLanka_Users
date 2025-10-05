@extends('layouts.master')

@include('include.header')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <div class="form-container">
                <!-- Header -->
                <div class="form-header">
                    <h1 class="mb-3">✨ Share Your Travel Gem</h1>
                    <p class="lead">Inspire fellow travelers with extraordinary destinations</p>
                </div>
                <!-- Form -->
                <div class="p-4 p-md-5">
                    <form id="addPlaceForm">
                        <div class="row g-4">
                            <!-- Place Name -->
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-0">
                                        <i class="fas fa-map-marker-alt text-primary"></i>
                                    </span>
                                    <div class="form-floating flex-grow-1">
                                        <input type="text" class="form-control rounded-end" id="placeName" name="place_name" placeholder="Place Name" required>
                                        <label for="placeName">Place Name</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Google Maps Link -->
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-0">
                                        <i class="fab fa-google text-danger"></i>
                                    </span>
                                    <div class="form-floating flex-grow-1">
                                        <input type="url" class="form-control rounded-end" id="googleLink" name="google_map_link" placeholder="Google Maps Link" required>
                                        <label for="googleLink">Google Maps Link</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Province -->
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-0">
                                        <i class="fas fa-globe-americas text-success"></i>
                                    </span>
                                    <div class="form-floating flex-grow-1">
                                        <select class="form-select rounded-end" id="province" name="province" required>
                                            <option selected disabled>Select Province</option>
                                            <option value="Western">Western</option>
                                            <option value="Central">Central</option>
                                            <option value="Southern">Southern</option>
                                            <option value="Northern">Northern</option>
                                            <option value="Eastern">Eastern</option>
                                            <option value="North Western">North Western</option>
                                            <option value="North Central">North Central</option>
                                            <option value="Uva">Uva</option>
                                            <option value="Sabaragamuwa">Sabaragamuwa</option>
                                        </select>
                                        <label for="province">Province</label>
                                    </div>
                                </div>
                            </div>
                            <!-- District -->
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-0">
                                        <i class="fas fa-city text-info"></i>
                                    </span>
                                    <div class="form-floating flex-grow-1">
                                        <select class="form-select rounded-end" id="district" name="district" required>
                                            <option selected disabled>Select District</option>
                                        </select>
                                        <label for="district">District</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Location -->
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-0">
                                        <i class="fas fa-location-dot text-warning"></i>
                                    </span>
                                    <div class="form-floating flex-grow-1">
                                        <input type="text" class="form-control rounded-end" id="location" name="location" placeholder="Location" required>
                                        <label for="location">Location</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Nearest City -->
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-0">
                                        <i class="fas fa-building text-secondary"></i>
                                    </span>
                                    <div class="form-floating flex-grow-1">
                                        <input type="text" class="form-control rounded-end" id="nearestCity" name="nearest_city" placeholder="Nearest City" required>
                                        <label for="nearestCity">Nearest City</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Description -->
                            <div class="col-12">
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-0">
                                        <i class="fas fa-align-left text-dark"></i>
                                    </span>
                                    <div class="form-floating flex-grow-1">
                                        <textarea class="form-control rounded-end" id="description" name="description" placeholder="Description" style="height:120px;" required></textarea>
                                        <label for="description">Description</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Best Suited For -->
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-0">
                                        <i class="fas fa-users text-purple"></i>
                                    </span>
                                    <div class="form-floating flex-grow-1">
                                        <select class="form-select rounded-end" id="bestSuited" name="best_suited_for" required>
                                            <option selected disabled>Best Suited For</option>
                                            <option value="Families">Families</option>
                                            <option value="Friends">Friends</option>
                                            <option value="Solo Travelers">Solo Travelers</option>
                                            <option value="Adventure Seekers">Adventure Seekers</option>
                                            <option value="Romantic Getaways">Romantic Getaways</option>
                                        </select>
                                        <label for="bestSuited">Best Suited For</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Activities Offered -->
                            <div class="col-md-6">
                                <label class="form-label mb-2 d-flex align-items-center">
                                    <i class="fas fa-mountain me-2 text-success"></i>
                                    Activities Offered
                                </label>
                                <div class="d-flex flex-wrap gap-2 p-3 bg-light rounded-3 border">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="activities_offered[]" value="Hiking" id="hiking">
                                        <label class="form-check-label" for="hiking">Hiking</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="activities_offered[]" value="Swimming" id="swimming">
                                        <label class="form-check-label" for="swimming">Swimming</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="activities_offered[]" value="Safari" id="safari">
                                        <label class="form-check-label" for="safari">Safari</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="activities_offered[]" value="Cultural Experiences" id="cultural">
                                        <label class="form-check-label" for="cultural">Cultural Experiences</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Your Rating -->
                            <div class="col-md-6">
                                <label class="form-label mb-2 d-flex align-items-center">
                                    <i class="fas fa-star me-2 text-warning"></i>
                                    Your Rating (1–5)
                                </label>
                                <div class="d-flex align-items-center">
                                    <input type="range" class="form-range flex-grow-1" min="1" max="5" id="rating" name="rating" required>
                                    <span id="ratingValue" class="ms-3 badge bg-warning text-dark fw-bold">3</span>
                                </div>
                            </div>
                            <!-- Upload Image -->
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-0">
                                        <i class="fas fa-image text-info"></i>
                                    </span>
                                    <div class="form-floating flex-grow-1">
                                        <input type="file" class="form-control rounded-end" id="uploadImage" name="image" accept="image/*">
                                        <label for="uploadImage">Upload Image</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Submit Button -->
                            <div class="col-12 text-center mt-4">
                                <button type="submit" class="btn btn-submit btn-lg px-5 py-3">
                                    <span class="d-flex align-items-center justify-content-center">
                                        <i class="fas fa-paper-plane me-2"></i>
                                        Submit Destination
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Body & Background */
    body {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                    url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #fff;
        min-height: 100vh;
    }

    /* Form Container */
    .form-container {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(12px);
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.1);
        animation: fadeInUp 0.6s ease-out;
    }

    /* Header Section */
    .form-header {
        background: linear-gradient(135deg, #1a2a6c, #b21f1f, #1a2a6c);
        color: #fff;
        text-align: center;
        padding: 2.5rem 1.5rem;
        position: relative;
        overflow: hidden;
    }

    .form-header::before {
        content: "";
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        animation: rotate 20s linear infinite;
        z-index: 0;
    }

    .form-header h1 {
        font-size: 2.2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        position: relative;
        z-index: 1;
        text-shadow: 0 2px 10px rgba(0,0,0,0.3);
    }

    .form-header p {
        font-size: 1.1rem;
        color: rgba(255,255,255,0.9);
        margin-bottom: 0;
        position: relative;
        z-index: 1;
    }

    /* Form Elements */
    .form-floating > .form-control,
    .form-floating > .form-select,
    .form-floating > textarea {
        background: rgba(255, 255, 255, 0.12);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: #fff;
        border-radius: 12px;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        padding-left: 1.25rem;
    }

    .form-floating > .form-control:focus,
    .form-floating > .form-select:focus,
    .form-floating > textarea:focus {
        border-color: #4e54c8;
        box-shadow: 0 0 0 0.25rem rgba(78, 84, 200, 0.25);
        background: rgba(255, 255, 255, 0.15);
        transform: translateY(-2px);
    }

    .form-floating > label {
        color: rgba(255, 255, 255, 0.7);
        padding-left: 1.25rem;
        transition: all 0.3s ease;
    }

    .form-control:focus ~ label,
    .form-select:focus ~ label,
    .form-control:not(:placeholder-shown) ~ label,
    .form-select:not(:placeholder-shown) ~ label {
        color: #4e54c8 !important;
        transform: scale(0.85) translateY(-0.5rem);
        padding-left: 0.5rem;
    }

    /* Input Groups */
    .input-group {
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .input-group:focus-within {
        box-shadow: 0 5px 15px rgba(78, 84, 200, 0.4);
        transform: translateY(-2px);
    }

    .input-group-text {
        background: rgba(255, 255, 255, 0.1);
        border: none;
        padding: 0.75rem 1rem;
    }

    /* Checkboxes */
    .form-check-input:checked {
        background-color: #4e54c8;
        border-color: #4e54c8;
    }

    .form-check-input {
        border: 2px solid rgba(255, 255, 255, 0.3);
        transition: all 0.2s ease;
    }

    .form-check-input:hover {
        transform: scale(1.1);
    }

    /* Range Slider */
    input[type="range"] {
        -webkit-appearance: none;
        height: 8px;
        border-radius: 4px;
        background: rgba(255, 255, 255, 0.1);
        outline: none;
    }

    input[type="range"]::-webkit-slider-thumb {
        -webkit-appearance: none;
        width: 22px;
        height: 22px;
        border-radius: 50%;
        background: #4e54c8;
        cursor: pointer;
        box-shadow: 0 0 10px rgba(78, 84, 200, 0.5);
        transition: all 0.2s ease;
    }

    input[type="range"]::-webkit-slider-thumb:hover {
        transform: scale(1.2);
        background: #6a71e6;
    }

    /* Submit Button */
    .btn-submit {
        background: linear-gradient(135deg, #4e54c8, #8f94fb);
        color: white;
        font-weight: 600;
        border: none;
        border-radius: 12px;
        padding: 1rem 2.5rem;
        font-size: 1.1rem;
        box-shadow: 0 8px 20px rgba(78, 84, 200, 0.4);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
    }

    .btn-submit:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 25px rgba(78, 84, 200, 0.6);
        color: white;
    }

    .btn-submit:active {
        transform: translateY(0);
    }

    .btn-submit::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: 0.5s;
    }

    .btn-submit:hover::before {
        left: 100%;
    }

    /* Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes rotate {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .form-header h1 {
            font-size: 1.8rem;
        }
        .form-header p {
            font-size: 1rem;
        }
        .input-group {
            flex-direction: column;
        }
        .input-group .input-group-text {
            width: 100%;
            justify-content: center;
            border-bottom: 1px solid rgba(255,255,255,0.2);
            border-radius: 12px 12px 0 0;
        }
        .form-floating {
            width: 100%;
        }
        .form-control, .form-select {
            border-radius: 0 0 12px 12px !important;
        }
    }

    /* Icons */
    .text-purple { color: #8f94fb !important; }
    .text-primary { color: #4e54c8 !important; }
    .text-success { color: #4ade80 !important; }
    .text-warning { color: #fbbf24 !important; }
    .text-info { color: #38bdf8 !important; }
    .text-secondary { color: #94a3b8 !important; }
    .text-danger { color: #f87171 !important; }
</style>

<script>
    // Update rating display
    document.getElementById('rating').addEventListener('input', function() {
        document.getElementById('ratingValue').textContent = this.value;
    });

    // District data based on province
    const districtsByProvince = {
        'Western': ['Colombo', 'Gampaha', 'Kalutara'],
        'Central': ['Kandy', 'Matale', 'Nuwara Eliya'],
        'Southern': ['Galle', 'Matara', 'Hambantota'],
        'Northern': ['Jaffna', 'Mannar', 'Vavuniya', 'Mullaitivu', 'Kilinochchi'],
        'Eastern': ['Batticaloa', 'Ampara', 'Trincomalee'],
        'North Western': ['Kurunegala', 'Puttalam'],
        'North Central': ['Anuradhapura', 'Polonnaruwa'],
        'Uva': ['Badulla', 'Monaragala'],
        'Sabaragamuwa': ['Ratnapura', 'Kegalle']
    };

    // Populate districts when province changes
    document.getElementById('province').addEventListener('change', function () {
        const province = this.value;
        const districtSelect = document.getElementById('district');
        districtSelect.innerHTML = '<option selected disabled>Select District</option>';
        if (districtsByProvince[province]) {
            districtsByProvince[province].forEach(district => {
                const option = document.createElement('option');
                option.value = district;
                option.textContent = district;
                districtSelect.appendChild(option);
            });
        }
    });

    // Form submission via API
    document.getElementById('addPlaceForm').addEventListener('submit', async function (e) {
        e.preventDefault();
        if (!confirm('Are you sure you want to submit this place?')) return;

        const formData = new FormData(this);

        // ✅ Append logged-in user info
        @auth
            formData.append('user_id', '{{ auth()->id() }}');
            formData.append('user_name', '{{ auth()->user()->name }}');
            formData.append('user_email', '{{ auth()->user()->email }}');
        @else
            alert('You must be logged in to submit a place.');
            return;
        @endauth

        // ✅ Convert activities checkboxes into a string
        const activities = Array.from(document.querySelectorAll('input[name="activities_offered[]"]:checked'))
            .map(cb => cb.value)
            .join(', ');
        formData.set('activities_offered', activities);

        try {
            const response = await fetch('http://127.0.0.1:8000/api/new-place', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Authorization': 'Bearer 1|8OImmqdUzzCwAOzoksoHFeOjpz1iSWSLTbTL3geC43aa48db'
                },
                body: formData
            });

            if (!response.ok) {
                const err = await response.json().catch(() => ({}));
                throw new Error(err.message || `Submission failed (HTTP ${response.status})`);
            }

            const data = await response.json();
            alert('Place submitted successfully! ID: ' + data.id);
            this.reset();

            // Reset district dropdown
            document.getElementById('district').innerHTML = '<option selected disabled>Select District</option>';

        } catch (error) {
            console.error('Error submitting place:', error);
            alert('Error submitting place: ' + error.message);
        }
    });
</script>

@include('include.footer')
