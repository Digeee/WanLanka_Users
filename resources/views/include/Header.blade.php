<!-- resources/views/include/header.blade.php -->

<header class="header">
    <div class="container">
        <div class="logo">
            <img src="{{ asset('images/wanlanka_logo.png') }}" alt="Ritz Tours Logo" class="logo-img" />
        </div>
        <nav class="nav">
            <ul>
                <li class="{{ request()->is('destinations') ? 'active' : '' }}">
                    <a href="{{ url('destinations') }}">Destinations</a>
                </li>
                <li class="{{ request()->is('offers') ? 'active' : '' }}">
                    <a href="{{ url('offers') }}">Offers</a>
                </li>
                <li class="{{ request()->is('info') ? 'active' : '' }}">
                    <a href="{{ url('info') }}">Info</a>
                </li>
                <li class="{{ request()->is('custom-tours') ? 'active' : '' }}">
                    <a href="{{ url('custom-tours') }}">Custom Tours</a>
                </li>
                <li class="{{ request()->is('contact') ? 'active' : '' }}">
                    <a href="{{ url('contact') }}">Contact</a>
                </li>
            </ul>
        </nav>
        <div class="right-section">
            <a href="tel:+18883457489" class="phone-number">888-345-7489</a>
            <div class="search-container">
                <input type="text" placeholder="Search" class="search-input" />
            </div>
            <button class="travel-agent-btn">Travel Agent</button>
            <button class="login-btn">Login</button>
        </div>
    </div>
</header>
