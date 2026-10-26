<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @php
        $seoSiteUrl = rtrim(config('app.url', 'https://crownsit.com'), '/');
        $seoDefaultTitle = 'Crowns IT (Crown IT) | Best Software Company in Dhaka, Bangladesh';
        $seoDefaultDescription = 'Crowns IT (Crown IT) is the best software company in Dhaka, Bangladesh, offering premier custom software development, web applications, and enterprise digital solutions.';
        $seoTitle = trim($__env->yieldContent('title', $seoDefaultTitle)) ?: $seoDefaultTitle;
        $seoDescriptionSource = $__env->yieldContent('meta_description', $seoDefaultDescription) ?: $seoDefaultDescription;
        $seoDescription = \Illuminate\Support\Str::of(html_entity_decode(strip_tags($seoDescriptionSource), ENT_QUOTES | ENT_HTML5, 'UTF-8'))
            ->squish()
            ->limit(160, '')
            ->toString();
        $seoPath = trim(request()->path(), '/');
        $seoCanonicalUrl = $seoSiteUrl . ($seoPath === '' ? '/' : '/' . $seoPath);
        $seoImageCandidate = $__env->yieldContent('og_image')
            ?: \App\Models\HomepageSetting::getValue('site_logo')
            ?: $seoSiteUrl . '/favicon.ico';
        $seoImageScheme = parse_url($seoImageCandidate, PHP_URL_SCHEME);
        $seoImageUrl = filter_var($seoImageCandidate, FILTER_VALIDATE_URL)
            && in_array(strtolower((string) $seoImageScheme), ['http', 'https'], true)
                ? $seoImageCandidate
                : $seoSiteUrl . '/' . ltrim($seoImageCandidate, '/');
        $seoType = $__env->yieldContent('og_type', 'website') ?: 'website';
        $siteSchema = [
            '@context' => 'https://schema.org',
            '@graph' => [
                [
                    '@type' => ['Organization', 'LocalBusiness', 'ProfessionalService'],
                    '@id' => $seoSiteUrl . '/#organization',
                    'name' => 'Crowns IT',
                    'alternateName' => ['Crown IT', 'CrownsIT', 'Crown IT Bangladesh', 'Crown IT BD', 'Crowns IT Agency'],
                    'url' => $seoSiteUrl . '/',
                    'logo' => $seoImageUrl,
                    'image' => $seoImageUrl,
                    'description' => 'Crowns IT is recognized as the best software company in Dhaka, Bangladesh, specializing in custom software development, modern web applications, and enterprise digital solutions.',
                    'telephone' => '+8801777494071',
                    'email' => 'info@crownsit.com',
                    'priceRange' => '$$',
                    'address' => [
                        '@type' => 'PostalAddress',
                        'streetAddress' => 'Dhaka',
                        'addressLocality' => 'Dhaka',
                        'addressRegion' => 'Dhaka Division',
                        'addressCountry' => 'BD',
                        'postalCode' => '1200',
                    ],
                    'geo' => [
                        '@type' => 'GeoCoordinates',
                        'latitude' => 23.8103,
                        'longitude' => 90.4125,
                    ],
                    'areaServed' => [
                        [
                            '@type' => 'City',
                            'name' => 'Dhaka',
                        ],
                        [
                            '@type' => 'Country',
                            'name' => 'Bangladesh',
                        ],
                    ],
                    'founder' => [
                        '@type' => 'Person',
                        '@id' => $seoSiteUrl . '/#founder',
                        'name' => 'Md Miskatul Asfim Preetom',
                        'alternateName' => ['Miskatul Asfim', 'Asfim Preetom'],
                        'jobTitle' => 'CEO & Founder',
                        'description' => 'CEO & Founder of Crowns IT, leading the development of innovative software solutions, web applications, e-commerce platforms, and business management systems.',
                    ],
                ],
                [
                    '@type' => 'Person',
                    '@id' => $seoSiteUrl . '/#founder',
                    'name' => 'Md Miskatul Asfim Preetom',
                    'alternateName' => ['Miskatul Asfim', 'Asfim Preetom', 'Md Miskatul Asfim'],
                    'jobTitle' => 'CEO & Founder',
                    'worksFor' => ['@id' => $seoSiteUrl . '/#organization'],
                    'description' => 'CEO & Founder of Crowns IT, leading the development of innovative software solutions, web applications, e-commerce platforms, and business management systems.',
                ],
                [
                    '@type' => 'WebSite',
                    '@id' => $seoSiteUrl . '/#website',
                    'name' => 'Crowns IT',
                    'alternateName' => ['Crown IT', 'CrownsIT', 'Crown IT Bangladesh', 'Crown IT Dhaka'],
                    'url' => $seoSiteUrl . '/',
                    'publisher' => ['@id' => $seoSiteUrl . '/#organization'],
                ],
            ],
        ];
    @endphp
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $seoTitle }}</title>
    <meta name="description" content="{{ $seoDescription }}">
    <meta name="keywords" content="best software company in dhaka, best software company in bangladesh, software company in dhaka, software company in bangladesh, top software company in dhaka, custom software development bangladesh, best web development company in bangladesh, Crown IT, Crowns IT, IT company dhaka, Md Miskatul Asfim Preetom, Asfim Preetom, Crowns IT CEO, Crowns IT Founder">
    <link rel="canonical" href="{{ $seoCanonicalUrl }}">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="{{ $seoType }}">
    <meta property="og:url" content="{{ $seoCanonicalUrl }}">
    <meta property="og:title" content="{{ $seoTitle }}">
    <meta property="og:description" content="{{ $seoDescription }}">
    <meta property="og:image" content="{{ $seoImageUrl }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ $seoCanonicalUrl }}">
    <meta name="twitter:title" content="{{ $seoTitle }}">
    <meta name="twitter:description" content="{{ $seoDescription }}">
    <meta name="twitter:image" content="{{ $seoImageUrl }}">

    <script type="application/ld+json">@json($siteSchema, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT)</script>
    @yield('structured_data')
    
    <!-- Favicon -->
    @if(\App\Models\HomepageSetting::getValue('site_favicon'))
        <link rel="icon" type="image/x-icon" href="{{ \App\Models\HomepageSetting::getValue('site_favicon') }}">
    @else
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    @endif

    @yield('hero_preload')

    <!-- Fonts (Non-blocking async load) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@300;400;600;800&family=Sora:wght@300;400;600;700;800&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@300;400;600;800&family=Sora:wght@300;400;600;700;800&display=swap" media="print" onload="this.media='all'">
    <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@300;400;600;800&family=Sora:wght@300;400;600;700;800&display=swap"></noscript>
    
    <!-- Non-critical external icon fonts (Deferred until user interaction or after hero render) -->
    <script>
        (function() {
            var loaded = false;
            function loadDeferredIcons() {
                if (loaded) return;
                loaded = true;
                var urls = [
                    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css',
                    'https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css'
                ];
                urls.forEach(function(u) {
                    var l = document.createElement('link');
                    l.rel = 'stylesheet';
                    l.href = u;
                    document.head.appendChild(l);
                });
            }
            ['scroll', 'touchstart', 'mousemove', 'keydown', 'click'].forEach(function(ev) {
                window.addEventListener(ev, loadDeferredIcons, { once: true, passive: true });
            });
            setTimeout(loadDeferredIcons, 7000);
        })();
    </script>
    <noscript>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">
    </noscript>

    <style>
    body { background-color: #0a0a0c; color: #ffffff; }
    #gs_phone, .iti input, .iti input[type=tel] { transition: border-color 0.2s ease, box-shadow 0.2s ease !important; }
    </style>

    @php
        $manifestPath = public_path('build/manifest.json');
        $isLocalDev = app()->isLocal() && file_exists(public_path('hot')) && in_array(request()->getHost(), ['localhost', '127.0.0.1'], true);
    @endphp
    @if($isLocalDev)
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @elseif(file_exists($manifestPath))
        @php
            $manifestData = json_decode(file_get_contents($manifestPath), true) ?? [];
            $manifestCss = $manifestData['resources/css/app.css']['file'] ?? null;
            $manifestJs = $manifestData['resources/js/app.js']['file'] ?? null;
        @endphp
        @if($manifestCss)
            <link rel="preload" href="{{ asset('build/' . $manifestCss) }}" as="style">
            <link rel="stylesheet" href="{{ asset('build/' . $manifestCss) }}">
        @endif
        @if($manifestJs)
            <script type="module" src="{{ asset('build/' . $manifestJs) }}" defer></script>
        @endif
    @else
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body>
    <div class="bg-glow">
        <div class="glow-1"></div>
        <div class="glow-2"></div>
    </div>

    <nav class="kastana-header">
        <div class="header-left">
            <a href="{{ url('/') }}" class="kastana-logo">
                @if(\App\Models\HomepageSetting::getValue('site_logo'))
                    <img src="{{ \App\Models\HomepageSetting::getValue('site_logo') }}" alt="Crowns IT Logo" width="180" height="40" fetchpriority="high" decoding="async" style="height: 40px; width: auto; object-fit: contain;">
                @else
                    <div class="logo-dots">
                        <span class="dot d1"></span>
                        <span class="dot d2"></span>
                        <span class="dot d3"></span>
                        <span class="dot d4"></span>
                    </div>
                    <div class="logo-text">
                        Crowns <span>IT</span>
                    </div>
                @endif
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
            <button type="button" class="btn-get-started mobile-only" onclick="openGetStartedModal()">
                Get Started <i class="fa-solid fa-arrow-right"></i>
            </button>
        </div>

        <div class="header-right">
            <button type="button" class="btn-get-started" onclick="openGetStartedModal()">
                Get Started <i class="fa-solid fa-arrow-right"></i>
            </button>
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
                        @if(\App\Models\HomepageSetting::getValue('footer_logo'))
                            <img src="{{ \App\Models\HomepageSetting::getValue('footer_logo') }}" alt="Crowns IT Footer Logo" width="180" height="40" loading="lazy" decoding="async" style="height: 40px; width: auto; object-fit: contain;">
                        @elseif(\App\Models\HomepageSetting::getValue('site_logo'))
                            <img src="{{ \App\Models\HomepageSetting::getValue('site_logo') }}" alt="Crowns IT Logo" width="180" height="40" loading="lazy" decoding="async" style="height: 40px; width: auto; object-fit: contain;">
                        @else
                            <div class="logo-dots">
                                <span class="dot d1"></span>
                                <span class="dot d2"></span>
                                <span class="dot d3"></span>
                                <span class="dot d4"></span>
                            </div>
                            <div class="logo-text">
                                Crowns <span>IT</span>
                            </div>
                        @endif
                    </a>
                    <p class="footer-desc">{{ \App\Models\HomepageSetting::getValue('footer_description', 'Crafting high-performance digital experiences with precision and passion. Your partner in technological innovation.') }}</p>
                    <div class="footer-socials">
                        @foreach(\App\Models\SocialLink::getAllCached() as $link)
                            @php
                                $iconClass = match($link->platform) {
                                    'facebook' => 'fa-brands fa-facebook-f',
                                    'twitter', 'x' => 'fa-brands fa-x-twitter',
                                    'instagram' => 'fa-brands fa-instagram',
                                    'linkedin' => 'fa-brands fa-linkedin-in',
                                    'youtube' => 'fa-brands fa-youtube',
                                    'github' => 'fa-brands fa-github',
                                    'tiktok' => 'fa-brands fa-tiktok',
                                    'pinterest' => 'fa-brands fa-pinterest-p',
                                    'whatsapp' => 'fa-brands fa-whatsapp',
                                    default => 'fa-solid fa-globe',
                                };
                            @endphp
                            <a href="{{ $link->url }}" target="_blank" rel="noopener noreferrer" aria-label="{{ ucfirst($link->platform) }}"><i class="{{ $iconClass }}" aria-hidden="true"></i></a>
                        @endforeach
                    </div>
                </div>

                <!-- Column 2: Quick Links -->
                <div class="footer-col">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('home') }}#services">Our Services</a></li>
                        <li><a href="{{ route('blog') }}">Blog & Insights</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>

                <!-- Column 3: Services -->
                <div class="footer-col">
                    <h3>Our Services</h3>
                    <ul class="footer-links">
                        <li><a href="{{ route('services.web-dev') }}">Web Development</a></li>
                        <li><a href="{{ route('services.web-app') }}">Mobile Applications</a></li>
                        <li><a href="{{ route('services.software') }}">Custom Software</a></li>
                        <li><a href="{{ route('services.graphics') }}">Graphics Design</a></li>
                        <li><a href="{{ route('services.marketing') }}">Digital Marketing</a></li>
                        <li><a href="{{ route('services.ui-ux') }}">UI/UX Design</a></li>
                    </ul>
                </div>

                <!-- Column 4: Contact -->
                <div class="footer-col">
                    <h3>Contact Us</h3>
                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="fa-solid fa-location-dot"></i>
                            <span>{{ \App\Models\HomepageSetting::getValue('contact_address', '123 Tech Avenue, Dhaka, Bangladesh') }}</span>
                        </div>
                        <div class="contact-item">
                            <i class="fa-solid fa-phone"></i>
                            <span>{{ \App\Models\HomepageSetting::getValue('contact_phone', '+8801777494071') }}</span>
                        </div>
                        <div class="contact-item">
                            <i class="fa-solid fa-envelope"></i>
                            <span>{{ \App\Models\HomepageSetting::getValue('contact_email', 'info@crownsit.com') }}</span>
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

    <!-- Deferred Icons JS -->
    <script src="{{ asset('js/lucide.min.js') }}" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (window.lucide) {
                lucide.createIcons();
            } else {
                window.addEventListener('load', function() {
                    if (window.lucide) lucide.createIcons();
                });
            }
        });
    </script>
    @stack('scripts')

    <!-- ===== GET STARTED MODAL ===== -->
    <div id="getStartedModal" class="gs-modal-overlay" role="dialog" aria-modal="true" aria-labelledby="gs-modal-title">
        <div class="gs-modal-box">
            <!-- Close -->
            <button class="gs-close-btn" onclick="closeGetStartedModal()" aria-label="Close modal">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <!-- Header -->
            <div class="gs-modal-header">
                <div class="gs-modal-icon"><i class="fa-solid fa-rocket"></i></div>
                <h2 id="gs-modal-title">Let&rsquo;s Get Started!</h2>
                <p>Tell us about your project and we&rsquo;ll get back to you within 24 hours.</p>
            </div>

            <!-- Form -->
            <form id="gsForm" novalidate>
                @csrf
                <div class="gs-field">
                    <label for="gs_name">Full Name <span class="gs-req">*</span></label>
                    <input type="text" id="gs_name" name="name" placeholder="Your full name" autocomplete="off">
                    <span class="gs-err" id="err_name"></span>
                </div>

                <div class="gs-field">
                    <label for="gs_phone">Phone Number (with Country Code) <span class="gs-req">*</span></label>
                    <input type="text" id="gs_phone" name="phone" placeholder="e.g. +88017XXXXXXXX" autocomplete="off">
                    <span class="gs-err" id="err_phone"></span>
                </div>

                <div class="gs-field">
                    <label for="gs_service">Service Interested In <span class="gs-req">*</span></label>
                    <div class="gs-select-wrapper">
                        <select id="gs_service" name="service">
                            <option value="" disabled selected>Choose a service&hellip;</option>
                            <option value="Web Application Development">Web Application Development</option>
                            <option value="Web Development">Web Development</option>
                            <option value="Custom Software Development">Custom Software Development</option>
                            <option value="Graphics Design">Graphics Design</option>
                            <option value="Digital Marketing">Digital Marketing</option>
                            <option value="UI/UX Design">UI/UX Design</option>
                            <option value="Logo Design">Logo Design</option>
                            <option value="Book Cover Design">Book Cover Design</option>
                            <option value="Amazon KDP Publishing">Amazon KDP Publishing</option>
                            <option value="Social Media Design">Social Media Design</option>
                            <option value="Other / Not Sure Yet">Other / Not Sure Yet</option>
                        </select>
                        <i class="fa-solid fa-chevron-down gs-select-icon"></i>
                    </div>
                    <span class="gs-err" id="err_service"></span>
                </div>

                <div class="gs-field">
                    <label for="gs_message">Your Message <span class="gs-req">*</span></label>
                    <textarea id="gs_message" name="message" rows="4" placeholder="Briefly describe your project or requirements&hellip;"></textarea>
                    <span class="gs-err" id="err_message"></span>
                </div>

                <!-- Status message -->
                <div id="gs_status" class="gs-status" style="display:none;"></div>

                <button type="submit" class="gs-submit-btn" id="gs_submit">
                    <span id="gs_btn_text">Send Request <i class="fa-solid fa-paper-plane"></i></span>
                    <span id="gs_btn_loader" style="display:none;"><i class="fa-solid fa-spinner fa-spin"></i> Sending&hellip;</span>
                </button>
            </form>
        </div>
    </div>

    <style>
    /* ===== GET STARTED MODAL STYLES ===== */
    .gs-modal-overlay {
        position: fixed;
        inset: 0;
        background: rgba(10,10,12,0.65);
        backdrop-filter: blur(6px);
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem;
        opacity: 0;
        visibility: hidden;
        transition: all 0.35s cubic-bezier(0.16,1,0.3,1);
    }
    .gs-modal-overlay.active {
        opacity: 1;
        visibility: visible;
    }
    .gs-modal-box {
        background: #fff;
        border-radius: 24px;
        width: 100%;
        max-width: 520px;
        padding: 2.5rem 2.5rem 2rem;
        position: relative;
        box-shadow: 0 30px 80px rgba(0,0,0,0.2);
        transform: translateY(28px) scale(0.97);
        transition: all 0.35s cubic-bezier(0.16,1,0.3,1);
        max-height: 90vh;
        overflow-y: auto;
    }
    .gs-modal-overlay.active .gs-modal-box {
        transform: translateY(0) scale(1);
    }
    .gs-close-btn {
        position: absolute;
        top: 1.2rem;
        right: 1.2rem;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        border: 1px solid rgba(0,0,0,0.1);
        background: #f3f4f6;
        color: #6b7280;
        font-size: 1rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.2s;
        z-index: 2;
    }
    .gs-close-btn:hover {
        background: #fee2e2;
        color: #ef4444;
        border-color: #fca5a5;
    }
    .gs-modal-header {
        text-align: center;
        margin-bottom: 2rem;
    }
    .gs-modal-icon {
        width: 64px;
        height: 64px;
        border-radius: 18px;
        background: linear-gradient(135deg, #22c55e, #16a34a);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.6rem;
        margin: 0 auto 1rem;
        box-shadow: 0 8px 24px rgba(34,197,94,0.35);
    }
    .gs-modal-header h2 {
        font-family: 'Sora', sans-serif;
        font-size: 1.65rem;
        font-weight: 800;
        color: #1a2744;
        margin: 0 0 0.4rem;
    }
    .gs-modal-header p {
        font-size: 0.92rem;
        color: #6b7280;
        margin: 0;
        line-height: 1.6;
    }
    .gs-field {
        margin-bottom: 1.25rem;
    }
    .gs-field label {
        display: block;
        font-size: 0.85rem;
        font-weight: 600;
        color: #374151;
        margin-bottom: 0.45rem;
    }
    .gs-req { color: #ef4444; }
    .gs-field input,
    .gs-field textarea {
        width: 100%;
        padding: 0.8rem 1rem;
        border: 1.5px solid #e5e7eb;
        border-radius: 12px;
        font-size: 0.95rem;
        color: #1f2937;
        font-family: 'Outfit', sans-serif;
        background: #f9fafb;
        transition: 0.25s;
        outline: none;
        resize: vertical;
    }
    .gs-field input:focus,
    .gs-field textarea:focus {
        border-color: #22c55e;
        background: #fff;
        box-shadow: 0 0 0 3px rgba(34,197,94,0.12);
    }
    .gs-field input.gs-invalid,
    .gs-field textarea.gs-invalid,
    .gs-field .gs-select-wrapper.gs-invalid select {
        border-color: #ef4444;
        box-shadow: 0 0 0 3px rgba(239,68,68,0.1);
    }
    .gs-select-wrapper {
        position: relative;
    }
    .gs-select-wrapper select {
        width: 100%;
        padding: 0.8rem 2.5rem 0.8rem 1rem;
        border: 1.5px solid #e5e7eb;
        border-radius: 12px;
        font-size: 0.95rem;
        color: #1f2937;
        font-family: 'Outfit', sans-serif;
        background: #f9fafb;
        appearance: none;
        cursor: pointer;
        transition: 0.25s;
        outline: none;
    }
    .gs-select-wrapper select:focus {
        border-color: #22c55e;
        background: #fff;
        box-shadow: 0 0 0 3px rgba(34,197,94,0.12);
    }
    .gs-select-icon {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #9ca3af;
        pointer-events: none;
        font-size: 0.8rem;
    }
    .gs-err {
        display: block;
        font-size: 0.78rem;
        color: #ef4444;
        margin-top: 0.3rem;
        min-height: 1rem;
    }
    .gs-status {
        padding: 0.9rem 1rem;
        border-radius: 10px;
        font-size: 0.92rem;
        font-weight: 600;
        margin-bottom: 1rem;
        text-align: center;
    }
    .gs-status.success {
        background: #dcfce7;
        color: #16a34a;
        border: 1px solid rgba(34,197,94,0.3);
    }
    .gs-status.error {
        background: #fee2e2;
        color: #dc2626;
        border: 1px solid rgba(239,68,68,0.3);
    }
    .gs-submit-btn {
        width: 100%;
        padding: 0.95rem;
        background: linear-gradient(135deg, #22c55e, #16a34a);
        color: #fff;
        border: none;
        border-radius: 50px;
        font-size: 1rem;
        font-weight: 700;
        font-family: 'Outfit', sans-serif;
        cursor: pointer;
        transition: 0.3s;
        box-shadow: 0 6px 20px rgba(34,197,94,0.35);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        margin-top: 0.25rem;
    }
    .gs-submit-btn:hover:not(:disabled) {
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(34,197,94,0.45);
    }
    .gs-submit-btn:disabled {
        opacity: 0.75;
        cursor: not-allowed;
        transform: none;
    }
    /* Button base reset */
    .btn-get-started { cursor: pointer; border: none; }
    @media (max-width: 540px) {
        .gs-modal-box { padding: 2rem 1.5rem 1.75rem; }
        .gs-modal-header h2 { font-size: 1.4rem; }
    }
    
    /* intl-tel-input overrides */
    .iti {
        width: 100% !important;
        display: block !important;
        color: black;
    }
    .iti__country-list {
        z-index: 100000 !important;
        color: #1f2937 !important;
        max-width: 440px !important;
    }
    #gs_phone, .iti input, .iti input[type=tel] {
        transition: border-color 0.2s ease, box-shadow 0.2s ease !important;
    }
    </style>

    <script>
    let iti = null;
    let itiScriptLoading = false;

    function initPhoneInput() {
        const phoneInput = document.getElementById('gs_phone');
        if (!phoneInput || iti) return;

        // Dynamically inject intlTelInput CSS on demand
        if (!document.getElementById('iti-css')) {
            const link = document.createElement('link');
            link.id = 'iti-css';
            link.rel = 'stylesheet';
            link.href = 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css';
            document.head.appendChild(link);
        }

        if (window.intlTelInput) {
            iti = window.intlTelInput(phoneInput, {
                initialCountry: "bd",
                separateDialCode: true,
                preferredCountries: ["bd", "us", "gb", "ca"],
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js"
            });
        } else if (!itiScriptLoading) {
            itiScriptLoading = true;
            const script = document.createElement('script');
            script.src = "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js";
            script.async = true;
            script.onload = () => {
                itiScriptLoading = false;
                const p = document.getElementById('gs_phone');
                if (p && !iti && window.intlTelInput) {
                    iti = window.intlTelInput(p, {
                        initialCountry: "bd",
                        separateDialCode: true,
                        preferredCountries: ["bd", "us", "gb", "ca"],
                        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js"
                    });
                }
            };
            document.body.appendChild(script);
        }
    }
    function openGetStartedModal() {
        initPhoneInput();
        document.getElementById('getStartedModal').classList.add('active');
        document.body.style.overflow = 'hidden';
        setTimeout(() => {
            window.dispatchEvent(new Event('resize'));
        }, 150);
    }
    function closeGetStartedModal() {
        document.getElementById('getStartedModal').classList.remove('active');
        document.body.style.overflow = '';
    }
    // Close on backdrop click
    document.getElementById('getStartedModal').addEventListener('click', function(e) {
        if (e.target === this) closeGetStartedModal();
    });
    // Close on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeGetStartedModal();
    });

    document.getElementById('gsForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        const name    = document.getElementById('gs_name');
        const phone   = document.getElementById('gs_phone');
        const service = document.getElementById('gs_service');
        const message = document.getElementById('gs_message');
        const status  = document.getElementById('gs_status');
        const btnText  = document.getElementById('gs_btn_text');
        const btnLoader = document.getElementById('gs_btn_loader');
        const submitBtn = document.getElementById('gs_submit');

        // Reset errors
        [name, phone, message].forEach(el => el.classList.remove('gs-invalid'));
        document.querySelector('.gs-select-wrapper').classList.remove('gs-invalid');
        ['err_name','err_phone','err_service','err_message'].forEach(id => document.getElementById(id).textContent = '');
        status.style.display = 'none';
        status.className = 'gs-status';

        // Validate
        let valid = true;
        if (!name.value.trim()) {
            name.classList.add('gs-invalid');
            document.getElementById('err_name').textContent = 'Please enter your full name.';
            valid = false;
        }
        if (!phone.value.trim()) {
            phone.classList.add('gs-invalid');
            document.getElementById('err_phone').textContent = 'Please enter your phone number.';
            valid = false;
        } else if (iti && !iti.isValidNumber()) {
            phone.classList.add('gs-invalid');
            document.getElementById('err_phone').textContent = 'Please enter a valid phone number with country code.';
            valid = false;
        }
        if (!service.value) {
            document.querySelector('.gs-select-wrapper').classList.add('gs-invalid');
            document.getElementById('err_service').textContent = 'Please select a service.';
            valid = false;
        }
        if (!message.value.trim()) {
            message.classList.add('gs-invalid');
            document.getElementById('err_message').textContent = 'Please write a short message.';
            valid = false;
        }
        if (!valid) return;

        // Loading state
        submitBtn.disabled = true;
        btnText.style.display = 'none';
        btnLoader.style.display = 'inline-flex';

        try {
            const formData = new FormData();
            formData.append('name',    name.value.trim());
            formData.append('phone',   iti ? iti.getNumber() : phone.value.trim());
            formData.append('service', service.value);
            formData.append('message', message.value.trim());
            formData.append('_token',  document.querySelector('input[name=_token]').value);

            const res  = await fetch('{{ route("get-started.submit") }}', { method: 'POST', body: formData });
            const data = await res.json();

            status.textContent = data.message;
            status.classList.add(data.success ? 'success' : 'error');
            status.style.display = 'block';

            if (data.success) {
                // Reset form after success
                this.reset();
                setTimeout(closeGetStartedModal, 3500);
            }
        } catch (err) {
            status.textContent = 'Network error. Please try again.';
            status.classList.add('error');
            status.style.display = 'block';
        } finally {
            submitBtn.disabled = false;
            btnText.style.display = 'inline-flex';
            btnLoader.style.display = 'none';
        }
    });
    </script>
</body>
</html>
