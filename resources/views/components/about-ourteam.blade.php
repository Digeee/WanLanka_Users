@extends('layouts.master')
@include('include.Header')

@section('content')
<style>
    /* ====== Design Tokens ====== */
    :root {
        --primary: #0096FF;
        --secondary: #007BFF;
        --text: #333;
        --bg: #fff;
        --muted: #666;
        --radius: 16px;
        --shadow: 0 8px 24px rgba(0,0,0,0.08);
        --transition: all 0.4s cubic-bezier(0.19,1,0.22,1);
    }

    [data-theme="dark"] {
        --text: #eee;
        --bg: #121212;
        --muted: #aaa;
        --shadow: 0 8px 24px rgba(0,0,0,0.4);
    }

    /* ====== Page Layout ====== */
    .team-section {
        display: flex;
        align-items: center;
        gap: 60px;
        padding: 80px 60px;
        background: var(--bg);
        position: relative;
        overflow: hidden;
    }

    @media (max-width: 992px) {
        .team-section {
            flex-direction: column;
            padding: 60px 30px;
            text-align: center;
        }
    }

    /* Image Container — Curved Left Side */
    .team-image-container {
        flex: 0 0 50%;
        position: relative;
        height: 500px;
        overflow: hidden;
        border-radius: 0 0 0 100px;
        box-shadow: var(--shadow);
        transform: translateX(-20px);
        transition: var(--transition);
    }

    .team-image-container:hover {
        transform: translateX(-10px) scale(1.02);
    }

    .team-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: transform 0.6s ease-out;
    }

    .team-image-container:hover .team-image {
        transform: scale(1.05);
    }

    /* Content Area */
    .team-content {
        flex: 0 0 50%;
        padding: 40px;
        position: relative;
        z-index: 2;
    }

    @media (max-width: 992px) {
        .team-content {
            flex: auto;
            padding: 20px;
        }
    }

    /* Headings & Text */
    .team-title {
        font-family: 'Georgia', 'Times New Roman', serif;
        font-size: 3rem;
        font-weight: 700;
        color: var(--text);
        margin-bottom: 20px;
        line-height: 1.2;
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.8s ease-out forwards;
    }

    .team-text {
        font-size: 1rem;
        line-height: 1.7;
        color: var(--muted);
        margin-bottom: 30px;
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.8s ease-out 0.2s forwards;
    }

    /* Button */
    .btn-meet {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--primary);
        color: white;
        padding: 12px 24px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: var(--transition);
        box-shadow: 0 4px 12px rgba(0,150,255,0.3);
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.8s ease-out 0.4s forwards;
    }

    .btn-meet:hover {
        background: var(--secondary);
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(0,150,255,0.4);
    }

    .btn-meet i {
        font-size: 1.1em;
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

    /* Optional: Add subtle gradient overlay on image */
    .team-image-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, rgba(0,0,0,0) 0%, rgba(0,0,0,0.1) 100%);
        pointer-events: none;
    }

    /* Scroll Animation Trigger */
    .animate-on-scroll {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }

    .animate-on-scroll.visible {
        opacity: 1;
        transform: translateY(0);
    }

    /* =============== NEW: Team Members Section =============== */

    /* Section Header */
    .members-section {
        padding: 80px 60px;
        background: var(--bg);
        position: relative;
        overflow: hidden;
    }

    .section-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .section-subtitle {
        font-size: 1rem;
        color: var(--muted);
        margin-bottom: 10px;
        font-weight: 500;
    }

    .section-title {
        font-family: 'Georgia', 'Times New Roman', serif;
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--text);
        position: relative;
        display: inline-block;
        margin: 0 auto 20px;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: var(--primary);
        border-radius: 2px;
    }

    /* Wave Line */
    .wave-line {
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 2px;
        background: var(--primary);
        z-index: 0;
        transform: translateY(-50%);
        opacity: 0.3;
    }

    .wave-line::before,
    .wave-line::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 10' preserveAspectRatio='none'%3E%3Cpath d='M0,5 Q50,0 100,5 T200,5' fill='none' stroke='%2360a5fa' stroke-width='1'/%3E%3C/svg%3E") repeat-x;
        background-size: 100px 10px;
        opacity: 0.6;
    }

    .wave-line::before {
        top: -20px;
        transform: rotate(10deg);
    }

    .wave-line::after {
        bottom: -20px;
        transform: rotate(-10deg);
    }

    /* Team Cards */
    .team-cards {
        display: flex;
        justify-content: center;
        gap: 30px;
        flex-wrap: wrap;
        max-width: 1200px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }

    .team-card {
        background: #fafafa;
        border-radius: var(--radius);
        padding: 25px 20px;
        width: 200px;
        box-shadow: var(--shadow);
        transition: var(--transition);
        text-align: center;
        cursor: pointer;
        opacity: 0;
        transform: translateY(30px);
    }

    .team-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 14px 36px rgba(0,0,0,0.12);
    }

    .team-card img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        margin: 0 auto 15px;
        border: 3px solid white;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }

    .team-card:hover img {
        transform: scale(1.1);
    }

    .team-card h3 {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--text);
        margin: 0 0 5px;
    }

    .team-card p {
        font-size: 0.9rem;
        color: var(--muted);
        margin: 0;
        font-style: italic;
    }

    /* Staggered Animations */
    .team-card:nth-child(1) { animation: fadeInUp 0.6s ease-out 0.1s forwards; }
    .team-card:nth-child(2) { animation: fadeInUp 0.6s ease-out 0.2s forwards; }
    .team-card:nth-child(3) { animation: fadeInUp 0.6s ease-out 0.3s forwards; }
    .team-card:nth-child(4) { animation: fadeInUp 0.6s ease-out 0.4s forwards; }
    .team-card:nth-child(5) { animation: fadeInUp 0.6s ease-out 0.5s forwards; }

    /* Decorative Dots */
    .dot {
        position: absolute;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: var(--primary);
        opacity: 0.5;
    }

    .dot-1 { top: 30%; left: 10%; }
    .dot-2 { bottom: 20%; right: 15%; }
    .dot-3 { top: 70%; right: 10%; }

    /* CTA Button */
    .cta-button {
        display: block;
        margin: 50px auto 0;
        padding: 12px 24px;
        background: var(--primary);
        color: white;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: var(--transition);
        box-shadow: 0 4px 12px rgba(0,150,255,0.3);
        width: fit-content;
    }

    .cta-button:hover {
        background: var(--secondary);
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(0,150,255,0.4);
    }

    @media (max-width: 768px) {
        .members-section {
            padding: 60px 20px;
        }
        .team-card {
            width: 160px;
        }
    }
