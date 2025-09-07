<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wanlanka Travel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f8f9fa;
            color: #333;
        }
        
        .header {
            background: linear-gradient(to right, #1a3a4b, #2c5f7c);
            color: white;
            padding: 15px 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .logo {
            display: flex;
            align-items: center;
            text-decoration: none;
        }
        
        .logo-img {
            height: 50px;
            transition: transform 0.3s ease;
        }
        
        .logo:hover .logo-img {
            transform: scale(1.05);
        }
        
        .nav ul {
            display: flex;
            list-style: none;
            gap: 25px;
        }
        
        .nav a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            font-size: 16px;
            padding: 10px 0;
            position: relative;
            transition: color 0.3s ease;
        }
        
        .nav a:hover {
            color: #ffcc00;
        }
        
        .nav a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: #ffcc00;
            transition: width 0.3s ease;
        }
        
        .nav a:hover::after {
            width: 100%;
        }
        
        .nav li.active a {
            color: #ffcc00;
        }
        
        .nav li.active a::after {
            width: 100%;
        }
        
        .right-section {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .phone-number {
            display: flex;
            align-items: center;
            gap: 8px;
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        
        .phone-number:hover {
            color: #ffcc00;
        }
        
        .search-container {
            position: relative;
            display: flex;
            align-items: center;
        }
        
        .search-input {
            padding: 10px 15px 10px 40px;
            border-radius: 50px;
            border: none;
            outline: none;
            width: 220px;
            font-size: 14px;
            background-color: rgba(255, 255, 255, 0.9);
            transition: all 0.3s ease;
        }
        
        .search-input:focus {
            background-color: white;
            box-shadow: 0 0 0 3px rgba(255, 204, 0, 0.3);
        }
        
        .search-icon {
            position: absolute;
            left: 15px;
            color: #6c757d;
        }
        
        .travel-agent-btn, .login-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 18px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
        }
        
        .travel-agent-btn {
            background-color: #ffcc00;
            color: #1a3a4b;
        }
        
        .travel-agent-btn:hover {
            background-color: #e6b800;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .login-btn {
            background-color: transparent;
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }
        
        .login-btn:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-2px);
        }
        
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
        }
        
        @media (max-width: 1024px) {
            .nav ul {
                gap: 15px;
            }
            
            .search-input {
                width: 180px;
            }
        }
        
        @media (max-width: 900px) {
            .nav, .right-section {
                display: none;
            }
            
            .mobile-menu-btn {
                display: block;
            }
            
            .container {
                position: relative;
            }
        }
        
        .mobile-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background-color: #1a3a4b;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            z-index: 999;
        }
        
        .mobile-menu.active {
            display: block;
        }
        
        .mobile-menu ul {
            list-style: none;
        }
        
        .mobile-menu li {
            margin-bottom: 15px;
        }
        
        .mobile-menu a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            display: block;
            padding: 10px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .mobile-menu .phone-number, 
        .mobile-menu .travel-agent-btn,
        .mobile-menu .login-btn {
            margin-top: 15px;
            justify-content: center;
        }
        
        .mobile-search {
            margin: 15px 0;
            position: relative;
        }
        
        .mobile-search input {
            width: 100%;
            padding: 12px 15px 12px 45px;
            border-radius: 50px;
            border: none;
            background-color: rgba(255, 255, 255, 0.9);
        }
        
        .mobile-search i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }
    </style>
</head>
<body>
    <!-- Professional Header -->
    <header class="header">
        <div class="container">
            <a href="/" class="logo">
                <img src="https://via.placeholder.com/150x50/1a3a4b/ffffff?text=Wanlanka+Logo" alt="Wanlanka Logo" class="logo-img" />
            </a>

            <nav class="nav">
                <ul>
                    <li class="active">
                        <a href="#">Destinations</a>
                    </li>
                    <li>
                        <a href="#">Special Offers</a>
                    </li>
                    <li>
                        <a href="#">Travel Info</a>
                    </li>
                    <li>
                        <a href="#">Custom Tours</a>
                    </li>
                    <li>
                        <a href="#">Contact Us</a>
                    </li>
                </ul>
            </nav>

            <div class="right-section">
                <a href="tel:+94773457489" class="phone-number">
                    <i class="fas fa-phone-alt"></i>
                    +94 77 345 7489
                </a>

                <div class="search-container">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" placeholder="Search destinations..." class="search-input" />
                </div>

                <button class="travel-agent-btn">
                    <i class="fas fa-lock"></i>
                    Travel Agent
                </button>

                <button class="login-btn">
                    <i class="fas fa-user"></i>
                    Login
                </button>
            </div>

            <button class="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        
        <!-- Mobile Menu (hidden by default) -->
        <div class="mobile-menu">
            <ul>
                <li><a href="#">Destinations</a></li>
                <li><a href="#">Special Offers</a></li>
                <li><a href="#">Travel Info</a></li>
                <li><a href="#">Custom Tours</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
            
            <div class="mobile-search">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search destinations...">
            </div>
            
            <a href="tel:+94773457489" class="phone-number">
                <i class="fas fa-phone-alt"></i>
                +94 77 345 7489
            </a>
            
            <button class="travel-agent-btn" style="width: 100%">
                <i class="fas fa-lock"></i>
                Travel Agent
            </button>
            
            <button class="login-btn" style="width: 100%">
                <i class="fas fa-user"></i>
                Login
            </button>
        </div>
    </header>

    <main style="padding: 40px 20px; max-width: 1200px; margin: 0 auto;">
        <h1>Wanlanka Travel Experiences</h1>
        <p style="margin-top: 20px;">Explore the beauty of Sri Lanka with our premium travel services. From pristine beaches to cultural landmarks, we offer unforgettable journeys tailored to your preferences.</p>
        
        <div style="margin-top: 40px; display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 25px;">
            <div style="background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.08);">
                <img src="https://via.placeholder.com/400x250/2c5f7c/ffffff?text=Beach+Destination" alt="Beach Destination" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 20px;">
                    <h3>Coastal Getaways</h3>
                    <p style="margin-top: 10px; color: #666;">Relax on pristine beaches with our exclusive coastal packages.</p>
                </div>
            </div>
            
            <div style="background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.08);">
                <img src="https://via.placeholder.com/400x250/1a3a4b/ffffff?text=Cultural+Tour" alt="Cultural Tour" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 20px;">
                    <h3>Cultural Discovery</h3>
                    <p style="margin-top: 10px; color: #666;">Explore ancient temples and historical sites with expert guides.</p>
                </div>
            </div>
            
            <div style="background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.08);">
                <img src="https://via.placeholder.com/400x250/ffcc00/000000?text=Adventure+Travel" alt="Adventure Travel" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 20px;">
                    <h3>Adventure Packages</h3>
                    <p style="margin-top: 10px; color: #666;">Hiking, safari, and water sports for the adventurous traveler.</p>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Mobile menu toggle functionality
        document.querySelector('.mobile-menu-btn').addEventListener('click', function() {
            document.querySelector('.mobile-menu').classList.toggle('active');
        });
        
        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const mobileMenu = document.querySelector('.mobile-menu');
            const menuBtn = document.querySelector('.mobile-menu-btn');
            
            if (!mobileMenu.contains(event.target) && event.target !== menuBtn) {
                mobileMenu.classList.remove('active');
            }
        });
        
        // Simulate active state for demo purposes
        const navItems = document.querySelectorAll('.nav li');
        navItems.forEach(item => {
            item.addEventListener('click', function() {
                navItems.forEach(i => i.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
</body>
</html>