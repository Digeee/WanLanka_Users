




<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap');

:root {
    --primary: #0a4da2;
    --gold: #d4af37;
    --dark: #1a2b47;
    --text: #333;
    --text-light: #6c757d;
    --bg: #fafafa;
    --radius: 12px;
    --transition: 0.35s ease;
}

body {
    font-family: 'Inter', sans-serif;
    background: var(--bg);
    color: var(--text);
    margin: 0;
    padding: 0;
}

h1, h2, h3, h4, h5, h6 {
    font-family: 'Playfair Display', serif;
    font-weight: 600;
    color: var(--dark);
    margin-bottom: 1rem;
}

.container {
    max-width: 1140px;
    margin: 0 auto;
    padding: 0 15px;
}

.container-fluid.px-0 {
    padding-left: 0 !important;
    padding-right: 0 !important;
}

/* ---------- HERO ---------- */
.hero-gallery {
    position: relative;
    height: 60vh;
    min-height: 420px;
    border-radius: var(--radius);
    overflow: hidden;
    box-shadow: 0 8px 30px rgba(0, 0, 0, .12);
    max-width: 1140px;
    margin: 2rem auto 3rem;
}

.hero-main {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: var(--radius);
    display: block;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, rgba(26, 43, 71, .3), rgba(26, 43, 71, .6));
    border-radius: var(--radius);
    pointer-events: none;
}

.hero-thumbs {
    position: absolute;
    bottom: 15px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 10px;
    z-index: 10;
}

.hero-thumbs img {
    width: 80px;
    height: 54px;
    object-fit: cover;
    border: 3px solid transparent;
    border-radius: 6px;
    cursor: pointer;
    transition: var(--transition);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.hero-thumbs img.active,
.hero-thumbs img:hover {
    border-color: var(--gold);
    transform: scale(1.05);
}

/* ---------- STICKY BAR ---------- */
.sticky-bar {
    position: sticky;
    top: 0;
    z-index: 1050;
    background: #fff;
    box-shadow: 0 2px 12px rgba(0, 0, 0, .1);
    padding: 18px 0;
    border-bottom: 1px solid #eee;
}

.sticky-inner {
    max-width: 1140px;
    margin: 0 auto;
    padding: 0 15px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    flex-wrap: wrap;
}

.sticky-inner > div:first-child {
    flex: 1 1 auto;
    min-width: 250px;
}

.sticky-inner h4 {
    margin: 0 0 6px 0;
    font-weight: 700;
    font-size: 1.5rem;
    color: var(--primary);
}

.stars svg {
    width: 20px;
    height: 20px;
    fill: #ffc107;
    vertical-align: middle;
}

.stars svg:not(:last-child) {
    margin-right: 3px;
}
WanLanka Logo
Home
About
Destinations
Offers
Packages
Contact

Search...
Travel Agent
Sign in

.sticky-inner .text-muted {
    font-size: 0.9rem;
    color: var(--text-light);
    margin-left: 8px;
}

.price-tag {
    font-size: 2.25rem;
    font-weight: 700;
    color: var(--primary);
    white-space: nowrap;
}

.btn-ritz {
    background: var(--gold);
    color: #fff;
    padding: 12px 36px;
    border: none;
    border-radius: var(--radius);
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    transition: var(--transition);
    white-space: nowrap;
    box-shadow: 0 4px 10px rgba(212, 175, 55, 0.4);
    text-decoration: none;
    display: inline-block;
}

.btn-ritz:hover,
.btn-ritz:focus {
    background: #b8972e;
    transform: translateY(-2px);
    box-shadow: 0 6px 14px rgba(184, 151, 46, 0.6);
    outline: none;
}

/* ---------- SECTIONS ---------- */
.section-block {
    background: #fff;
    border-radius: var(--radius);
    padding: 40px 40px 35px;
    margin-bottom: 40px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, .06);
    max-width: 1140px;
    margin-left: auto;
    margin-right: auto;
}

.section-title {
    font-size: 2rem;
    margin-bottom: 25px;
    position: relative;
    font-weight: 700;
    color: var(--dark);
}

.section-title:after {
    content: '';
    width: 70px;
    height: 4px;
    background: var(--gold);
    position: absolute;
    left: 0;
    bottom: -12px;
    border-radius: 3px;
}

.itinerary-day {
    display: flex;
    gap: 25px;
    margin-bottom: 30px;
    flex-wrap: wrap;
}

.day-number {
    flex: 0 0 60px;
    height: 60px;
    border-radius: 50%;
    background: var(--primary);
    color: #fff;
    display: grid;
    place-items: center;
    font-weight: 700;
    font-size: 1.25rem;
    user-select: none;
}

