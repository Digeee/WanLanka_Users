<!-- resources/views/include/header.blade.php -->
<header class="wl-topbar" role="banner">
    <div class="wl-container">
        <!-- LEFT: Brand -->
        <a href="{{ url('/') }}" class="wl-brand" aria-label="WanLanka Home">
            <img src="{{ asset('images/wanlanka_logo.png') }}" alt="WanLanka Logo" class="wl-logo" />
        </a>

        <!-- RIGHT: Action buttons -->
        <div class="wl-actions">
            <button class="wl-btn wl-btn-neutral" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" aria-hidden="true" viewBox="0 0 16 16">
                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/>
                </svg>
                Travel Agent
            </button>

            <a href="{{ url('login') }}" class="wl-btn wl-btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" aria-hidden="true" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4"/>
                </svg>
                Login
            </a>

            <button class="wl-mobile-toggle" type="button" aria-label="Toggle navigation" aria-controls="wl-secondary-nav" aria-expanded="false" data-toggle-secondary>
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" aria-hidden="true" viewBox="0 0 16 16">
                    <path d="M2 12.5h12M2 8h12M2 3.5h12" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round"/>
                </svg>
            </button>
        </div>
    </div>
</header>

<!-- Sticky secondary navbar -->
<header class="wl-sticky" role="navigation" aria-label="Primary">
    <div class="wl-container">
        <nav class="wl-nav" id="wl-secondary-nav" data-secondary-nav>
            <ul class="wl-menu" role="menubar">
                <li role="none" class="{{ request()->is('destinations') ? 'active' : '' }}">
                    <a role="menuitem" href="{{ url('destinations') }}">Destinations</a>
                </li>
                <li role="none" class="{{ request()->is('offers') ? 'active' : '' }}">
                    <a role="menuitem" href="{{ url('offers') }}">Special Offers</a>
                </li>
                <li role="none" class="{{ request()->is('info') ? 'active' : '' }}">
                    <a role="menuitem" href="{{ url('info') }}">Travel Info</a>
                </li>
                <li role="none" class="{{ request()->is('contact') ? 'active' : '' }}">
                    <a role="menuitem" href="{{ url('contact') }}">Contact Us</a>
                </li>
                <li role="none" class="{{ request()->is('about') ? 'active' : '' }}">
                    <a role="menuitem" href="{{ url('about') }}">About Us</a>
                </li>
            </ul>

            <form class="wl-search" role="search" aria-label="Site">
                <svg class="wl-search-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" aria-hidden="true" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                </svg>
                <label class="sr-only" for="wl-search-input">Search destinations</label>
                <input id="wl-search-input" type="text" placeholder="Search destinations..." class="wl-search-input" />
            </form>
        </nav>
    </div>
</header>

<style>
/* ========= Top bar (full-bleed) ========= */
.wl-topbar{
    background: rgba(0,0,0,.65);
    width:100%;
    padding:10px 0;
}
/* Make ONLY the top bar container full-width so logo hits the left edge and buttons the right */
.wl-topbar .wl-container{
    max-width:none;         /* remove 1200px cap */
    width:100%;             /* stretch across viewport */
    padding:0 24px;         /* page gutters */
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:16px;
}

/* ========= Secondary bar (centered) ========= */
.wl-sticky {
    position: sticky;
    top: 0;
    z-index: 50;
    background: rgba(255, 255, 255, 0.2); /* light tint */
    backdrop-filter: blur(10px);          /* frosted glass effect */
    border-bottom: 1px solid rgba(255, 255, 255, 0.2); /* subtle line */
}

.wl-sticky .wl-container{
    max-width:1200px;       /* keep this centered */
    margin:0 auto;
    padding:0 16px;
    display:flex; align-items:center; justify-content:space-between; gap:16px;
}

/* ========= Brand ========= */
.wl-brand{display:flex; align-items:center; gap:12px; text-decoration:none; min-height:72px;}
.wl-logo{height:120px; width:auto; object-fit:contain;}

