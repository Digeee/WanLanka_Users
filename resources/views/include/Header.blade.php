<!-- resources/views/include/header.blade.php -->

<header class="wl-topbar wl-sticky wl-compact" role="banner">
  <div class="wl-container wl-container-fluid">
    <!-- LEFT: Brand -->
    <a href="{{ url('/') }}" class="wl-brand" aria-label="WanLanka Home">
      <img src="{{ asset('images/wanlanka_logo1.png') }}" alt="WanLanka Logo" class="wl-logo"/>
    </a>

    <!-- CENTER: Primary menu -->
    <nav class="wl-menu-primary" aria-label="Main">
      <ul class="wl-menu">
        <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}">Home</a></li>
        <li class="{{ request()->is('about') ? 'active' : '' }}"><a href="{{ url('/about') }}">About</a></li>
        <li class="{{ request()->is('provinces') ? 'active' : '' }}"><a href="{{ route('provinces') }}">Destinations</a></li>


        <!-- Packages Dropdown -->
        <li class="wl-dropdown-wrapper {{ request()->is('packages*') || request()->is('custom-packages*') ? 'active' : '' }}" data-packages-menu>
          <a href="#" class="wl-dropdown-toggle" data-packages-toggle aria-expanded="false">
            Packages
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 16 16" class="wl-dropdown-arrow">
              <path d="M4.646 5.646a.5.5 0 0 1 .708 0L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 0-.708z"/>
            </svg>
          </a>
          <ul class="wl-dropdown-menu" data-packages-menu-list>
            <li><a href="{{ route('packages.fix') }}" class="wl-dropdown-item">Fixed Packages</a></li>
            <li><a href="{{ route('custom-packages.my') }}" class="wl-dropdown-item">Create Package</a></li>


          </ul>
        </li>

        <li class="{{ request()->is('contact') ? 'active' : '' }}"><a href="{{ url('contact') }}">Contact</a></li>
      </ul>
    </nav>

    <!-- RIGHT: Search + Actions -->
    <div class="wl-actions">
      {{-- SEARCH (input + button bind to hidden form via form="wl-search-form") --}}
      <div class="wl-search" role="search" aria-label="Site search">
        <button
          class="wl-search-btn"
          id="siteSearchBtn"
          type="submit"
          form="wl-search-form"
          formmethod="get"
          formaction="{{ \Illuminate\Support\Facades\Route::has('search') ? route('search') : url('/search') }}"
          aria-label="Search">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" aria-hidden="true">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.867-3.834zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
          </svg>
        </button>
        <input
          id="siteSearchInput"
          class="wl-search-input"
          type="search"
          name="q"
          placeholder="Search..."
          autocomplete="off"
          required
          form="wl-search-form"
          aria-label="Search query">

        <!-- Search suggestions dropdown -->
        <div id="searchSuggestions" class="wl-search-suggestions" style="display: none;"></div>
      </div>

      <a href="{{ route('guider.login') }}" class="wl-btn wl-btn-neutral" aria-label="Guider Login">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" aria-hidden="true" viewBox="0 0 16 16">
          <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/>
        </svg>
        Travel Agent
      </a>

      {{-- GUEST: show Sign in --}}
      @guest
        <a href="{{ route('login') }}" class="wl-btn wl-btn-primary" aria-label="Sign in">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" aria-hidden="true" viewBox="0 0 16 16">
            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4"/>
          </svg>
          Sign in
        </a>
      @endguest

      {{-- AUTH: show avatar dropdown with Account + Logout --}}
      @auth
        @php
          $photo = Auth::user()->profile_photo
            ? asset('storage/'.Auth::user()->profile_photo)
            : asset('images/avatar-default.png'); // fallback
        @endphp

        <div class="wl-user dropdown" data-user-menu>
          <button class="wl-avatar-btn" type="button" aria-label="Account" aria-expanded="false" data-user-toggle>
            <img src="{{ $photo }}" alt="Profile" class="wl-avatar">
          </button>

          <ul class="wl-dropdown" role="menu" aria-label="User menu" data-user-menu-list>
            <li class="wl-dropdown-header">
              <img src="{{ $photo }}" class="wl-avatar-sm" alt="Profile small">
              <div class="wl-user-meta">
                <div class="wl-user-name">{{ \Illuminate\Support\Str::limit(Auth::user()->name, 28) }}</div>
                <div class="wl-user-email">{{ \Illuminate\Support\Str::limit(Auth::user()->email, 36) }}</div>
              </div>
            </li>
            <li><hr class="wl-hr"></li>
            <li>
              <a class="wl-dropdown-item" href="{{ \Illuminate\Support\Facades\Route::has('account') ? route('account') : url('/account') }}">
                Account
              </a>
            </li>
            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="wl-dropdown-item wl-danger">Logout</button>
              </form>
            </li>
          </ul>
        </div>
      @endauth

      <button class="wl-mobile-toggle" type="button" aria-label="Toggle menu" data-toggle-primary>
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" aria-hidden="true" viewBox="0 0 16 16">
          <path d="M2 12.5h12M2 8h12M2 3.5h12" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round"/>
        </svg>
      </button>
    </div>
  </div>