.day-content {
    flex: 1 1 auto;
    min-width: 250px;
}

.day-content h5 {
    margin-top: 0;
    font-weight: 600;
    font-size: 1.25rem;
    color: var(--primary);
}

.day-content p {
    font-size: 1rem;
    line-height: 1.6;
    color: var(--text-light);
}

.acc-list {
    display: flex;
    flex-wrap: wrap;
    gap: 14px;
}

.acc-tag {
    background: var(--bg);
    padding: 8px 18px;
    border-radius: 30px;
    font-size: 0.9rem;
    font-weight: 500;
    color: var(--primary);
    box-shadow: 0 2px 6px rgba(10, 77, 162, 0.15);
}

/* ---------- REVIEWS ---------- */
.review-card {
    border-left: 5px solid var(--gold);
    padding: 25px 25px 25px 35px;
    margin-bottom: 25px;
    background: #fff;
    box-shadow: 0 3px 12px rgba(0, 0, 0, 0.05);
    border-radius: var(--radius);
}

.review-card p {
    font-style: italic;
    font-size: 1rem;
    color: var(--text);
    margin-bottom: 10px;
}

.review-card small {
    color: var(--text-light);
    font-size: 0.9rem;
}

.stars svg {
    width: 20px;
    height: 20px;
    fill: #ffc107;
    margin-right: 4px;
}

/* ---------- GALLERY GRID ---------- */
.gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
    gap: 14px;
    margin-top: 15px;
}

.gallery-grid img {
    border-radius: var(--radius);
    cursor: pointer;
    transition: var(--transition);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
    height: 100px;
    object-fit: cover;
}

.gallery-grid img:hover {
    transform: scale(1.07);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
}

/* ---------- MODAL ---------- */
.modal-img {
    width: 100%;
    max-width: 900px;
    margin: auto;
    display: block;
    border-radius: var(--radius);
}

.close-modal {
    position: absolute;
    top: 20px;
    right: 30px;
    color: #fff;
    font-size: 3rem;
    cursor: pointer;
    z-index: 1050;
    background: rgba(0, 0, 0, 0.4);
    border-radius: 50%;
    width: 48px;
    height: 48px;
    line-height: 48px;
    text-align: center;
    transition: background 0.3s ease;
}

.close-modal:hover {
    background: rgba(0, 0, 0, 0.7);
}

/* ---------- ANIMATIONS ---------- */
.fade-up {
    opacity: 0;
    transform: translateY(25px);
    transition: var(--transition);
}

.fade-up.in {
    opacity: 1;
    transform: translateY(0);
}

/* ---------- RESPONSIVE ---------- */
@media (max-width: 992px) {
    .hero-gallery {
        height: 50vh;
        min-height: 320px;
        margin: 1.5rem auto 2.5rem;
    }

    .sticky-inner {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
    }

    .sticky-inner > div:first-child {
        min-width: 100%;
    }

    .price-tag {
        font-size: 1.75rem;
    }

    .btn-ritz {
        width: 100%;
        text-align: center;
        padding: 12px 0;
    }

    .section-block {
        padding: 30px 25px 25px;
        margin-bottom: 30px;
    }

    .gallery-grid img {
        height: 90px;
    }
}

@media (max-width: 576px) {
    .hero-thumbs img {
        width: 60px;
        height: 40px;
    }

    .day-number {
        flex: 0 0 50px;
        height: 50px;
        font-size: 1rem;
    }

    .day-content h5 {
        font-size: 1.1rem;
    }
}

</style>


{{-- ---------------  HTML  --------------- --}}
<div class="container-fluid px-0">
    <!-- HERO GALLERY -->
    <div class="hero-gallery">
        <img id="heroMain" src="{{ $package['cover_image'] ?? asset('images/placeholder.jpg') }}" alt="Cover" class="hero-main">
        <div class="hero-overlay"></div>
        <div class="hero-thumbs">
            @php $allImages = array_merge([$package['cover_image'] ?? ''], $package['gallery'] ?? []); @endphp
            @foreach(array_filter($allImages) as $k => $img)
                <img onclick="changeHero('{{ $img }}',this)" class="{{ $k==0 ? 'active' : '' }}" src="{{ $img }}" alt="thumb">
            @endforeach
        </div>
    </div>
</div>