/* ========= Actions / Buttons ========= */
.wl-actions{display:flex; align-items:center; gap:12px;}
.wl-btn{
    display:inline-flex; align-items:center; gap:8px;
    padding:10px 14px; border-radius:999px; border:1px solid transparent;
    font-weight:700; cursor:pointer; text-decoration:none;
    transition:transform .15s ease, box-shadow .15s ease, filter .15s ease;
    line-height:1; white-space:nowrap;
}
.wl-btn:active{ transform: translateY(1px); }
/* ===== Modern Primary Button ===== */
.wl-btn-primary {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;

    padding: 12px 28px;
    font-size: 15px;
    font-weight: 600;

    border: none;
    border-radius: 999px;

    background: linear-gradient(135deg, #3b82f6, #2563eb); /* smooth blue gradient */
    color: #fff;
    cursor: pointer;

    box-shadow: 0 8px 20px rgba(37, 99, 235, 0.35),
                inset 0 1px 0 rgba(255,255,255,0.25);

    transition: all 0.25s ease;
    overflow: hidden;
}

/* Subtle glossy shine animation */
.wl-btn-primary::before {
    content: "";
    position: absolute;
    top: 0; left: -100%;
    width: 200%; height: 100%;
    background: linear-gradient(120deg,
        rgba(255,255,255,0) 30%,
        rgba(255,255,255,0.3) 50%,
        rgba(255,255,255,0) 70%);
    transition: all 0.4s ease;
}

.wl-btn-primary:hover::before {
    left: 100%;
}

.wl-btn-primary:hover {
    transform: translateY(-2px) scale(1.02);
    background: linear-gradient(135deg, #2563eb, #1e40af);
    box-shadow: 0 10px 24px rgba(37, 99, 235, 0.45);
}

.wl-btn-primary:active {
    transform: scale(0.98);
    box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
}

.wl-btn-primary:hover{ filter:brightness(1.05); }
.wl-btn-neutral{ background:#f8fafc; color:#0f172a; border:1px solid #e2e8f0; box-shadow:0 4px 10px rgba(2,6,23,.06); }
.wl-mobile-toggle{ display:none; background:transparent; border:none; padding:8px; border-radius:10px; }

/* ========= Secondary nav ========= */
.wl-nav{display:flex; align-items:center; justify-content:space-between; gap:16px; padding:10px 0; width:100%;}
.wl-menu{display:flex; gap:8px; list-style:none; margin:0; padding:0;}
.wl-menu a{ padding:10px 14px; border-radius:999px; font-weight:700; text-decoration:none; color:#0f172a; }
.wl-menu li.active a{ background:linear-gradient(135deg,#4f46e5,#06b6d4); color:#fff; }
.wl-search{ display:flex; align-items:center; gap:8px; background:#f8fafc; border:1px solid #e2e8f0; border-radius:999px; padding:8px 12px; }
.wl-search-input{ border:none; outline:none; background:transparent; width:220px; }
.wl-search-icon{ opacity:.7; }
.sr-only{ position:absolute; width:1px; height:1px; padding:0; margin:-1px; overflow:hidden; clip:rect(0,0,0,0); border:0; }

/* ========= Responsive ========= */
@media (max-width: 980px){
    .wl-logo{ height:56px; }
    .wl-search-input{ width:160px; }
}
@media (max-width: 820px){
    .wl-actions{ gap:8px; }
    .wl-mobile-toggle{ display:inline-flex; }
    .wl-nav{ flex-wrap: wrap; }
    .wl-menu{
        display:none; width:100%; flex-direction:column; gap:6px; padding:8px 0 0;
    }
    .wl-menu a{ display:block; padding:10px 14px; }
    .wl-nav.is-open .wl-menu,
    [data-secondary-nav].is-open .wl-menu{ display:flex; }
    .wl-search{ margin-left:auto; }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const toggleBtn = document.querySelector('[data-toggle-secondary]');
    const nav = document.querySelector('[data-secondary-nav]');
    if (toggleBtn && nav) {
        toggleBtn.addEventListener('click', () => {
            const opened = nav.classList.toggle('is-open');
            toggleBtn.setAttribute('aria-expanded', opened ? 'true' : 'false');
        });
    }
});
</script>