</style>

<!-- ====== Existing Intro Section ====== -->
<div class="team-section">
    <!-- Team Image -->
    <div class="team-image-container">
       <img src="{{ asset('images/teams.jpeg') }}" alt="Our Team" class="team-image">
    </div>

    <!-- Team Content -->
    <div class="team-content">
        <h2 class="team-title">Our Team</h2>
        <p class="team-text">
            At WanLanka, our shared passion is the beauty and mystery of Sri Lanka. Our team, based in our office on the island, has firsthand knowledge of its wonders. We’re more than just a digital presence; we’re real individuals offering profound insights into Sri Lanka’s allure. Instead of wrestling with travel intricacies yourself, trust our experts to craft a tailor-made Sri Lankan experience for you.
        </p>
        <p class="team-text">
            Get to know the voices behind your journey, from our travel specialists with their favorite local recommendations to our committed board of directors and managers. Whether you’re reconnecting with us or seeking specific guidance, Blue Lanka Tours stands as the premier tour operator, ensuring your Sri Lankan adventure is unparalleled.
        </p>
    </div>
</div>

<!-- ====== NEW: Meet the Team Section ====== -->
<div class="members-section">
    <div class="section-header">
        <p class="section-subtitle">Meet the People Behind the WanLanka</p>
        <h2 class="section-title">Our Super Squad of Creatives</h2>
    </div>

    <div class="wave-line"></div>

    <div class="team-cards">
        <!-- Team Member 1 -->
        <div class="team-card">
            <img src="{{ asset('images/team/nimal.jpg') }}" alt="Nimal Perera">
            <h3>J.Digevan</h3>
            <p>Lead Guide</p>
        </div>

        <!-- Team Member 2 -->
        <div class="team-card">
            <img src="{{ asset('images/team/kamal.jpg') }}" alt="Kamal Silva">
            <h3>L.S.Dorathy</h3>
            <p>Travel Designer</p>
        </div>

        <!-- Team Member 3 -->
        <div class="team-card">
            <img src="{{ asset('images/team/suneth.jpg') }}" alt="Suneth Fernando">
            <h3>S.Lajithan</h3>
            <p>Operations Manager</p>
        </div>

        <!-- Team Member 4 -->
        <div class="team-card">
            <img src="{{ asset('images/team/ruwan.jpg') }}" alt="Ruwan Jayawardena">
            <h3>A.Abishanan</h3>
            <p>Driver & Logistics</p>
        </div>

        <!-- Team Member 5 -->
        <div class="team-card">
            <img src="{{ asset('images/team/ishara.jpg') }}" alt="Ishara Mendis">
            <h3>A.Archaga</h3>
            <p>Customer Care</p>
        </div>
    </div>

    <!-- Decorative Dots -->
    <div class="dot dot-1"></div>
    <div class="dot dot-2"></div>
    <div class="dot dot-3"></div>

    <!-- CTA Button -->

</div>

<script>
    // Scroll Animation for elements (original section)
    document.addEventListener('DOMContentLoaded', function() {
        const animateElements = document.querySelectorAll('.animate-on-scroll');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, { threshold: 0.1 });

        animateElements.forEach(el => observer.observe(el));
    });
</script>

<!-- Font Awesome for arrow icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

@endsection