<div class="sticky-bar">
    <div class="container">
        <div class="sticky-inner">
            <div>
                <h4 style="margin:0">{{ $package['package_name'] }}</h4>
                <div class="stars">
                    @for ($i=0;$i<5;$i++)
                        <svg fill="{{ $i < ($package['rating'] ?? 0) ? '#ffc107' : '#e4e5e9' }}"><use href="#star"/></svg>
                    @endfor
                    <span class="ms-2 text-muted">({{ $package['reviews'] ?? 0 }} reviews)</span>
                </div>
            </div>
            <div class="d-flex align-items-center gap-3">
                <div class="price-tag">${{ number_format( (float) str_replace(',','',$package['price'] ?? 0) ) }}</div>
                <a href="/book/{{ $package['id'] }}" class="btn-ritz">Book Now</a>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <!-- OVERVIEW -->
    <section class="section-block fade-up">
        <h2 class="section-title">Overview</h2>
        <p class="mb-3">{{ $package['description'] ?? 'No description available.' }}</p>
        <div class="row g-3 mt-2">
            <div class="col-md-3 col-6"><strong>Duration:</strong> {{ $package['days'] ?? 'N/A' }} days</div>
            <div class="col-md-3 col-6"><strong>Package Type:</strong> {{ $package['package_type'] ?? 'N/A' }}</div>
            <div class="col-md-3 col-6"><strong>Vehicle:</strong> {{ $package['vehicle']['vehicle_type'] ?? 'N/A' }}</div>
            <div class="col-md-3 col-6"><strong>Status:</strong> {{ $package['status'] ?? 'N/A' }}</div>
        </div>
    </section>

    <!-- ITINERARY -->
    <section class="section-block fade-up">
        <h2 class="section-title">Itinerary</h2>
        @forelse ($package['day_plans'] as $plan)
            <div class="itinerary-day">
                <div class="day-number">{{ $plan['day_number'] }}</div>
                <div class="day-content">
                    <h5>{{ $plan['plan'] ?? 'Day '.$plan['day_number'] }}</h5>
                    <p>{{ $plan['description'] ?? '' }}</p>
                    @if (!empty($plan['photos']))
                        <div class="gallery-grid mt-2">
                            @foreach ($plan['photos'] as $p)
                                <img onclick="openModal('{{ $p }}')" src="{{ $p }}" alt="day">
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        @empty
            <p>No day plans available.</p>
        @endforelse
    </section>

    <!-- ACCOMMODATIONS -->
    <section class="section-block fade-up">
        <h2 class="section-title">Accommodations</h2>
        <div class="acc-list">
            @forelse ($package['accommodations'] as $acc)
                <span class="acc-tag">{{ $acc['name'] }}</span>
            @empty
                <span class="text-muted">Not specified</span>
            @endforelse
        </div>
    </section>

    <!-- INCLUSIONS -->
    <section class="section-block fade-up">
        <h2 class="section-title">Inclusions</h2>
        <p>{{ $package['inclusions'] ?? 'No inclusions listed.' }}</p>
    </section>

    <!-- REVIEWS -->
    <section class="section-block fade-up">
        <h2 class="section-title">Guest Reviews</h2>
        @forelse (range(1,3) as $dummy) {{-- replace with real reviews when available --}}
            <div class="review-card">
                <div class="stars mb-2">
                    @for($i=0;$i<5;$i++)<svg><use href="#star"/></svg>@endfor
                </div>
                <p>“Amazing experience, well organised and great value for money.”</p>
                <small class="text-muted">— Guest {{ $dummy }}</small>
            </div>
        @empty
            <p class="text-muted">No reviews yet.</p>
        @endforelse
    </section>
</div>

{{-- SVG sprite --}}
<svg style="display:none"><symbol id="star" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></symbol></svg>

{{-- Modal --}}
<div id="imgModal" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <button class="close-modal" onclick="closeModal()">&times;</button>
        <img id="modalImg" class="modal-img" src="" alt=" enlarged">
    </div>
</div>

{{-- ---------------  JS  --------------- --}}
<script>
    // hero thumbs
    function changeHero(src,el){
        document.getElementById('heroMain').src = src;
        document.querySelectorAll('.hero-thumbs img').forEach(i=>i.classList.remove('active'));
        el.classList.add('active');
    }
    // modal
    function openModal(src){
        document.getElementById('modalImg').src = src;
        document.getElementById('imgModal').classList.add('show');
        document.getElementById('imgModal').style.display = 'block';
    }
    function closeModal(){
        document.getElementById('imgModal').classList.remove('show');
        document.getElementById('imgModal').style.display = 'none';
    }
    // fade-up animations
    const io = new IntersectionObserver((entries)=>{
        entries.forEach(e=>{
            if(e.isIntersecting) e.target.classList.add('in');
        });
    },{threshold:.2});
    document.querySelectorAll('.fade-up').forEach(el=>io.observe(el));
</script>

@include('include.footer')