</header>

{{-- Hidden global search form (not nested) --}}
<form id="wl-search-form"
      action="{{ \Illuminate\Support\Facades\Route::has('search') ? route('search') : url('/search') }}"
      method="get"
      style="position:absolute;left:-9999px;top:-9999px;width:1px;height:1px;overflow:hidden;">
</form>

<style>
:root{
  --text:#0f172a; --border:#e2e8f0;
  --accent:#635BFF; --accent-2:#7C6CFF;
  --soft:0 10px 26px rgba(2,6,23,.07);
  --glow:0 18px 36px rgba(99,91,255,.22);
  --muted:#64748b;
}

/* Topbar */
.wl-topbar{background:rgba(255,255,255,.82);backdrop-filter:saturate(1.05) blur(8px);border-bottom:1px solid rgba(0,0,0,.06)}
.wl-sticky{position:sticky; top:0; z-index:80}

/* Layout */
.wl-container{max-width:1200px;margin:0 auto;padding:0 18px;display:flex;align-items:center;gap:12px}
.wl-container-fluid{max-width:none;width:100%;justify-content:space-between}

/* Compact */
.wl-compact .wl-container-fluid{padding:10px 22px}
.wl-compact .wl-brand{min-height:54px}
.wl-compact .wl-logo{height:90px;width:auto;object-fit:contain}
.wl-compact .wl-menu{gap:16px}
.wl-compact .wl-menu a{padding:8px 16px;font-size:14px;font-weight:600;letter-spacing:.2px}
.wl-compact .wl-btn{padding:9px 16px;font-size:14px;border-radius:999px}

