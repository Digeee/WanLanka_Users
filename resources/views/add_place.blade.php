<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add a Tourist Destination</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
      background: linear-gradient(135deg, #16a085, #1abc9c, #2ecc71);
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
      border-color: #16a085;
      box-shadow: 0 0 0 0.3rem rgba(22,160,133,0.35);
      background: rgba(255,255,255,0.25);
      color: #fff;
    }

    .form-floating > label {
      color: rgba(255,255,255,0.85);
      font-weight: 500;
    }

    /* Checkbox & Radio */
    .form-check-input:checked {
      background-color: #2ecc71;
      border-color: #2ecc71;
    }
    .form-check-label {
      color: #e0f7fa;
      font-weight: 500;
    }

    /* Range Slider */
    input[type="range"] {
      accent-color: #2ecc71;
      height: 6px;
    }

    /* Submit Button */
    .btn-submit {
      background: linear-gradient(135deg, #16a085, #2ecc71);
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
</head>
<body>

  <div class="overlay"></div>

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
            <form>
              <div class="row g-3">

                <!-- Destination Name -->
                <div class="col-md-6 form-floating">
                  <input type="text" class="form-control" id="destinationName" placeholder="Destination Name">
                  <label for="destinationName">Destination Name</label>
                </div>

                <!-- Google Maps Link -->
                <div class="col-md-6 form-floating">
                  <input type="url" class="form-control" id="googleLink" placeholder="Google Maps Link">
                  <label for="googleLink">Google Maps Link</label>
                </div>

                <!-- Nearest City / District -->
                <div class="col-md-6 form-floating">
                  <input type="text" class="form-control" id="nearestCity" placeholder="Nearest City / District">
                  <label for="nearestCity">Nearest City / District</label>
                </div>

                <!-- Upload Photos / Videos -->
                <div class="col-md-6 form-floating">
                  <input type="file" class="form-control" id="uploadMedia" multiple>
                  <label for="uploadMedia">Upload Photos / Videos</label>
                </div>

                <!-- Brief Description -->
                <div class="col-12 form-floating">
                  <textarea class="form-control" id="description" placeholder="Brief Description" style="height:100px;"></textarea>
                  <label for="description">Brief Description</label>
                </div>

                <!-- Best Suited For -->
                <div class="col-md-6 form-floating">
                  <select class="form-select" id="bestFor">
                    <option>Families</option>
                    <option>Friends</option>
                    <option>Solo Travelers</option>
                    <option>Adventure Seekers</option>
                    <option>Romantic Getaways</option>
                  </select>
                  <label for="bestFor">Best Suited For</label>
                </div>

                <!-- Activities Offered -->
                <div class="col-md-6">
                  <label class="form-label">Activities Offered</label>
                  <div class="d-flex flex-wrap gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="hiking">
                      <label class="form-check-label" for="hiking">Hiking</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="swimming">
                      <label class="form-check-label" for="swimming">Swimming</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="safari">
                      <label class="form-check-label" for="safari">Safari</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="cultural">
                      <label class="form-check-label" for="cultural">Cultural Experiences</label>
                    </div>
                  </div>
                </div>

                <!-- Recommended Budget -->
                <div class="col-md-6 form-floating">
                  <select class="form-select" id="budget">
                    <option>Budget-Friendly</option>
                    <option>Mid-Range</option>
                    <option>Luxury</option>
                  </select>
                  <label for="budget">Recommended Budget</label>
                </div>

                <!-- Best Time to Visit -->
                <div class="col-md-6 form-floating">
                  <input type="text" class="form-control" id="bestTime" placeholder="Best Time to Visit">
                  <label for="bestTime">Best Time to Visit</label>
                </div>

                <!-- Nearby Amenities -->
                <div class="col-md-6 form-floating">
                  <input type="text" class="form-control" id="amenities" placeholder="Nearby Amenities">
                  <label for="amenities">Nearby Amenities</label>
                </div>

                <!-- Accessibility -->
                <div class="col-md-6 form-floating">
                  <select class="form-select" id="accessibility">
                    <option>Wheelchair Accessible</option>
                    <option>Easy Trek</option>
                    <option>Moderate Trek</option>
                    <option>Difficult Trek</option>
                  </select>
                  <label for="accessibility">Accessibility</label>
                </div>

                <!-- Safety & Travel Tips -->
                <div class="col-12 form-floating">
                  <textarea class="form-control" id="tips" placeholder="Safety & Travel Tips" style="height:60px;"></textarea>
                  <label for="tips">Safety & Travel Tips</label>
                </div>

                <!-- Hidden Gem Score -->
                <div class="col-md-6 form-floating">
                  <input type="range" class="form-range" min="1" max="10" id="hiddenScore">
                  <label for="hiddenScore">Hidden Gem Score (1–10)</label>
                </div>

                <!-- Suggested Duration -->
                <div class="col-md-6 form-floating">
                  <input type="text" class="form-control" id="duration" placeholder="Suggested Duration">
                  <label for="duration">Suggested Duration of Visit</label>
                </div>

                <!-- Submit Button -->
                <div class="col-12 text-center mt-3">
                  <button type="submit" class="btn btn-submit btn-lg px-5 py-3">Submit Destination ✨</button>
                </div>

              </div>
            </form>
          </div>

</div>
