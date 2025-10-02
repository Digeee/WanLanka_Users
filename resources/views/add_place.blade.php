@extends('layouts.master')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="form-container">
                    <!-- Header -->
                    <div class="form-header">
                        <h1>🌍 Share a Tourist Destination</h1>
                        <p>Inspire travelers by adding remarkable places worth exploring</p>
                    </div>
                    <!-- Form -->
                    <div class="p-4 p-md-5">
                        <form id="addPlaceForm">
                            <div class="row g-3">
                                <!-- Place Name -->
                                <div class="col-md-6 form-floating">
                                    <input type="text" class="form-control" id="placeName" name="place_name" placeholder="Place Name" required>
                                    <label for="placeName">Place Name</label>
                                </div>
                                <!-- Google Maps Link -->
                                <div class="col-md-6 form-floating">
                                    <input type="url" class="form-control" id="googleLink" name="google_map_link" placeholder="Google Maps Link" required>
                                    <label for="googleLink">Google Maps Link</label>
                                </div>
                                <!-- Province -->
                                <div class="col-md-6 form-floating">
                                    <select class="form-select" id="province" name="province" required>
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
                                <!-- District -->
                                <div class="col-md-6 form-floating">
                                    <select class="form-select" id="district" name="district" required>
                                        <option selected disabled>Select District</option>
                                        <!-- Dynamically populated via JS -->
                                    </select>
                                    <label for="district">District</label>
                                </div>
                                <!-- Location -->
                                <div class="col-md-6 form-floating">
                                    <input type="text" class="form-control" id="location" name="location" placeholder="Location" required>
                                    <label for="location">Location</label>
                                </div>
                                <!-- Nearest City -->
                                <div class="col-md-6 form-floating">
                                    <input type="text" class="form-control" id="nearestCity" name="nearest_city" placeholder="Nearest City" required>
                                    <label for="nearestCity">Nearest City</label>
                                </div>
                                <!-- Description -->
                                <div class="col-12 form-floating">
                                    <textarea class="form-control" id="description" name="description" placeholder="Description" style="height:100px;" required></textarea>
                                    <label for="description">Description</label>
                                </div>
                                <!-- Best Suited For -->
                                <div class="col-md-6 form-floating">
                                    <select class="form-select" id="bestSuited" name="best_suited_for" required>
                                        <option selected disabled>Best Suited For</option>
                                        <option value="Families">Families</option>
                                        <option value="Friends">Friends</option>
                                        <option value="Solo Travelers">Solo Travelers</option>
                                        <option value="Adventure Seekers">Adventure Seekers</option>
                                        <option value="Romantic Getaways">Romantic Getaways</option>
                                    </select>
                                    <label for="bestSuited">Best Suited For</label>
                                </div>
                                <!-- Activities Offered -->
                                <div class="col-md-6">
                                    <label class="form-label">Activities Offered</label>
                                    <div class="d-flex flex-wrap gap-2">
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
                                <div class="col-md-6 form-floating">
                                    <input type="range" class="form-range" min="1" max="5" id="rating" name="rating" required>
                                    <label for="rating">Your Rating (1–5)</label>
                                </div>
                                <!-- Upload Image -->
                                <div class="col-md-6 form-floating">
                                    <input type="file" class="form-control" id="uploadImage" name="image" accept="image/*">
                                    <label for="uploadImage">Upload Image</label>
                                </div>
                                <!-- Submit Button -->
                                <div class="col-12 text-center mt-3">
                                    <button type="submit" class="btn btn-submit btn-lg px-5 py-3">Submit Destination ✨</button>
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
            background: url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #fff;
        }
        .overlay {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.45);
            z-index: -1;
        }
        /* Form Container */
        .form-container {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            border-radius: 25px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.5);
            overflow: hidden;
            transition: all 0.4s ease;
        }
        .form-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 60px rgba(0,0,0,0.6);
        }
        /* Header Section */
        .form-header {
            background: linear-gradient(135deg, #1A3C5A, #2E4B6F, #D4A017);
            color: #fff;
            text-align: center;
            padding: 3rem 1.5rem;
            position: relative;
            overflow: hidden;
            border-bottom-left-radius: 25px;
            border-bottom-right-radius: 25px;
        }
        .form-header h1 {
            font-size: 2.5rem;
            font-weight: 900;
            margin-bottom: 0.5rem;
            text-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }
        .form-header p {
            font-size: 1.2rem;
            color: rgba(255,255,255,0.9);
            margin-bottom: 0;
            text-shadow: 0 3px 8px rgba(0,0,0,0.2);
        }
        /* Floating Label Effect */
        .form-floating > .form-control,
        .form-floating > .form-select,
        .form-floating > textarea {
            background: rgba(255,255,255,0.2);
            border: 1px solid rgba(255,255,255,0.4);
            color: #fff;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }
        .form-floating > .form-control:focus,
        .form-floating > .form-select:focus,
        .form-floating > textarea:focus {
            border-color: #D4A017;
            box-shadow: 0 0 0 0.3rem rgba(212,160,23,0.35);
            background: rgba(255,255,255,0.25);
            color: #fff;
        }
        .form-floating > label {
            color: rgba(255,255,255,0.85);
            font-weight: 500;
        }
        /* Checkbox & Radio */
        .form-check-input:checked {
            background-color: #D4A017;
            border-color: #D4A017;
        }
        .form-check-label {
            color: #e0f7fa;
            font-weight: 500;
        }
        /* Range Slider */
        input[type="range"] {
            accent-color: #D4A017;
            height: 6px;
        }
        /* Submit Button */
        .btn-submit {
            background: linear-gradient(135deg, #1A3C5A, #D4A017);
            color: #fff;
            font-weight: 700;
            border-radius: 15px;
            transition: all 0.3s ease;
            font-size: 1.2rem;
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
        }
        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(0,0,0,0.35);
            opacity: 0.95;
        }
        @media (max-width: 768px) {
            .form-header h1 { font-size: 2rem; }
            .form-header p { font-size: 1rem; }
        }
    </style>
<script>
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



@endsection
