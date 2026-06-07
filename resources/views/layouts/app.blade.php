<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Crowns IT') | Best Software Agency</title>
    <meta name="description" content="@yield('meta_description', 'Crowns IT is a premium software agency specializing in Web Applications, Web Development, Custom Software, Digital Marketing, Graphics Design, and UI/UX Design. Build your digital future with Crowns IT.')">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <div class="bg-glow">
        <div class="glow-1"></div>
        <div class="glow-2"></div>
    </div>

    <nav class="kastana-header">
        <div class="header-left">
            <a href="{{ url('/') }}" class="kastana-logo">
                <div class="logo-dots">
                    <span class="dot d1"></span>
                    <span class="dot d2"></span>
                    <span class="dot d3"></span>
                    <span class="dot d4"></span>
                </div>
                <div class="logo-text">
                    Crowns <span>IT</span>
                </div>
            </a>
        </div>

        <div class="nav-links">
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ route('about') }}">About</a>
            <div class="dropdown">
                <a href="#" class="dropdown-trigger">
                    Services <i class="fa-solid fa-chevron-down"></i>
                </a>
                <div class="dropdown-menu">
                    <a href="{{ route('services.web-app') }}" class="dropdown-item item-webapp">
                        <span class="icon-wrapper"><i class="fa-solid fa-laptop-code"></i></span>
                        <div class="dropdown-text">
                            <span class="title">Web Application</span>
                            <span class="desc">Interactive cloud apps & systems</span>
                        </div>
                    </a>
                    <a href="{{ route('services.web-dev') }}" class="dropdown-item item-webdev">
                        <span class="icon-wrapper"><i class="fa-solid fa-code"></i></span>
                        <div class="dropdown-text">
                            <span class="title">Web Development</span>
                            <span class="desc">Modern, responsive websites</span>
                        </div>
                    </a>
                    <a href="{{ route('services.software') }}" class="dropdown-item item-software">
                        <span class="icon-wrapper"><i class="fa-solid fa-gears"></i></span>
                        <div class="dropdown-text">
                            <span class="title">Custom Software</span>
                            <span class="desc">Tailored enterprise software</span>
                        </div>
                    </a>
                     <a href="{{ route('services.graphics') }}" class="dropdown-item item-graphics">
                        <span class="icon-wrapper"><i class="fa-solid fa-palette"></i></span>
                        <div class="dropdown-text">
                            <span class="title">Graphics Design</span>
                            <span class="desc">Stunning visuals & brand identity</span>
                        </div>
                    </a>
                    <a href="{{ route('services.marketing') }}" class="dropdown-item item-marketing">
                        <span class="icon-wrapper"><i class="fa-solid fa-bullhorn"></i></span>
                        <div class="dropdown-text">
                            <span class="title">Digital Marketing</span>
                            <span class="desc">Grow your business & reach</span>
                        </div>
                    </a>
                   
                    <a href="{{ route('services.ui-ux') }}" class="dropdown-item item-uiux">
                        <span class="icon-wrapper"><i class="fa-solid fa-crop-simple"></i></span>
                        <div class="dropdown-text">
                            <span class="title">UI/UX Design</span>
                            <span class="desc">Sleek user flows & interfaces</span>
                        </div>
                    </a>
                </div>
            </div>
            <a href="{{ route('blog') }}">Blog</a>
            <a href="{{ route('contact') }}">Contact</a>
            <a href="{{ route('contact') }}" class="btn-get-started mobile-only">
                Get Started <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>

        <div class="header-right">
            <a href="{{ route('contact') }}" class="btn-get-started">
                Get Started <i class="fa-solid fa-arrow-right"></i>
            </a>
            <button class="mobile-menu-toggle" aria-label="Toggle Menu">
                <span class="bar b1"></span>
                <span class="bar b2"></span>
                <span class="bar b3"></span>
            </button>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="main-footer">
        <div class="footer-container">
            <div class="footer-grid">
                <!-- Column 1: Brand -->
                <div class="footer-col brand-col">
                    <a href="{{ url('/') }}" class="kastana-logo footer-logo">
                        <div class="logo-dots">
                            <span class="dot d1"></span>
                            <span class="dot d2"></span>
                            <span class="dot d3"></span>
                            <span class="dot d4"></span>
                        </div>
                        <div class="logo-text">
                            Crowns <span>IT</span>
                        </div>
                    </a>
                    <p class="footer-desc">Crafting high-performance digital experiences with precision and passion. Your partner in technological innovation.</p>
                    <div class="footer-socials">
                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                    </div>
                </div>

                <!-- Column 2: Quick Links -->
                <div class="footer-col">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="#">Home</a></li>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="#">Our Services</a></li>
                        <li><a href="#">Case Studies</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>

                <!-- Column 3: Services -->
                <div class="footer-col">
                    <h3>Our Services</h3>
                    <ul class="footer-links">
                        <li><a href="#">Web Development</a></li>
                        <li><a href="#">Mobile Applications</a></li>
                        <li><a href="#">Custom Software</a></li>
                        <li><a href="#">Graphics Design</a></li>
                        <li><a href="#">Digital Marketing</a></li>
                        <li><a href="#">UI/UX Design</a></li>
                    </ul>
                </div>

                <!-- Column 4: Contact -->
                <div class="footer-col">
                    <h3>Contact Us</h3>
                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="fa-solid fa-location-dot"></i>
                            <span>123 Tech Avenue, Dhaka, Bangladesh</span>
                        </div>
                        <div class="contact-item">
                            <i class="fa-solid fa-phone"></i>
                            <span>+8801777494071</span>
                        </div>
                        <div class="contact-item">
                            <i class="fa-solid fa-envelope"></i>
                            <span>info@crownsit.com</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2026 Crowns IT. All rights reserved.</p>
                <div class="footer-bottom-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        lucide.createIcons();
    </script>
    @stack('scripts')
</body>
</html>