/* Menu */
.wl-menu-primary{display:flex;justify-content:center;flex:1}
.wl-menu{display:flex;list-style:none;margin:0;padding:0}
.wl-menu a{display:inline-flex;align-items:center;justify-content:center;color:var(--text);text-decoration:none;border-radius:999px;position:relative;transition:filter .2s ease}
.wl-menu a:hover{filter:brightness(1.05)}
.wl-menu li.active a{color:#fff;background:linear-gradient(135deg,var(--accent),var(--accent-2));box-shadow:var(--glow)}
.wl-menu li.active a::after{content:"";position:absolute;left:50%;top:100%;transform:translateX(-50%);width:62%;height:18px;border-radius:40px;filter:blur(14px);background:rgba(99,91,255,.35);pointer-events:none}

/* Dropdown Menu Styles */
.wl-dropdown-wrapper{position:relative}
.wl-dropdown-toggle{display:inline-flex;align-items:center;gap:6px}
.wl-dropdown-arrow{transition:transform .2s ease}
.wl-dropdown-wrapper.is-open .wl-dropdown-arrow{transform:rotate(180deg)}

.wl-dropdown-menu{
  position:absolute;top:100%;left:50%;transform:translateX(-50%);
  background:#fff;border:1px solid var(--border);border-radius:12px;
  min-width:180px;box-shadow:0 12px 28px rgba(2,6,23,.12);
  padding:8px;list-style:none;margin:0;display:none;z-index:1000;
  margin-top:8px;
}
.wl-dropdown-wrapper.is-open .wl-dropdown-menu{display:block}

.wl-dropdown-item{
  display:block;width:100%;text-align:left;border:0;background:transparent;
  padding:10px 12px;border-radius:8px;color:var(--text);text-decoration:none;
  font-size:14px;transition:background .15s ease;
}
.wl-dropdown-item:hover{background:#f8fafc}

.wl-dropdown-divider{border:none;height:1px;background:var(--border);margin:6px 0}

/* Actions */
.wl-actions{display:flex;align-items:center;gap:10px}
.wl-btn{display:inline-flex;align-items:center;gap:8px;border:1px solid transparent;line-height:1;text-decoration:none;cursor:pointer;transition:transform .18s ease, box-shadow .22s ease, filter .18s ease;box-shadow:var(--soft)}
.wl-btn:active{transform:translateY(1px)}
.wl-btn-primary{position:relative;color:#fff;border:none;background:linear-gradient(135deg,var(--accent),var(--accent-2));overflow:hidden}
.wl-btn-primary::before{content:"";position:absolute;inset:-1px;background:linear-gradient(120deg,transparent 35%,rgba(255,255,255,.35) 50%,transparent 65%);transform:translateX(-70%);transition:transform .6s ease}
.wl-btn-primary:hover::before{transform:translateX(70%)}
.wl-btn-primary:hover{box-shadow:0 12px 28px rgba(99,91,255,.28);transform:translateY(-1px)}
.wl-btn-neutral{background:#f8fafc;color:var(--text);border:1px solid var(--border)}
.wl-btn-neutral:hover{filter:brightness(1.02);transform:translateY(-1px)}

/* Search pill */
.wl-search{
  display:flex;align-items:center;gap:8px;
  background:#f8fafc;border:1px solid var(--border);
  border-radius:999px;padding:6px 12px;box-shadow:var(--soft);
  min-width:220px;position:relative;
}
.wl-search-btn{
  border:0; background:transparent; -webkit-appearance:none; appearance:none;
  display:inline-grid; place-items:center; width:34px; height:34px;
  border-radius:999px; cursor:pointer; opacity:.85; padding:0; margin:0; line-height:1;
}
.wl-search-btn:hover{opacity:1; transform:translateY(-1px)}
.wl-search-btn:focus-visible{outline:2px solid rgba(99,91,255,.55); outline-offset:2px; border-radius:999px}
.wl-search-btn svg{width:18px; height:18px; fill:currentColor}
.wl-search-input{
  border:none; background:transparent; outline:none; width:100%;
  font-size:14px; color:var(--text); -webkit-appearance:none; appearance:none;
}
.wl-search-input::placeholder{color:var(--muted)}
.wl-search:focus-within{border-color:#d0d7e2}

/* Search Suggestions */
.wl-search-suggestions {
  position: absolute;
  top: 100%;
  left: 0;
  right: 0;
  background: white;
  border: 1px solid var(--border);
  border-radius: 0 0 12px 12px;
  box-shadow: 0 12px 28px rgba(2,6,23,.12);
  z-index: 1000;
  max-height: 300px;
  overflow-y: auto;
  margin-top: -1px;
}

.wl-search-suggestion-item {
  padding: 12px 16px;
  border-bottom: 1px solid var(--border);
  cursor: pointer;
  transition: background 0.15s ease;
}

.wl-search-suggestion-item:last-child {
  border-bottom: none;
}

.wl-search-suggestion-item:hover,
.wl-search-suggestion-item.highlighted {
  background: #f8fafc;
}

.wl-search-suggestion-title {
  font-weight: 600;
  font-size: 14px;
  color: var(--text);
  margin-bottom: 4px;
}

.wl-search-suggestion-type {
  font-size: 12px;
  color: var(--muted);
  text-transform: uppercase;
}

/* User avatar + dropdown */
.wl-avatar-btn{border:0;background:transparent;padding:0;margin:0;cursor:pointer}
.wl-avatar{width:40px;height:40px;border-radius:50%;object-fit:cover;border:2px solid #e6f0fa;box-shadow:var(--soft)}
.wl-avatar-sm{width:36px;height:36px;border-radius:50%;object-fit:cover;border:1px solid #e6f0fa}

.wl-user{position:relative}
.wl-dropdown{
  position:absolute; right:0; top:calc(100% + 10px);
  background:#fff; border:1px solid var(--border); border-radius:14px;
  min-width:230px; box-shadow:0 12px 28px rgba(2,6,23,.12);
  padding:8px; list-style:none; margin:0; display:none; z-index:1000;
}
.wl-user.is-open .wl-dropdown{display:block}
.wl-dropdown-header{display:flex;align-items:center;gap:10px;padding:8px}
.wl-user-meta .wl-user-name{font-weight:600;font-size:.95rem;color:var(--text)}
.wl-user-meta .wl-user-email{font-size:.8rem;color:var(--muted)}
.wl-hr{border:none;height:1px;background:var(--border);margin:6px 0}
.wl-dropdown-item{
  display:block; width:100%; text-align:left; border:0; background:transparent;
  padding:10px 10px; border-radius:10px; color:var(--text); text-decoration:none;
}
.wl-dropdown-item:hover{background:#f8fafc}
.wl-danger{color:#e11d48}
.wl-danger:hover{background:#fff1f2}

/* Mobile */
.wl-mobile-toggle{display:none;background:transparent;border:1px solid var(--border);padding:6px;border-radius:10px}
@media (max-width:1100px){
  .wl-compact .wl-menu a{padding:8px 14px}
}
@media (max-width:980px){
  .wl-menu-primary{display:none;position:absolute;left:0;right:0;top:60px;z-index:79}
  .wl-menu{flex-direction:column;background:rgba(255,255,255,.96);backdrop-filter:blur(8px);border-top:1px solid rgba(0,0,0,.06);padding:10px}
  .wl-mobile-toggle{display:inline-flex}
  .wl-search{min-width:160px}
  .wl-dropdown-menu{position:static;transform:none;margin-top:0;box-shadow:none;border:1px solid var(--border)}
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
  // Mobile menu toggle
  const toggle = document.querySelector('[data-toggle-primary]');
  const nav    = document.querySelector('.wl-menu-primary');
  if (toggle && nav) {
    toggle.addEventListener('click', (e) => {
      e.preventDefault(); e.stopPropagation();
      const nowOpen = getComputedStyle(nav).display === 'none';
      nav.style.display = nowOpen ? 'flex' : 'none';
    });
  }

  // Packages dropdown toggle
  const packagesWrap = document.querySelector('[data-packages-menu]');
  const packagesBtn = document.querySelector('[data-packages-toggle]');
  const packagesMenuList = document.querySelector('[data-packages-menu-list]');

  if (packagesWrap && packagesBtn && packagesMenuList) {
    const closePackagesMenu = () => {
      packagesWrap.classList.remove('is-open');
      packagesBtn.setAttribute('aria-expanded', 'false');
    };
    const openPackagesMenu = () => {
      packagesWrap.classList.add('is-open');
      packagesBtn.setAttribute('aria-expanded', 'true');
    };

    packagesBtn.addEventListener('click', (e) => {
      e.preventDefault();
      e.stopPropagation();
      packagesWrap.classList.contains('is-open') ? closePackagesMenu() : openPackagesMenu();
    });

    document.addEventListener('click', (e) => {
      if (!packagesWrap.contains(e.target)) closePackagesMenu();
    });

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') closePackagesMenu();
    });
  }

  // Safety: explicitly submit the hidden search form on click/Enter
  const form  = document.getElementById('wl-search-form');
  const input = document.getElementById('siteSearchInput');
  const btn   = document.getElementById('siteSearchBtn');
  if (form && input && btn) {
    btn.addEventListener('click', () => {
      if (input.value.trim() === '') return;
      try { form.requestSubmit ? form.requestSubmit() : form.submit(); } catch(_) { form.submit(); }
    });
    input.addEventListener('keydown', (e) => {
      if (e.key === 'Enter') {
        if (input.value.trim() === '') { e.preventDefault(); return; }
        try { form.requestSubmit ? form.requestSubmit() : form.submit(); } catch(_) { form.submit(); }
      }
    });
  }

  // Avatar dropdown toggle
  const userWrap  = document.querySelector('[data-user-menu]');
  const userBtn   = document.querySelector('[data-user-toggle]');
  const menuList  = document.querySelector('[data-user-menu-list]');

  if (userWrap && userBtn && menuList) {
    const closeMenu = () => {
      userWrap.classList.remove('is-open');
      userBtn.setAttribute('aria-expanded', 'false');
    };
    const openMenu = () => {
      userWrap.classList.add('is-open');
      userBtn.setAttribute('aria-expanded', 'true');
    };
    userBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      userWrap.classList.contains('is-open') ? closeMenu() : openMenu();
    });
    document.addEventListener('click', (e) => {
      if (!userWrap.contains(e.target)) closeMenu();
    });
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') closeMenu();
    });
  }

  // Search suggestions functionality
  const searchInput = document.getElementById('siteSearchInput');
  const searchSuggestions = document.getElementById('searchSuggestions');
  let searchTimeout;
  let currentHighlightedIndex = -1;

  if (searchInput && searchSuggestions) {
    // Hide suggestions when clicking outside
    document.addEventListener('click', (e) => {
      if (!searchInput.contains(e.target) && !searchSuggestions.contains(e.target)) {
        hideSuggestions();
      }
    });

    // Handle keyboard navigation
    searchInput.addEventListener('keydown', (e) => {
      const suggestionItems = searchSuggestions.querySelectorAll('.wl-search-suggestion-item');

      switch(e.key) {
        case 'ArrowDown':
          e.preventDefault();
          currentHighlightedIndex = Math.min(currentHighlightedIndex + 1, suggestionItems.length - 1);
          updateHighlight(suggestionItems);
          break;
        case 'ArrowUp':
          e.preventDefault();
          currentHighlightedIndex = Math.max(currentHighlightedIndex - 1, -1);
          updateHighlight(suggestionItems);
          break;
        case 'Enter':
          if (currentHighlightedIndex >= 0 && suggestionItems[currentHighlightedIndex]) {
            e.preventDefault();
            suggestionItems[currentHighlightedIndex].click();
          }
          break;
        case 'Escape':
          hideSuggestions();
          break;
      }
    });

    // Fetch suggestions as user types
    searchInput.addEventListener('input', () => {
      clearTimeout(searchTimeout);
      currentHighlightedIndex = -1;

      const query = searchInput.value.trim();

      if (query.length === 0) {
        hideSuggestions();
        return;
      }

      // Debounce the search requests
      searchTimeout = setTimeout(() => {
        fetchSearchSuggestions(query);
      }, 300);
    });
  }

  function fetchSearchSuggestions(query) {
    // Call the API endpoint for search suggestions
    fetch(`/api/search/suggestions?q=${encodeURIComponent(query)}`)
      .then(response => response.json())
      .then(data => {
        displaySuggestions(data.suggestions);
      })
      .catch(error => {
        console.error('Error fetching search suggestions:', error);
        // Fallback to sample data if API fails
        const sampleSuggestions = [
          { title: 'Colombo', type: 'Destination', url: '#' },
          { title: 'Kandy', type: 'Destination', url: '#' },
          { title: 'Galle Fort', type: 'Place', url: '#' },
          { title: 'Sigiriya Rock', type: 'Place', url: '#' },
          { title: 'Beach Holiday Package', type: 'Package', url: '#' },
          { title: 'Cultural Tour', type: 'Package', url: '#' }
        ].filter(item => item.title.toLowerCase().includes(query.toLowerCase()));

        displaySuggestions(sampleSuggestions);
      });
  }

  function displaySuggestions(suggestions) {
    if (suggestions.length === 0) {
      hideSuggestions();
      return;
    }

    searchSuggestions.innerHTML = '';

    suggestions.forEach((suggestion, index) => {
      const item = document.createElement('div');
      item.className = 'wl-search-suggestion-item';
      item.innerHTML = `
        <div class="wl-search-suggestion-title">${suggestion.title}</div>
        <div class="wl-search-suggestion-type">${suggestion.type}</div>
      `;

      item.addEventListener('click', () => {
        searchInput.value = suggestion.title;
        hideSuggestions();
        // Redirect to the suggestion URL
        if (suggestion.url && suggestion.url !== '#') {
          window.location.href = suggestion.url;
        } else {
          // Fallback to search form submission
          document.getElementById('wl-search-form').requestSubmit();
        }
      });

      searchSuggestions.appendChild(item);
    });

    searchSuggestions.style.display = 'block';
  }

  function hideSuggestions() {
    searchSuggestions.style.display = 'none';
    currentHighlightedIndex = -1;
  }

  function updateHighlight(items) {
    items.forEach((item, index) => {
      if (index === currentHighlightedIndex) {
        item.classList.add('highlighted');
      } else {
        item.classList.remove('highlighted');
      }
    });
  }
});
</script>
