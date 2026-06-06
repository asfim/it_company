@extends('layouts.app')

@section('title', 'Innovating for the Future')

@section('content')
    <!-- HERO -->
    <section class="hero-new" id="hero">
        <div class="code-bg-container">
            <div class="code-snippet-float p1">
                <pre>
    <span class="code-comment">// (a + b)^2</span>
    <span class="code-keyword">function</span> <span class="code-func">square_add</span>(<span class="code-var">$a</span>, <span class="code-var">$b</span>) {
        <span class="code-keyword">return</span> (<span class="code-var">$a</span> * <span class="code-var">$a</span>) + (<span class="code-num">2</span> * <span class="code-var">$a</span> * <span class="code-var">$b</span>) + (<span class="code-var">$b</span> * <span class="code-var">$b</span>);
    }
    <span class="code-comment">// (a - b)^2</span>
    <span class="code-keyword">function</span> <span class="code-func">square_sub</span>(<span class="code-var">$a</span>, <span class="code-var">$b</span>) {
        <span class="code-keyword">return</span> (<span class="code-var">$a</span> * <span class="code-var">$a</span>) - (<span class="code-num">2</span> * <span class="code-var">$a</span> * <span class="code-var">$b</span>) + (<span class="code-var">$b</span> * <span class="code-var">$b</span>);
    }
                    </pre>
            </div>
            <div class="code-snippet-float p2">
                <pre>
    <span class="code-comment">// a^2 - b^2</span>
    <span class="code-keyword">function</span> <span class="code-func">difference_square</span>(<span class="code-var">$a</span>, <span class="code-var">$b</span>) {
        <span class="code-keyword">return</span> (<span class="code-var">$a</span> + <span class="code-var">$b</span>) * (<span class="code-var">$a</span> - <span class="code-var">$b</span>);
    }
    <span class="code-comment">// 5 ending square trick</span>
    <span class="code-keyword">function</span> <span class="code-func">square_ending_5</span>(<span class="code-var">$n</span>) {
        <span class="code-var">$base</span> = <span class="code-func">floor</span>(<span class="code-var">$n</span> / <span class="code-num">10</span>);
        <span class="code-keyword">return</span> (<span class="code-var">$base</span> * (<span class="code-var">$base</span> + <span class="code-num">1</span>)) . <span class="code-str">"25"</span>;
    }
                    </pre>
            </div>
            <div class="code-snippet-float p3">
                <pre>
    <span class="code-comment">// 11 multiplication trick</span>
    <span class="code-keyword">function</span> <span class="code-func">multiply_11</span>(<span class="code-var">$num</span>) {
        <span class="code-var">$digits</span> = <span class="code-func">str_split</span>(<span class="code-var">$num</span>);
        <span class="code-var">$sum</span> = <span class="code-func">intval</span>(<span class="code-var">$digits</span>[<span class="code-num">0</span>]) + <span class="code-func">intval</span>(<span class="code-var">$digits</span>[<span class="code-num">1</span>]);
        <span class="code-keyword">return</span> <span class="code-var">$digits</span>[<span class="code-num">0</span>] . <span class="code-var">$sum</span> . <span class="code-var">$digits</span>[<span class="code-num">1</span>];
    }
                    </pre>
            </div>
            <div class="code-snippet-float p4">
                <pre>
    <span class="code-comment">// Repeated for background coverage</span>
    <span class="code-keyword">function</span> <span class="code-func">square_add</span>(<span class="code-var">$a</span>, <span class="code-var">$b</span>) {
        <span class="code-keyword">return</span> (<span class="code-var">$a</span> * <span class="code-var">$a</span>) + (<span class="code-num">2</span> * <span class="code-var">$a</span> * <span class="code-var">$b</span>) + (<span class="code-var">$b</span> * <span class="code-var">$b</span>);
    }
                    </pre>
            </div>
        </div>
        <div class="deco-circle"></div>
        <div class="deco-line"></div>

        <!-- LEFT -->
        <div class="hero-left">
            <p class="hero-tagline">Excellence is not an option,</p>
            <div class="hero-bold">
                It’s our standard.
                <span class="underline-bar"></span>
            </div>

            <p class="hero-desc">
                We deliver custom software solutions focused on performance, scalability, and innovation.
                Our support team ensures smooth communication and a seamless project experience.
                We focus on client satisfaction, long-term partnerships, and business growth.
            </p>

            <div class="hero-actions">
                <button class="btn-read-more">
                    Read More
                    <span class="arrow-icon">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14M12 5l7 7-7 7" />
                        </svg>
                    </span>
                </button>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="hero-right">
            <!-- Main photo card -->
            <div class="photo-card">
                <img id="heroSlider" src="{{ asset('assets/1.png') }}" alt="Crowns IT Software Agency - Hero Portfolio" style="transition: opacity 0.8s ease-in-out; width: 100%; height: 100%; object-fit: cover;">
            </div>

            <!-- Card: Talents -->
            <div class="card-talents">
                <div class="card-meet">Trusted</div>
                <div class="card-with">by over 100+</div>
                <div class="card-talents-num">Satisfied Clients</div>
                <div class="avatars-row">
                    <div class="avatar av1">SK</div>
                    <div class="avatar av2">MR</div>
                    <div class="avatar-plus">+</div>
                </div>
            </div>

            <!-- Card: Systems 160M -->
            <div class="card-systems">
                <div class="card-sys-label">Powering systems used by</div>
                <div class="card-sys-num">1M+</div>
                <div class="card-sys-sub">users every month</div>
            </div>

            <!-- Card: Hits 2M -->
            <div class="card-hits">
                <div class="card-hits-num">1.2M+</div>
                <div class="card-hits-label">Daily Website Traffic</div>
            </div>

            <!-- Bottom stats row -->
            <div class="card-stats-row">
                <div class="stat-mini">
                    <div class="stat-mini-label">Delivered Digital Solutions</div>
                    <div class="stat-mini-num">140+</div>
                </div>
                <div class="stat-mini">
                    <div class="stat-mini-label">Presence in Counties</div>
                    <div class="stat-mini-num">2+</div>
                </div>
                <div class="stat-mini">
                    <div class="stat-mini-label">Trusted Payment Transactions</div>
                    <div class="stat-mini-num">3M+</div>
                </div>
            </div>
        </div>
    </section>

    <section class="services-clock-section" id="services">
        <div class="section-header reveal">
            <div class="hero-tag">OUR SERVICES</div>
            <h2>We Offer Sustainable Services<br>For Your Business Growth</h2>
        </div>

        <div class="clock-container reveal">
            <div class="clock-center">
                <h3>SERVICES</h3>
                <br>
                <button class="btn-read-more">More Services</button>


            </div>

            <!-- The spinning hand -->
            <div class="clock-hand"></div>

            <!-- Card 1: 12 o'clock -->
            <div class="clock-item-wrapper pos-1">
                <a href="{{ route('services.web-app') }}" class="clock-card">
                    <div class="clock-icon"><i data-lucide="building-2"></i></div>
                    <h3>E-Commerce Services</h3>
                    <p>Everything you need to build, run, and grow an online business.</p>
                </a>
            </div>

            <!-- Card 2: 2 o'clock -->
            <div class="clock-item-wrapper pos-2">
                <a href="{{ route('services.software') }}" class="clock-card">
                    <div class="clock-icon"><i data-lucide="smartphone"></i></div>
                    <h3>Mobile App Development</h3>
                    <p>Reach customers anywhere with fast, user-friendly Android & iOS apps.</p>
                </a>
            </div>

            <!-- Card 3: 4 o'clock -->
            <div class="clock-item-wrapper pos-3">
                <a href="{{ route('services.web-dev') }}" class="clock-card">
                    <div class="clock-icon"><i data-lucide="monitor"></i></div>
                    <h3>Custom Web Platform</h3>
                    <p>Build scalable and custom web platforms tailored to your business needs.</p>
                </a>
            </div>

            <!-- Card 4: 6 o'clock -->
            <div class="clock-item-wrapper pos-4">
                <a href="{{ route('services.web-dev') }}" class="clock-card">
                    <div class="clock-icon"><i data-lucide="layout"></i></div>
                    <h3>Website Design & Dev</h3>
                    <p>Create modern, responsive websites with seamless design and development.</p>
                </a>
            </div>

            <!-- Card 5: 8 o'clock -->
            <div class="clock-item-wrapper pos-5">
                <a href="{{ route('services.marketing') }}" class="clock-card">
                    <div class="clock-icon"><i data-lucide="trending-up"></i></div>
                    <h3>Digital Marketing</h3>
                    <p>Grow your business with result-driven digital marketing strategies and campaigns.</p>
                </a>
            </div>


            <!-- Card 6: 10 o'clock -->

            <div class="clock-item-wrapper pos-6">
                <a href="{{ route('services.software') }}" class="clock-card">
                    <div class="clock-icon"><i data-lucide="cpu"></i></div>
                    <h3>Graphics Design</h3>
                    <p>Create eye-catching graphics and creative designs that strengthen your brand identity.</p>
                </a>
            </div>
        </div>
    </section>

    <!-- WHY CHOOSE US SECTION -->
    <section class="wcu-section" id="why-choose-us">
        <p class="wcu-eyebrow">Why Choose Us</p>
        <h2 class="wcu-title">Built Different, Built Better</h2>
        <p class="wcu-subtitle">We combine creativity with technology to deliver outcomes that matter.</p>

        <div class="wcu-grid-wrapper" id="wcuGridWrapper">

            <svg class="wcu-connectors" id="wcuConnectorSvg" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <filter id="wcuDotGlow" x="-80%" y="-80%" width="260%" height="260%">
                        <feGaussianBlur stdDeviation="3" result="blur" />
                        <feMerge>
                            <feMergeNode in="blur" />
                            <feMergeNode in="SourceGraphic" />
                        </feMerge>
                    </filter>
                </defs>
            </svg>

            <!-- Top-Left -->
            <div class="wcu-card" id="wcuCardTL">
                <div class="wcu-icon-wrap">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                    </svg>
                </div>
                <h3>Trusted &amp; Reliable</h3>
                <p>100% delivery commitment with full transparency throughout every project phase.</p>
            </div>

            <!-- Center -->
            <div class="wcu-center-img" id="wcuCenterImg">
                <div class="wcu-building-placeholder">
                    <svg class="wcu-building-svg" viewBox="0 0 120 160" xmlns="http://www.w3.org/2000/svg">
                        <polygon points="60,10 110,40 110,150 10,150 10,40" fill="rgba(34,197,94,0.05)"
                            stroke="rgba(34,197,94,0.4)" stroke-width="1" />
                        <g fill="rgba(34,197,94,0.5)">
                            <rect x="25" y="55" width="8" height="10" rx="1" />
                            <rect x="40" y="55" width="8" height="10" rx="1" />
                            <rect x="55" y="55" width="8" height="10" rx="1" />
                            <rect x="70" y="55" width="8" height="10" rx="1" />
                            <rect x="85" y="55" width="8" height="10" rx="1" />
                            <rect x="25" y="75" width="8" height="10" rx="1" />
                            <rect x="40" y="75" width="8" height="10" rx="1" />
                            <rect x="55" y="75" width="8" height="10" rx="1" />
                            <rect x="70" y="75" width="8" height="10" rx="1" />
                            <rect x="85" y="75" width="8" height="10" rx="1" />
                            <rect x="25" y="95" width="8" height="10" rx="1" />
                            <rect x="40" y="95" width="8" height="10" rx="1" />
                            <rect x="70" y="95" width="8" height="10" rx="1" />
                            <rect x="85" y="95" width="8" height="10" rx="1" />
                        </g>
                        <ellipse cx="60" cy="150" rx="45" ry="6" fill="rgba(34,197,94,0.15)" />
                    </svg>
                </div>
            </div>

            <!-- Top-Right -->
            <div class="wcu-card" id="wcuCardTR">
                <div class="wcu-icon-wrap">
                    <svg viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" />
                        <polyline points="12 6 12 12 16 14" />
                    </svg>
                </div>
                <h3>On-Time Delivery</h3>
                <p>We respect your deadlines and deliver pixel-perfect results on schedule every time.</p>
            </div>

            <!-- Bottom-Left -->
            <div class="wcu-card" id="wcuCardBL">
                <div class="wcu-icon-wrap">
                    <svg viewBox="0 0 24 24">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg>
                </div>
                <h3>Expert Team</h3>
                <p>15+ skilled professionals across design, development, and marketing disciplines.</p>
            </div>

            <!-- Bottom-Right -->
            <div class="wcu-card" id="wcuCardBR">
                <div class="wcu-icon-wrap">
                    <svg viewBox="0 0 24 24">
                        <polyline points="22 7 13.5 15.5 8.5 10.5 2 17" />
                        <polyline points="16 7 22 7 22 13" />
                    </svg>
                </div>
                <h3>Results Driven</h3>
                <p>Every strategy is backed by data and focused on growing your business metrics.</p>
            </div>

        </div>
    </section>

    <!-- OUR PROCESS SECTION -->
    <section class="process-section" id="process">
        <div class="process-container">
            <div class="process-header reveal">
                <div class="process-label">How we work</div>
                <h2>Our simple process</h2>
                <p>From idea to launch in 4 clear steps.</p>
            </div>

            <div class="process-timeline-wrapper reveal">
                <div class="process-timeline-line"></div>
                <div class="process-timeline-progress"></div>

                <div class="process-timeline">
                    <div class="process-step">
                        <div class="process-step-circle">
                            <div class="process-circle">1</div>
                        </div>
                        <div class="process-card">
                            <i data-lucide="search" class="process-icon"
                                style="color: var(--green); width: 40px; height: 40px; margin: 0 auto 1.5rem; display: block;"></i>
                            <h3 class="process-title">Discovery</h3>
                            <p class="process-desc">We understand your goals, audience, and requirements in
                                depth.</p>
                        </div>
                    </div>

                    <div class="process-step">
                        <div class="process-step-circle">
                            <div class="process-circle">2</div>
                        </div>
                        <div class="process-card">
                            <svg class="process-icon" viewBox="0 0 24 24" fill="none" stroke="var(--green)"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg>
                            <h3 class="process-title">Design</h3>
                            <p class="process-desc">We create wireframes and visual designs tailored to your
                                brand.</p>
                        </div>
                    </div>

                    <div class="process-step">
                        <div class="process-step-circle">
                            <div class="process-circle">3</div>
                        </div>
                        <div class="process-card">
                            <i data-lucide="code" class="process-icon"
                                style="color: var(--green); width: 40px; height: 40px; margin: 0 auto 1.5rem; display: block;"></i>
                            <h3 class="process-title">Develop</h3>
                            <p class="process-desc">Our engineers build robust, scalable solutions with clean code.</p>
                        </div>
                    </div>

                    <div class="process-step">
                        <div class="process-step-circle">
                            <div class="process-circle">4</div>
                        </div>
                        <div class="process-card">
                            <i data-lucide="rocket" class="process-icon"
                                style="color: var(--green); width: 40px; height: 40px; margin: 0 auto 1.5rem; display: block;"></i>
                            <h3 class="process-title">Launch</h3>
                            <p class="process-desc">We deploy, test, and support your project for long-term success.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- OUR PRODUCT SECTION -->
    <section class="product-section-wrapper" id="product">
        <div class="product-section-heading">
            <div class="product-heading-label">OUR PRODUCT</div>
            <p class="product-heading-sub">Our Recent Products</p>
        </div>

        <div class="product-panel">

            <!-- Tab Sidebar -->
            <div class="product-tab-sidebar">
                <div class="product-tab-icon"><i data-lucide="building-2"></i></div>
                <button class="product-tab-btn active" data-idx="0">E-commerce</button>
                <button class="product-tab-btn" data-idx="1">Letter Of credit</button>
                <button class="product-tab-btn" data-idx="2">POS System</button>
                <button class="product-tab-btn" data-idx="3">ISP Software</button>
                <button class="product-tab-btn" data-idx="4">Logo Design</button>
            </div>

            <!-- Content Area -->
            <div class="product-content-area">
                <h3 class="product-prod-title" id="prodTitle">Build And Scale Your Online Store</h3>
                <p class="product-prod-desc" id="prodDesc">E-commerce platform helps you manage inventory, process payments
                    securely, and deliver exceptional shopping experiences to your customers across all devices.</p>
                <div class="product-feature-list" id="featList">
                    <div class="product-feature-item"><span class="product-feat-dot"></span>Product & Inventory Management
                    </div>
                    <div class="product-feature-item"><span class="product-feat-dot"></span>Secure Payment Gateways</div>
                    <div class="product-feature-item"><span class="product-feat-dot"></span>Order Tracking & Analytics</div>
                </div>
                <button class="product-get-btn"><i data-lucide="chevrons-right"></i> Show More</button>
            </div>

            <!-- Preview Mockup -->
            <div class="product-preview-area">
                <div class="product-mock-screen">
                    <div class="product-mock-bar">
                        <span class="product-mock-dot"></span>
                        <span class="product-mock-dot"></span>
                        <span class="product-mock-dot"></span>
                        <span class="product-mock-label" id="mockTitle">E-Commerce</span>
                    </div>
                    <div class="product-mock-body">
                        <img id="mockImage" class="product-preview-img"
                            src="{{ asset('images/webapp_ecommerce.png') }}"
                            alt="E-Commerce Product Preview">
                    </div>
                </div>
            </div>

        </div>
    </section>

    <script>
        const productsData = [
            {
                title: "Build And Scale Your Online Store",
                desc: "E-commerce platform helps you manage inventory, process payments securely, and deliver exceptional shopping experiences to your customers across all devices.",
                features: ["Product & Inventory Management", "Secure Payment Gateways", "Order Tracking & Analytics"],
                mockTitle: "E-Commerce",
                image: "{{ asset('images/webapp_ecommerce.png') }}"
            },
            {
                title: "Simplify Trade Finance Operations",
                desc: "A complete solution for managing Letters of Credit, streamlining the documentation process, and ensuring secure international trade transactions.",
                features: ["Automated LC Processing", "Secure Document Handling", "Real-time Status Tracking"],
                mockTitle: "Trade Finance",
                image: "{{ asset('images/webapp_erp.png') }}"
            },
            {
                title: "Fast And Reliable Point Of Sale",
                desc: "Our modern POS system handles fast checkout, tracks offline and online sales, manages inventory automatically, and provides daily sales insights.",
                features: ["Fast Checkout Processing", "Real-time Inventory Sync", "Sales Reporting & Insights"],
                mockTitle: "POS System",
                image: "{{ asset('images/webapp_pos.png') }}"
            },
            {
                title: "Complete ISP Billing And Management",
                desc: "Powerful ISP management software for automated billing, bandwidth tracking, customer ticketing, and network monitoring all in one unified dashboard.",
                features: ["Automated Billing & Invoicing", "Bandwidth Management", "Customer Support Ticketing"],
                mockTitle: "ISP Admin",
                image: "{{ asset('images/uiux_systems.png') }}"
            },
            {
                title: "Memorable Logos That Define Your Brand",
                desc: "Professional logo design crafted to reflect your brand personality, stand out in the market, and work flawlessly across digital and print platforms.",
                features: ["Custom Logo Concepts", "Brand Identity Guidelines", "Vector & Print-Ready Files"],
                mockTitle: "Logo Design",
                image: "{{ asset('images/logo_design.png') }}"
            }
        ];

        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.product-tab-btn').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    document.querySelectorAll('.product-tab-btn').forEach(function (b) { b.classList.remove('active'); });
                    btn.classList.add('active');
                    var p = productsData[parseInt(btn.dataset.idx)];
                    document.getElementById('prodTitle').textContent = p.title;
                    document.getElementById('prodDesc').textContent = p.desc;
                    var fl = document.getElementById('featList');
                    fl.innerHTML = p.features.map(function (f) {
                        return '<div class="product-feature-item"><span class="product-feat-dot"></span>' + f + '</div>';
                    }).join('');
                    document.getElementById('mockTitle').textContent = p.mockTitle;
                    var mockImg = document.getElementById('mockImage');
                    mockImg.style.opacity = '0';
                    setTimeout(function () {
                        mockImg.src = p.image;
                        mockImg.alt = p.mockTitle + ' Product Preview';
                        mockImg.style.opacity = '1';
                    }, 200);

                    // Re-initialize Lucide icons if dynamically inserted
                    if (window.lucide) {
                        window.lucide.createIcons();
                    }
                });
            });
        });
    </script>

    <!-- OUR TECHNOLOGY SECTION -->
    <section class="tech-section" id="technology">
        <div class="tech-section-heading">
            <p class="tech-eyebrow">Our Technology</p>
            <h2 class="tech-title">Technologies We Use</h2>
        </div>

        <div class="tech-marquee-wrapper">
            <!-- Top Row (Right to Left) -->
            <div class="tech-marquee tech-marquee-left">
                <div class="tech-marquee-track">
                    <!-- Items must be duplicated to loop seamlessly -->
                    <div class="tech-card"><i class="devicon-php-plain colored"></i><span>PHP</span></div>
                    <div class="tech-card"><i class="devicon-laravel-plain colored"></i><span>LARAVEL</span></div>
                    <div class="tech-card"><i class="devicon-wordpress-plain colored"></i><span>WORDPRESS</span></div>
                    <div class="tech-card"><i class="devicon-react-original colored"></i><span>REACT JS</span></div>
                    <div class="tech-card"><i class="devicon-vuejs-plain colored"></i><span>VUE JS</span></div>
                    <div class="tech-card"><i class="devicon-nodejs-plain colored"></i><span>NODE JS</span></div>
                    <div class="tech-card"><i class="devicon-python-plain colored"></i><span>PYTHON</span></div>
                    <div class="tech-card"><i class="devicon-mysql-plain colored"></i><span>MYSQL</span></div>
                    <!-- Duplicates -->
                    <div class="tech-card"><i class="devicon-php-plain colored"></i><span>PHP</span></div>
                    <div class="tech-card"><i class="devicon-laravel-plain colored"></i><span>LARAVEL</span></div>
                    <div class="tech-card"><i class="devicon-wordpress-plain colored"></i><span>WORDPRESS</span></div>
                    <div class="tech-card"><i class="devicon-react-original colored"></i><span>REACT JS</span></div>
                    <div class="tech-card"><i class="devicon-vuejs-plain colored"></i><span>VUE JS</span></div>
                    <div class="tech-card"><i class="devicon-nodejs-plain colored"></i><span>NODE JS</span></div>
                    <div class="tech-card"><i class="devicon-python-plain colored"></i><span>PYTHON</span></div>
                    <div class="tech-card"><i class="devicon-mysql-plain colored"></i><span>MYSQL</span></div>
                </div>
            </div>

            <!-- Bottom Row (Left to Right) -->
            <div class="tech-marquee tech-marquee-right">
                <div class="tech-marquee-track reverse">
                    <!-- Items must be duplicated to loop seamlessly -->
                    <div class="tech-card"><i class="devicon-android-plain colored"></i><span>ANDROID</span></div>
                    <div class="tech-card"><i class="devicon-apple-original"></i><span>APPLE IOS</span></div>
                    <div class="tech-card"><i class="devicon-html5-plain colored"></i><span>HTML5</span></div>
                    <div class="tech-card"><i class="devicon-css3-plain colored"></i><span>CSS3</span></div>
                    <div class="tech-card"><i class="devicon-tailwindcss-plain colored"></i><span>TAILWIND</span></div>
                    <div class="tech-card"><i class="devicon-javascript-plain colored"></i><span>JAVASCRIPT</span></div>
                    <div class="tech-card"><i class="devicon-typescript-plain colored"></i><span>TYPESCRIPT</span></div>
                    <div class="tech-card"><i class="devicon-figma-plain colored"></i><span>FIGMA</span></div>
                    <!-- Duplicates -->
                    <div class="tech-card"><i class="devicon-android-plain colored"></i><span>ANDROID</span></div>
                    <div class="tech-card"><i class="devicon-apple-original"></i><span>APPLE IOS</span></div>
                    <div class="tech-card"><i class="devicon-html5-plain colored"></i><span>HTML5</span></div>
                    <div class="tech-card"><i class="devicon-css3-plain colored"></i><span>CSS3</span></div>
                    <div class="tech-card"><i class="devicon-tailwindcss-plain colored"></i><span>TAILWIND</span></div>
                    <div class="tech-card"><i class="devicon-javascript-plain colored"></i><span>JAVASCRIPT</span></div>
                    <div class="tech-card"><i class="devicon-typescript-plain colored"></i><span>TYPESCRIPT</span></div>
                    <div class="tech-card"><i class="devicon-figma-plain colored"></i><span>FIGMA</span></div>
                </div>
            </div>
        </div>
    </section>

    <!-- OUR TEAM SECTION -->
    <section class="team-section" id="team">
        <p class="team-eyebrow">Our Team</p>
        <h2 class="team-title">Meet the Experts</h2>
        <p class="team-subtitle">The dedicated professionals behind our success.</p>

        <div class="team-grid-wrapper">

            <!-- Card 1 -->
            <div class="team-card bg-1">
                <div class="team-avatar">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=200&auto=format&fit=crop"
                        alt="Team Member">
                </div>
                <h3>John Doe</h3>
                <p class="designation">CEO & Founder</p>
                <p>Visionary leader with 15+ years of experience in driving digital innovation and corporate strategy.</p>
            </div>

            <!-- Center Image -->
            <div class="team-center-img-wrapper">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=800&auto=format&fit=crop"
                    alt="Company Team">
            </div>

            <!-- Card 2 -->
            <div class="team-card bg-2">
                <div class="team-avatar">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=200&auto=format&fit=crop"
                        alt="Team Member">
                </div>
                <h3>Jane Smith</h3>
                <p class="designation">Lead Developer</p>
                <p>Expert in scalable architecture, cloud computing, and modern web technologies.</p>
            </div>

            <!-- Card 3 -->
            <div class="team-card bg-3">
                <div class="team-avatar">
                    <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?q=80&w=200&auto=format&fit=crop"
                        alt="Team Member">
                </div>
                <h3>Mike Johnson</h3>
                <p class="designation">UI/UX Designer</p>
                <p>Crafting intuitive and beautiful user experiences with pixel-perfect precision.</p>
            </div>

            <!-- Card 4 -->
            <div class="team-card bg-4">
                <div class="team-avatar">
                    <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?q=80&w=200&auto=format&fit=crop"
                        alt="Team Member">
                </div>
                <h3>Emily Davis</h3>
                <p class="designation">Marketing Manager</p>
                <p>Driving growth through data-driven digital marketing strategies and SEO expertise.</p>
            </div>

            <!-- Card 5 -->
            <div class="team-card bg-5">
                <div class="team-avatar">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=200&auto=format&fit=crop"
                        alt="Team Member">
                </div>
                <h3>David Wilson</h3>
                <p class="designation">Project Manager</p>
                <p>Ensuring smooth agile deliveries and seamless communication across all client projects.</p>
            </div>

        </div>
    </section>

    <!-- TESTIMONIALS SECTION -->
    <section class="testi-section" id="testimonials">
        <div class="testi-heading">
            <p class="testi-eyebrow">TESTIMONIALS</p>
            <h2 class="testi-title">What Our Clients Say</h2>
        </div>

        <div class="testi-marquee-wrapper">
            <!-- Top Row (Left to Right) -->
            <div class="testi-marquee">
                <div class="testi-marquee-track testi-to-right">
                    <!-- Item 1 -->
                    <div class="testi-card">
                        <div class="testi-user">
                            <div class="testi-avatar" style="background:#3b82f6">M</div>
                            <div class="testi-info">
                                <h4>Marcus Lee</h4>
                                <span>Social Media Manager</span>
                            </div>
                        </div>
                        <div class="testi-stars">★★★★★</div>
                        <p>"As a professional managing multiple accounts, I rely on Crowns IT for consistent growth. Their
                            service is secure, fast and never triggers flags."</p>
                    </div>
                    <!-- Item 2 -->
                    <div class="testi-card">
                        <div class="testi-user">
                            <div class="testi-avatar" style="background:#ef4444">D</div>
                            <div class="testi-info">
                                <h4>Diego Costa</h4>
                                <span>Business Owner</span>
                            </div>
                        </div>
                        <div class="testi-stars">★★★★</div>
                        <p>"Used Crowns IT for our promo video. Got 10K+ views overnight, which helped us trend locally.
                            Customer support was responsive and faster than promised!"</p>
                    </div>
                    <!-- Item 3 -->
                    <div class="testi-card">
                        <div class="testi-user">
                            <div class="testi-avatar" style="background:#d946ef">A</div>
                            <div class="testi-info">
                                <h4>Aisha Johnson</h4>
                                <span>Lifestyle Blogger</span>
                            </div>
                        </div>
                        <div class="testi-stars">★★★★★</div>
                        <p>"Needed a confidence boost for my new account—Crowns IT's views made my content look popular
                            instantly. No drop-offs!"</p>
                    </div>
                    <!-- Item 4 -->
                    <div class="testi-card">
                        <div class="testi-user">
                            <div class="testi-avatar" style="background:#10b981">E</div>
                            <div class="testi-info">
                                <h4>Emma Thompson</h4>
                                <span>Instagram Influencer</span>
                            </div>
                        </div>
                        <div class="testi-stars">★★★★★</div>
                        <p>"I needed a quick boost to kickstart my new account, and Crowns IT delivered real-looking followers
                            within minutes. Highly recommend for creators!"</p>
                    </div>

                    <!-- Duplicates -->
                    <div class="testi-card">
                        <div class="testi-user">
                            <div class="testi-avatar" style="background:#3b82f6">M</div>
                            <div class="testi-info">
                                <h4>Marcus Lee</h4>
                                <span>Social Media Manager</span>
                            </div>
                        </div>
                        <div class="testi-stars">★★★★★</div>
                        <p>"As a professional managing multiple accounts, I rely on Crowns IT for consistent growth. Their
                            service is secure, fast and never triggers flags."</p>
                    </div>
                    <div class="testi-card">
                        <div class="testi-user">
                            <div class="testi-avatar" style="background:#ef4444">D</div>
                            <div class="testi-info">
                                <h4>Diego Costa</h4>
                                <span>Business Owner</span>
                            </div>
                        </div>
                        <div class="testi-stars">★★★★</div>
                        <p>"Used Crowns IT for our promo video. Got 10K+ views overnight, which helped us trend locally.
                            Customer support was responsive and faster than promised!"</p>
                    </div>
                    <div class="testi-card">
                        <div class="testi-user">
                            <div class="testi-avatar" style="background:#d946ef">A</div>
                            <div class="testi-info">
                                <h4>Aisha Johnson</h4>
                                <span>Lifestyle Blogger</span>
                            </div>
                        </div>
                        <div class="testi-stars">★★★★★</div>
                        <p>"Needed a confidence boost for my new account—Crowns IT's views made my content look popular
                            instantly. No drop-offs!"</p>
                    </div>
                    <div class="testi-card">
                        <div class="testi-user">
                            <div class="testi-avatar" style="background:#10b981">E</div>
                            <div class="testi-info">
                                <h4>Emma Thompson</h4>
                                <span>Instagram Influencer</span>
                            </div>
                        </div>
                        <div class="testi-stars">★★★★★</div>
                        <p>"I needed a quick boost to kickstart my new account, and Crowns IT delivered real-looking followers
                            within minutes. Highly recommend for creators!"</p>
                    </div>
                </div>
            </div>

            <!-- Bottom Row (Right to Left) -->
            <div class="testi-marquee">
                <div class="testi-marquee-track testi-to-left">
                    <!-- Item 5 -->
                    <div class="testi-card">
                        <div class="testi-user">
                            <div class="testi-avatar" style="background:#f59e0b">S</div>
                            <div class="testi-info">
                                <h4>Sophie Laurent</h4>
                                <span>Fashion Creator</span>
                            </div>
                        </div>
                        <div class="testi-stars">★★★★★</div>
                        <p>"Crowns IT's Instagram likes saved my campaign! My engagement metrics looked strong for brand deals,
                            and the likes came from real profiles."</p>
                    </div>
                    <!-- Item 6 -->
                    <div class="testi-card">
                        <div class="testi-user">
                            <div class="testi-avatar" style="background:#f43f5e">P</div>
                            <div class="testi-info">
                                <h4>Priya Sharma</h4>
                                <span>Marketing Manager</span>
                            </div>
                        </div>
                        <div class="testi-stars">★★★★★</div>
                        <p>"Bought Instagram likes for our product launch campaign—results were instant! The likes looked
                            genuine, and our post visibility soared."</p>
                    </div>
                    <!-- Item 7 -->
                    <div class="testi-card">
                        <div class="testi-user">
                            <div class="testi-avatar" style="background:#8b5cf6">T</div>
                            <div class="testi-info">
                                <h4>Tomás Rivera</h4>
                                <span>Soccer Player</span>
                            </div>
                        </div>
                        <div class="testi-stars">★★★★</div>
                        <p>"After going viral once, I used Crowns IT to maintain momentum with extra TikTok views. My follower
                            count doubled, and scouts actually reached out!"</p>
                    </div>
                    <!-- Item 8 -->
                    <div class="testi-card">
                        <div class="testi-user">
                            <div class="testi-avatar" style="background:#06b6d4">C</div>
                            <div class="testi-info">
                                <h4>Chloe Dubois</h4>
                                <span>Makeup Artist</span>
                            </div>
                        </div>
                        <div class="testi-stars">★★★★★</div>
                        <p>"My makeup reels weren't getting traction until I tried Crowns IT's TikTok followers. Gained 5K
                            real-seeming followers in a day—clients noticed!"</p>
                    </div>

                    <!-- Duplicates -->
                    <div class="testi-card">
                        <div class="testi-user">
                            <div class="testi-avatar" style="background:#f59e0b">S</div>
                            <div class="testi-info">
                                <h4>Sophie Laurent</h4>
                                <span>Fashion Creator</span>
                            </div>
                        </div>
                        <div class="testi-stars">★★★★★</div>
                        <p>"Crowns IT's Instagram likes saved my campaign! My engagement metrics looked strong for brand deals,
                            and the likes came from real profiles."</p>
                    </div>
                    <div class="testi-card">
                        <div class="testi-user">
                            <div class="testi-avatar" style="background:#f43f5e">P</div>
                            <div class="testi-info">
                                <h4>Priya Sharma</h4>
                                <span>Marketing Manager</span>
                            </div>
                        </div>
                        <div class="testi-stars">★★★★★</div>
                        <p>"Bought Instagram likes for our product launch campaign—results were instant! The likes looked
                            genuine, and our post visibility soared."</p>
                    </div>
                    <div class="testi-card">
                        <div class="testi-user">
                            <div class="testi-avatar" style="background:#8b5cf6">T</div>
                            <div class="testi-info">
                                <h4>Tomás Rivera</h4>
                                <span>Soccer Player</span>
                            </div>
                        </div>
                        <div class="testi-stars">★★★★</div>
                        <p>"After going viral once, I used Crowns IT to maintain momentum with extra TikTok views. My follower
                            count doubled, and scouts actually reached out!"</p>
                    </div>
                    <div class="testi-card">
                        <div class="testi-user">
                            <div class="testi-avatar" style="background:#06b6d4">C</div>
                            <div class="testi-info">
                                <h4>Chloe Dubois</h4>
                                <span>Makeup Artist</span>
                            </div>
                        </div>
                        <div class="testi-stars">★★★★★</div>
                        <p>"My makeup reels weren't getting traction until I tried Crowns IT's TikTok followers. Gained 5K
                            real-seeming followers in a day—clients noticed!"</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function drawWcuConnectors() {
            const wrapper = document.getElementById('wcuGridWrapper');
            const svg = document.getElementById('wcuConnectorSvg');
            const circle = document.getElementById('wcuCenterImg');

            if (!wrapper || !svg || !circle) return;

            const wRect = wrapper.getBoundingClientRect();
            const cRect = circle.getBoundingClientRect();

            // Circle centre & radius relative to wrapper
            const cx = cRect.left - wRect.left + cRect.width / 2;
            const cy = cRect.top - wRect.top + cRect.height / 2;
            const cr = cRect.width / 2;

            // Remove old drawings
            svg.querySelectorAll('.conn').forEach(el => el.remove());

            function ns(tag) { return document.createElementNS('http://www.w3.org/2000/svg', tag); }

            function addConnector(cardId, edge) {
                const cardEl = document.getElementById(cardId);
                if (!cardEl) return;
                const rect = cardEl.getBoundingClientRect();
                const rx = rect.left - wRect.left;
                const ry = rect.top - wRect.top;
                const rw = rect.width;
                const rh = rect.height;

                // Start point on card edge (horizontal midpoint of that side)
                let x1, y1;
                if (edge === 'right') { x1 = rx + rw; y1 = ry + rh / 2; }
                else { x1 = rx; y1 = ry + rh / 2; }

                // Angle toward circle centre
                const angle = Math.atan2(y1 - cy, x1 - cx);
                // End point on circle border
                const x2 = cx + Math.cos(angle) * cr;
                const y2 = cy + Math.sin(angle) * cr;

                // Dashed line
                const line = ns('line');
                line.setAttribute('x1', x1); line.setAttribute('y1', y1);
                line.setAttribute('x2', x2); line.setAttribute('y2', y2);
                line.setAttribute('stroke', 'rgba(34,197,94,0.4)');
                line.setAttribute('stroke-width', '1.5');
                line.setAttribute('stroke-dasharray', '5 4');
                line.setAttribute('class', 'conn');
                svg.appendChild(line);

                // Dot on card edge
                const d1 = ns('circle');
                d1.setAttribute('cx', x1); d1.setAttribute('cy', y1); d1.setAttribute('r', '5');
                d1.setAttribute('fill', '#22c55e');
                d1.setAttribute('filter', 'url(#wcuDotGlow)');
                d1.setAttribute('class', 'conn');
                svg.appendChild(d1);

                // Dot on circle edge
                const d2 = ns('circle');
                d2.setAttribute('cx', x2); d2.setAttribute('cy', y2); d2.setAttribute('r', '5');
                d2.setAttribute('fill', '#22c55e');
                d2.setAttribute('filter', 'url(#wcuDotGlow)');
                d2.setAttribute('class', 'conn');
                svg.appendChild(d2);
            }

            // Check if mobile (where connectors are hidden by CSS)
            if (window.innerWidth > 992) {
                addConnector('wcuCardTL', 'right');
                addConnector('wcuCardBL', 'right');
                addConnector('wcuCardTR', 'left');
                addConnector('wcuCardBR', 'left');
            }
        }

        window.addEventListener('load', drawWcuConnectors);
        window.addEventListener('resize', drawWcuConnectors);
        setTimeout(drawWcuConnectors, 400);

        // Hero Image Slider
        document.addEventListener('DOMContentLoaded', function() {
            const images = [
                "{{ asset('assets/1.png') }}",
                "{{ asset('assets/2.png') }}",
                "{{ asset('assets/3.png') }}"
            ];
            let currentIndex = 0;
            const heroImg = document.getElementById('heroSlider');
            
            if (heroImg) {
                setInterval(() => {
                    heroImg.style.opacity = 0;
                    setTimeout(() => {
                        currentIndex = (currentIndex + 1) % images.length;
                        heroImg.src = images[currentIndex];
                        heroImg.style.opacity = 1;
                    }, 800); // Wait for fade out
                }, 3000); // Change every 3 seconds
            }
        });
    </script>


@endsection