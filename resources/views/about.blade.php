<!-- resources/views/about.blade.php -->
@extends('layouts.master')
@include('include.Header')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us | Wan Lanka Tours</title>
  <style>
    /* General Section Styling */
    section {
      padding: 60px 8%;
    }
    h2 {
      font-size: 32px;
      margin-bottom: 20px;
      color: #007b9a;
    }
    p {
      margin-bottom: 15px;
      color: #ffff;
      line-height: 1.6;
    }

    /* Hero Section */
    .hero {
      background: url("{{ asset('images/hero.jpg') }}") no-repeat center center/cover;
      height: 350px;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 70px;
      text-align: center;
    }
    .hero h1 {
      color: white;
      font-size: 50px;
      text-shadow: 2px 2px 6px rgba(0,0,0,0.6);
    }

    /* About Us */
    .about {
      display: flex;
      flex-wrap: wrap;
      gap: 40px;
      align-items: center;
      justify-content: center;
    }
    .about img {
      width: 350px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .about-text {
      flex: 1;
      min-width: 300px;
    }

    /* Mission & Vision */
    .mission {
      background: #2aa198;
      color: white;
      padding: 40px 6%;
      margin: 40px auto;
      border-radius: 12px;
      max-width: 900px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    }
    .mission h2 {
      font-size: 28px;
      margin-bottom: 20px;
      font-weight: 700;
      text-align: center;
    }
    .mission p {
      margin-bottom: 15px;
      font-size: 15px;
      text-align: justify;
    }

    /* Features */
    .features {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 20px;
      text-align: center;
      margin-top: 40px;
    }
    .feature-box {
      background: #f8f8f8;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      transition: transform 0.3s;
    }
    .feature-box:hover {
      transform: translateY(-5px);
    }
    .feature-box h3 {
      margin-bottom: 10px;
      color: #007b9a;
    }

    /* Team Section */
    .team .card-custom {
      transition: transform 0.3s;
      background: rgba(255,255,255,0.9);
      border-radius: 12px;
      padding: 20px;
    }
    .team .card-custom:hover {
      transform: translateY(-5px);
    }

    /* Timeline */
    .timeline .glass {
      background: rgba(255,255,255,0.8);
      padding: 15px 20px;
      border-radius: 10px;
      margin-bottom: 15px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

  </style>
</head>
<body>

<!-- Hero Section with Bootstrap -->
<section class="hero d-flex align-items-center text-center text-white"
  style="min-height: 70vh; background: url('{{ asset('images/hero.jpg') }}') no-repeat center center/cover; position: relative;">


<!-- Content Box -->
<div class="container position-relative">
  <div class="bg-dark bg-opacity-75 p-5 rounded shadow-lg d-inline-block text-white">
    <h1 class="display-4 fw-bold mb-3">About Us</h1>
    <p class="lead mb-4">Discover our story and mission to inspire and innovate.</p>
    <a href="#learn-more" class="btn-learn">Start Your Journey</a>

  </div>
</div>
</section>

<style>
/* Custom Gradient Button */
.btn-learn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  padding: 12px 28px;
  font-size: 1rem;
  font-weight: 600;
  border-radius: 8px; /* less pill, more rectangle like your screenshot */
  text-decoration: none;
  color: #fff;
  background: linear-gradient(90deg, #2aa198, #3dc9b0);
  box-shadow: 0 4px 12px rgba(0,0,0,0.15);
  transition: all 0.3s ease-in-out;
}

.btn-learn:hover {
  background: linear-gradient(90deg, #28b294, #34d1b6);
  transform: translateY(-2px);
  box-shadow: 0 6px 16px rgba(0,0,0,0.25);
  text-decoration: none;
  color: #fff;
}

.btn-learn:active {
  transform: translateY(1px) scale(0.97);
}
</style>

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Who We Are Section -->
  <section class="about">
    <img src="{{ asset('images/team.jpg') }}" alt="Team">
    <div class="about-text">
      <h2 class="display-6 fw-bold mb-3">Who We Are</h2>
      <p>We are Wan Lanka, your trusted travel partner in discovering the wonders of Sri Lanka. With years of experience, we curate unforgettable journeys filled with culture, nature, and authentic local experiences.</p>
      <p>Our dedicated team ensures your journey is smooth, safe, and memorable – whether you're here for relaxation, adventure, or exploration.</p>
    </div>
  </section>



  <!-- Mission & Vision Section -->
<section class="mission">
  <div class="mission-overlay">
    <div class="mission-container text-center">
      <h2>Mission & Vision</h2>
      <img src="{{ asset('images/mission-icon.jpg') }}" alt="Mission Icon" class="mission-icon mb-4">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
      <p>Sed non mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue.</p>

    </div>
  </div>
</section>

<style>
/* Mission & Vision Section Styles */
.mission {
  position: relative;
  background: url("{{ asset('images/mission-bg.jpg') }}") no-repeat center center/cover;
  padding: 80px 20px;
  color: white;
  overflow: hidden;
}

.mission-overlay {
  background: rgba(17, 191, 197, 0.55); /* semi-transparent dark overlay */
  padding: 60px 20px;
  border-radius: 20px;
  max-width: 1000px;
  margin: auto;
  box-shadow: 0 8px 25px 2aa198(17, 192, 215, 0.3);
}

.mission-container h2 {
  font-size: 38px;
  color: #ffff;
  font-weight: 700;
  margin-bottom: 20px;
  text-shadow: 2px 2px 8px rgba(0,0,0,0.6);
}

.mission-icon {
  width: 80px;
  height: 80px;
}

.mission-container p {
  font-size: 16px;
  line-height: 1.8;
  margin-bottom: 20px;
  color: #f1f1f1;
  text-align: justify;
}

/* Optional: Add subtle animation */
.mission-container p {
  opacity: 0;
  transform: translateY(20px);
  animation: fadeUp 1s forwards;
  animation-delay: 0.2s;
}

.mission-container p:nth-child(3) { animation-delay: 0.4s; }
.mission-container p:nth-child(4) { animation-delay: 0.6s; }

@keyframes fadeUp {
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Responsive Adjustments */
@media (max-width: 768px) {
  .mission-container h2 {
    font-size: 28px;
  }
  .mission-container p {
    font-size: 15px;
  }
  .mission-icon {
    width: 60px;
    height: 60px;
  }
}
</style>


<!-- Features Section -->
<section class="py-5 bg-white">

    <h2 class="why-title">Why Choose Us</h2>

<style>
.why-title {
  text-align: center;
  font-size: 2.5rem;
  font-weight: 700;
  color: #007b9a;  /* Teal theme */
  position: relative;
  margin-bottom: 40px;
  letter-spacing: 1px;
}
/* Decorative underline */
.why-title::after {
  content: "";
  position: absolute;
  width: 80px;
  height: 4px;
  background: #007b9a;
  bottom: -12px;
  left: 50%;
  transform: translateX(-50%);
  border-radius: 2px;
}

</style>

      <!-- Features Section -->
<section class="features-section py-5">

    <div class="row text-center g-4">

      <!-- Feature 1 -->
      <div class="col-md-6 col-lg-3">
        <div class="feature-card p-4 h-100 border-top-green">
          <div class="icon-circle icon-green mx-auto mb-3">🌍</div>
          <h5 class="fw-bold">Affordable Travels</h5>
          <p class="text-muted small">Budget-friendly tours designed for all travelers.</p>
        </div>
      </div>

      <!-- Feature 2 -->
      <div class="col-md-6 col-lg-3">
        <div class="feature-card p-4 h-100 border-top-orange">
          <div class="icon-circle icon-orange mx-auto mb-3">🧭</div>
          <h5 class="fw-bold">Guided Experiences</h5>
          <p class="text-muted small">Expert local guides for enriching journeys.</p>
        </div>
      </div>

      <!-- Feature 3 -->
      <div class="col-md-6 col-lg-3">
        <div class="feature-card p-4 h-100 border-top-purple">
          <div class="icon-circle icon-purple mx-auto mb-3">🎟</div>
          <h5 class="fw-bold">Group Discounts</h5>
          <p class="text-muted small">Special offers for group and family trips.</p>
        </div>
      </div>

      <!-- Feature 4 -->
      <div class="col-md-6 col-lg-3">
        <div class="feature-card p-4 h-100 border-top-teal">
          <div class="icon-circle icon-teal mx-auto mb-3">💬</div>
          <h5 class="fw-bold">Guest Support</h5>
          <p class="text-muted small">24/7 support to assist you anytime, anywhere.</p>
        </div>
      </div>

    </div>
  </div>
</section>

<style>
/* Section title */
.why-title {
  text-align: center;
  font-size: 2.5rem;
  font-weight: 700;
  color: #007b9a;
  position: relative;
  margin-bottom: 50px;
}
.why-title::after {
  content: "";
  position: absolute;
  width: 120px;
  height: 5px;
  background: linear-gradient(90deg, #007b9a, #2aa198);
  bottom: -15px;
  left: 50%;
  transform: translateX(-50%);
  border-radius: 3px;
}



/* Card base */
.feature-card {
  background: #fff;
  border-radius: 15px;
  box-shadow: 0 6px 16px rgba(0,0,0,0.08);
  transition: transform 0.4s ease, box-shadow 0.4s ease;
}
.feature-card:hover {
  transform: translateY(-8px) scale(1.03);
  box-shadow: 0 12px 28px rgba(0,0,0,0.15);
}

/* Colored borders for uniqueness */
.border-top-green { border-top: 5px solid #2ecc71; }
.border-top-orange { border-top: 5px solid #f39c12; }
.border-top-purple { border-top: 5px solid #9b59b6; }
.border-top-teal { border-top: 5px solid #16a085; }

/* Icon circle base */
.icon-circle {
  width: 80px;
  height: 80px;
  font-size: 2rem;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 15px;
  color: #fff;
  box-shadow: 0 4px 12px rgba(0,0,0,0.2);
  transition: transform 0.4s ease;
}
.feature-card:hover .icon-circle {
  transform: rotate(8deg) scale(1.15);
}

/* Unique icon colors */
.icon-green { background: linear-gradient(135deg, #27ae60, #2ecc71); }
.icon-orange { background: linear-gradient(135deg, #e67e22, #f39c12); }
.icon-purple { background: linear-gradient(135deg, #8e44ad, #9b59b6); }
.icon-teal { background: linear-gradient(135deg, #16a085, #1abc9c); }
</style>




<!-- Team Section -->
<section class="team-section py-5" aria-labelledby="team-heading">
  <h2 id="team-heading" class="team-heading mb-4 text-center">Team Members</h2>

  <div class="team-row d-flex justify-content-center flex-wrap gap-4">  <!-- Team Member 1 -->
        <div class="team-card text-center">
          <h5 class="team-name mb-3">Nimal Perera</h5>
          <img src="{{ asset('images/team1.jpg') }}" alt="Nimal Perera, Senior Safari Guide" class="rounded-circle mb-2" loading="lazy">
          <p class="team-role">Senior Safari Guide</p>
        </div>

        <!-- Team Member 2 -->
        <div class="team-card text-center">
          <h5 class="team-name mb-3">Anusha Fernando</h5>
          <img src="{{ asset('images/team2.jpg') }}" alt="Anusha Fernando, Cultural Curator" class="rounded-circle mb-2" loading="lazy">
          <p class="team-role">Cultural Curator</p>
        </div>

        <!-- Team Member 3 -->
        <div class="team-card text-center">
          <h5 class="team-name mb-3">Dilshan Silva</h5>
          <img src="{{ asset('images/team3.jpg') }}" alt="Dilshan Silva, Operations Lead" class="rounded-circle mb-2" loading="lazy">
          <p class="team-role">Operations Lead</p>
        </div>

        <!-- Team Member 4 -->
        <div class="team-card text-center">
          <h5 class="team-name mb-3">Kavindi Jayasooriya</h5>
          <img src="{{ asset('images/team4.jpg') }}" alt="Kavindi Jayasooriya, Sustainability Officer" class="rounded-circle mb-2" loading="lazy">
          <p class="team-role">Sustainability Officer</p>
        </div>
      </div>
    </div>
  </section>

<style>
/* Team Section Styles */
.team-heading {
  font-size: 36px;
  color: #007b9a;
  font-weight: 700;
}

/* Team heading with underline */
.team-heading {
  position: relative;   /* keeps ::after tied to the heading */
  font-size: 36px;
  color: #007b9a;
  font-weight: 700;
}

/* Decorative underline */
.team-heading::after {
  content: "";
  position: absolute;
  width: 80px;
  height: 4px;
  background:#007b9a;
  bottom: -10px;        /* distance below text */
  left: 50%;
  transform: translateX(-50%);
  border-radius: 2px;
}


/* Flex row for horizontal alignment */
.team-row {
  display: flex;
  justify-content: space-between; /* evenly space the 4 members */
  flex-wrap: nowrap; /* single line on large screens */
  gap: 20px;
}

.team-card {
  background: #ffffff;
  border-radius: 12px;
  padding: 20px;
  width: 22%; /* 4 cards fit in one line */
  transition: transform 0.3s, box-shadow 0.3s;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

/* Team member name/title above image */
.team-card .team-name {
  color: #007b9a;
  font-size: 18px;
  font-weight: 600;
  margin-bottom: 12px; /* spacing above the image */
}


/* Team member image */
.team-card img {
  width: 120px;
  height: 120px;
  object-fit: cover;
  border-radius: 50%;
  border: 3px solid #2aa198;
  margin-bottom: 10px;
}

/* Team member role below image */
.team-card .team-role {
  color: #555;
  font-size: 14px;
}

/* Hover effect */
.team-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 10px 20px rgba(0,0,0,0.15);
}

/* Responsive Adjustments */
@media (max-width: 992px) {
  .team-row {
    flex-wrap: wrap; /* wrap on medium screens */
    justify-content: center;
  }
  .team-card {
    width: 45%; /* 2 cards per row */
    margin-bottom: 20px;
  }
}

@media (max-width: 576px) {
  .team-card {
    width: 90%; /* single card per row */
  }
  .team-heading {
    font-size: 28px;
  }
}
</style>


  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Timeline with Background</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Timeline Section with Background Image */
    .timeline {
      max-width: 900px;
      margin: 0 auto;
      padding: 100px 20px;
      background: url("images/timeline-bg.jpg") center/cover no-repeat; /* ✅ your image */
      position: relative;
      color: #fff;
    }

    /* Dark overlay for readability */
    .timeline h2 {
      position: relative;
      text-align: center;
      margin-bottom: 60px;
      font-size: 36px;
      font-weight: 800;
      color: #fff;
      z-index: 2;
    }

    .timeline h2::after {
      content: "";
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      bottom: -15px;
      width: 80px;
      height: 4px;
      background: #2aa198;
      border-radius: 2px;
    }

    .timeline-item {
      position: relative;
      background: #ffffff78;
      color: #333;
      border-radius: 12px;
      padding: 25px 30px;
      margin-bottom: 40px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.15);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      z-index: 2;
    }

    .timeline-item:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.25);
    }

    .timeline-year {
      position: absolute;
      top: -15px;
      left: 20px;
      background: #007b9a;
      color: #fff;
      font-weight: 700;
      font-size: 14px;
      padding: 5px 14px;
      border-radius: 30px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    }

    .timeline-text {
      font-size: 16px;
      margin: 0;
    }
  </style>
</head>
<body>

  <section class="timeline">
    <h2>Our Journey</h2>

    <!-- Item 1 -->
    <div class="timeline-item">
      <div class="timeline-year">2016</div>
      <p class="timeline-text">🚀 Started with 3 local guides and 5 tours per month.</p>
    </div>

    <!-- Item 2 -->
    <div class="timeline-item">
      <div class="timeline-year">2019</div>
      <p class="timeline-text">🍲 Expanded into cultural and culinary itineraries.</p>
    </div>

    <!-- Item 3 -->
    <div class="timeline-item">
      <div class="timeline-year">2023</div>
      <p class="timeline-text">🌍 Launched community stays and sustainability partnerships.</p>
    </div>
  </section>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<style>
/* Responsive for smaller screens */
@media (max-width: 768px) {
  .timeline .d-flex {
    flex-direction: column;
    padding-left: 0;
  }
  .timeline .me-3 {
    width: 100%;
    text-align: left;
    margin-bottom: 10px;
  }
  .timeline .me-3::after {
    left: 0;
    right: auto;
  }
}
</style>

<!-- 🌟 Testimonials Section -->
<section class="py-5 bg-light">

    <!-- Section Heading -->
    <div class="text-center mb-5">
      <h2 class="fw-bold text-primary">What Our Travelers Say</h2>
      <p class="text-muted">Real stories from our happy adventurers</p>
    </div>

    <div class="row g-4">
      <!-- Testimonial 1 -->
      <div class="col-md-4">
        <div class="card shadow-sm border-0 h-100 p-4 testimonial-card">
          <div class="d-flex align-items-center mb-3">
            <img src="https://i.pravatar.cc/80?img=12" class="rounded-circle me-3" alt="Traveler">
            <div>
              <h6 class="mb-0 fw-bold">Sarah Johnson</h6>
              <small class="text-muted">From Canada</small>
            </div>
          </div>
          <p class="fst-italic text-dark">“Wan Lanka made my Sri Lanka trip unforgettable! From breathtaking landscapes to cultural experiences, everything was perfectly arranged.”</p>
          <!-- Star Rating -->
          <div class="text-warning">
            ★★★★★
          </div>
        </div>
      </div>

      <!-- Testimonial 2 -->
      <div class="col-md-4">
        <div class="card shadow-sm border-0 h-100 p-4 testimonial-card">
          <div class="d-flex align-items-center mb-3">
            <img src="https://i.pravatar.cc/80?img=24" class="rounded-circle me-3" alt="Traveler">
            <div>
              <h6 class="mb-0 fw-bold">David Lee</h6>
              <small class="text-muted">From Singapore</small>
            </div>
          </div>
          <p class="fst-italic text-dark">“The team went above and beyond to ensure our comfort. I highly recommend their tours for anyone visiting Sri Lanka.”</p>
          <div class="text-warning">
            ★★★★☆
          </div>
        </div>
      </div>

      <!-- Testimonial 3 -->
      <div class="col-md-4">
        <div class="card shadow-sm border-0 h-100 p-4 testimonial-card">
          <div class="d-flex align-items-center mb-3">
            <img src="https://i.pravatar.cc/80?img=36" class="rounded-circle me-3" alt="Traveler">
            <div>
              <h6 class="mb-0 fw-bold">Emma Watson</h6>
              <small class="text-muted">From UK</small>
            </div>
          </div>
          <p class="fst-italic text-dark">“Professional guides, amazing service, and a truly authentic experience. I’ll definitely travel with them again!”</p>
          <div class="text-warning">
            ★★★★★
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Custom CSS -->
<style>
.testimonial-card {
  border-radius: 16px;
  position: relative;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.testimonial-card::before {
  content: "“";
  font-size: 4rem;
  color: #007b9a20;
  position: absolute;
  top: 10px;
  left: 20px;
  font-family: serif;
}

/* Section Heading Styles */
.text-center.mb-5 {
  margin-bottom: 3rem; /* spacing below heading */
}

.text-center.mb-5 h2 {
  font-size: 2.5rem;          /* larger heading */
  font-weight: 700;           /* bold */
  color: #007b9a;             /* primary color */
  position: relative;          /* for decorative underline */
  display: inline-block;       /* width matches text */
  margin-bottom: 0.5rem;
  transition: color 0.3s;
}

/* Decorative underline under heading */
.text-center.mb-5 h2::after {
  content: "";
  display: block;
  width: 60px;                /* underline width */
  height: 4px;                /* thickness */
  background-color: #1c2bd4f6;  /* underline color */
  margin: 8px auto 0;         /* center it below text */
  border-radius: 2px;          /* rounded edges */
}

/* Hover effect on heading (optional) */
.text-center.mb-5 h2:hover {
  color: #005f73;
}

/* Subtext styling */
.text-center.mb-5 p {
  font-size: 1rem;
  color: #6c757d; /* muted gray */
  margin: 0;
}

.testimonial-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}
</style>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us Button</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* Small floating Contact Us button */
    .contact-btn {
      position: fixed;
      bottom: 30px;
      right: 30px;
      background: #007b9a;
      color: white;
      border-radius: 50px;
      padding: 12px 20px;
      font-size: 14px;
      font-weight: 600;
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
      transition: transform 0.3s, background 0.3s;
      z-index: 1050;
    }

    .contact-btn:hover {
      background: #005f73;
      transform: scale(1.1);
    }

    /* Modal input focus style */
    .modal-body .form-control:focus {
      border-color: #007b9a;
      box-shadow: 0 0 0 0.2rem rgba(0,123,154,.25);
    }
  </style>
</head>
<body>

  <!-- Floating Contact Us Button -->
  <button class="contact-btn" data-bs-toggle="modal" data-bs-target="#contactModal">
    Contact Us
  </button>

  <!-- Contact Us Modal -->
  <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="contactModalLabel">Get in Touch</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <input type="text" class="form-control" placeholder="Your Name" required>
            </div>
            <div class="mb-3">
              <input type="email" class="form-control" placeholder="Your Email" required>
            </div>
            <div class="mb-3">
              <textarea class="form-control" rows="4" placeholder="Your Message" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Send Message</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<!-- End of About Us -->
</section>
<div class="custom-shape-divider-bottom">
  <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
    <path d="M0,0 C600,100 600,0 1200,100 L1200,0 L0,0 Z" fill="#007b9a"></path>
  </svg>
</div>

<!-- Contact Us -->
<section id="contact" class="py-5 bg-dark text-white">
  ...
</section>


  <!-- Reveal Animation -->
  <script>
    const reveals = document.querySelectorAll('[data-reveal]');
    const appearOnScroll = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if(entry.isIntersecting){
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15 });
    reveals.forEach(r => appearOnScroll.observe(r));
  </script>

</body>
</html>



@include('include.Footer')
@endsection
