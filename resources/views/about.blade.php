@extends('layouts.app')

@section('title', 'About Crowns IT | Top Software Company & Development Agency')
@section('meta_description', 'Learn about Crowns IT (Crown IT) — a premium software company and best software agency delivering bespoke custom web applications, web development, UI/UX, and marketing solutions.')

@section('content')
    <!-- Hero -->
    <section class="about-hero">
        <div class="about-hero-inner reveal">
            <span class="about-eyebrow">About Crowns IT</span>
            <h1>Building Digital Solutions That <span>Drive Real Growth</span></h1>
            <p>Crowns IT is a full-service software agency committed to excellence, innovation, and long-term partnerships. We design and build technology that helps businesses scale with confidence — from startups to established enterprises across Bangladesh and beyond.</p>
            <div class="hero-actions" style="margin-top: 2rem; justify-content: center;">
                <a href="{{ url('/') }}#services" class="btn-read-more">Explore Services <i data-lucide="arrow-right"></i></a>
                <a href="mailto:info@crownsit.com" class="btn-read-more" style="background: #fff; color: var(--navy); box-shadow: 0 4px 20px rgba(0,0,0,0.08); border: 1px solid rgba(34,197,94,0.2);">Contact Us</a>
            </div>
        </div>
    </section>

    <!-- Company Story -->
    <section class="webapp-split-section">
        <div class="split-container">
            <div class="split-text reveal">
                <h2>Who We <span style="color: var(--green);">Are</span></h2>
                <p>Crowns IT was founded with a simple belief: every business deserves world-class digital solutions without compromise. What started as a small team of passionate developers and designers has grown into a trusted partner for 100+ satisfied clients, delivering 140+ digital products that power millions of users every month.</p>
                <p>We combine technical expertise with creative thinking to solve real business problems. Whether you need a custom e-commerce platform, enterprise software, a stunning brand identity, or a data-driven marketing campaign — we bring the same level of dedication to every project.</p>
                <ul class="features-list">
                    <li><i data-lucide="check-circle-2"></i> <strong>Client-First Approach:</strong> Your goals shape every decision we make</li>
                    <li><i data-lucide="check-circle-2"></i> <strong>Transparent Communication:</strong> Regular updates and clear timelines</li>
                    <li><i data-lucide="check-circle-2"></i> <strong>Quality Without Shortcuts:</strong> Clean code, modern design, rigorous testing</li>
                    <li><i data-lucide="check-circle-2"></i> <strong>Long-Term Support:</strong> We stay with you after launch</li>
                </ul>
            </div>
            <div class="split-image reveal">
                <div class="tab-image">
                    <img src="{{ asset('assets/1.png') }}" alt="Crowns IT team crafting digital solutions" loading="lazy">
                </div>
            </div>
        </div>
    </section>

    <!-- Stats -->
    <section class="about-stats-section">
        <div class="about-stats-grid reveal">
            <div class="about-stat-card">
                <strong>100+</strong>
                <span>Satisfied Clients</span>
            </div>
            <div class="about-stat-card">
                <strong>140+</strong>
                <span>Projects Delivered</span>
            </div>
            <div class="about-stat-card">
                <strong>1M+</strong>
                <span>Monthly Active Users</span>
            </div>
            <div class="about-stat-card">
                <strong>3M+</strong>
                <span>Payment Transactions Processed</span>
            </div>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="about-mvv-section">
        <div class="about-section-head reveal">
            <span class="about-eyebrow">Our Purpose</span>
            <h2>Mission, Vision & <span style="color: var(--green);">Values</span></h2>
        </div>
        <div class="about-mvv-grid reveal">
            <div class="about-mvv-card">
                <div class="about-mvv-icon"><i data-lucide="target"></i></div>
                <h3>Our Mission</h3>
                <p>To empower businesses with reliable, scalable, and innovative digital solutions that create measurable impact — helping our clients grow faster, operate smarter, and compete globally.</p>
            </div>
            <div class="about-mvv-card">
                <div class="about-mvv-icon"><i data-lucide="eye"></i></div>
                <h3>Our Vision</h3>
                <p>To become the most trusted software agency in South Asia, recognized for technical excellence, creative design, and unwavering commitment to client success.</p>
            </div>
            <div class="about-mvv-card">
                <div class="about-mvv-icon"><i data-lucide="heart-handshake"></i></div>
                <h3>Our Values</h3>
                <p>Integrity, innovation, accountability, and collaboration guide everything we do. We treat every project as our own and every client relationship as a partnership built on trust.</p>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section class="about-services-section" id="about-services">
        <div class="about-section-head reveal">
            <span class="about-eyebrow">What We Do</span>
            <h2>Our <span style="color: var(--green);">Services</span></h2>
            <p class="about-section-sub">End-to-end digital services tailored to your business needs — from concept to launch and beyond.</p>
        </div>
        <div class="about-services-grid reveal">
            <a href="{{ route('services.web-app') }}" class="about-service-card">
                <div class="about-service-icon"><i class="fa-solid fa-laptop-code"></i></div>
                <h3>Web Application</h3>
                <p>Custom cloud-based applications — E-commerce, POS, ISP billing, ERP, and more — built for performance and scale.</p>
                <span class="about-service-link">Learn more <i data-lucide="arrow-right"></i></span>
            </a>
            <a href="{{ route('services.web-dev') }}" class="about-service-card">
                <div class="about-service-icon"><i class="fa-solid fa-code"></i></div>
                <h3>Web Development</h3>
                <p>Modern, responsive, SEO-optimized websites — corporate sites, landing pages, blogs, and portals that convert visitors into customers.</p>
                <span class="about-service-link">Learn more <i data-lucide="arrow-right"></i></span>
            </a>
            <a href="{{ route('services.software') }}" class="about-service-card">
                <div class="about-service-icon"><i class="fa-solid fa-gears"></i></div>
                <h3>Custom Software</h3>
                <p>Tailored enterprise software solutions designed around your unique workflows, integrations, and business logic.</p>
                <span class="about-service-link">Learn more <i data-lucide="arrow-right"></i></span>
            </a>
            <a href="{{ route('services.marketing') }}" class="about-service-card">
                <div class="about-service-icon"><i class="fa-solid fa-bullhorn"></i></div>
                <h3>Digital Marketing</h3>
                <p>SEO, social media, paid ads, and content strategies that grow your brand visibility and drive qualified leads.</p>
                <span class="about-service-link">Learn more <i data-lucide="arrow-right"></i></span>
            </a>
            <a href="{{ route('services.graphics') }}" class="about-service-card">
                <div class="about-service-icon"><i class="fa-solid fa-palette"></i></div>
                <h3>Graphics Design</h3>
                <p>Professional photo editing, logo design, brand visuals, and creative assets that make your business stand out.</p>
                <span class="about-service-link">Learn more <i data-lucide="arrow-right"></i></span>
            </a>
            <a href="{{ route('services.ui-ux') }}" class="about-service-card">
                <div class="about-service-icon"><i class="fa-solid fa-crop-simple"></i></div>
                <h3>UI/UX Design</h3>
                <p>User-centered interface design, wireframes, prototypes, and design systems that deliver intuitive digital experiences.</p>
                <span class="about-service-link">Learn more <i data-lucide="arrow-right"></i></span>
            </a>
        </div>
    </section>

    <!-- Payment -->
    {{-- <section class="about-payment-section" id="payment">
        <div class="split-container">
            <div class="split-text reveal">
                <span class="about-eyebrow">Payment & Billing</span>
                <h2>Simple, Secure & <span style="color: var(--green);">Transparent Payments</span></h2>
                <p>We believe in honest pricing with no hidden fees. Every project begins with a clear proposal outlining scope, timeline, and cost — so you know exactly what you're investing in before we write a single line of code.</p>
                <ul class="features-list">
                    <li><i data-lucide="check-circle-2"></i> <strong>Milestone-Based Billing:</strong> Pay in stages as project phases are completed and approved</li>
                    <li><i data-lucide="check-circle-2"></i> <strong>Flexible Payment Methods:</strong> Bank transfer, bKash, Nagad, Rocket, and international wire transfer</li>
                    <li><i data-lucide="check-circle-2"></i> <strong>Detailed Invoices:</strong> Every payment comes with a professional invoice for your records</li>
                    <li><i data-lucide="check-circle-2"></i> <strong>Secure Transactions:</strong> All payment data handled with industry-standard security practices</li>
                </ul>
            </div>
            <div class="reveal">
                <div class="about-payment-cards">
                    <div class="about-payment-card">
                        <div class="about-payment-step">01</div>
                        <h4>Free Consultation</h4>
                        <p>Share your requirements. We analyze your needs and provide a tailored proposal with transparent pricing — completely free, no obligation.</p>
                    </div>
                    <div class="about-payment-card">
                        <div class="about-payment-step">02</div>
                        <h4>Agreement & Deposit</h4>
                        <p>Once approved, sign the project agreement and pay an initial deposit (typically 30–50%) to kick off development.</p>
                    </div>
                    <div class="about-payment-card">
                        <div class="about-payment-step">03</div>
                        <h4>Milestone Payments</h4>
                        <p>Remaining balance is split across key milestones — design approval, development completion, testing, and final delivery.</p>
                    </div>
                    <div class="about-payment-card">
                        <div class="about-payment-step">04</div>
                        <h4>Launch & Support</h4>
                        <p>Final payment upon successful launch. Optional maintenance and support packages available on monthly or yearly plans.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="about-payment-methods reveal">
            <h3>Accepted Payment Methods</h3>
            <div class="about-payment-badges">
                <span><i class="fa-solid fa-building-columns"></i> Bank Transfer</span>
                <span><i class="fa-solid fa-mobile-screen"></i> bKash</span>
                <span><i class="fa-solid fa-mobile-screen"></i> Nagad</span>
                <span><i class="fa-solid fa-mobile-screen"></i> Rocket</span>
                <span><i class="fa-solid fa-globe"></i> International Wire</span>
                <span><i class="fa-solid fa-credit-card"></i> Card Payment</span>
            </div>
            <p class="about-payment-note">For recurring services like digital marketing or graphics design, we offer flexible monthly billing cycles. Contact us for a custom quote tailored to your budget.</p>
        </div> 
    </section> --}}

    <!-- Why Choose Us -->
    <section class="about-why-section">
        <div class="about-section-head reveal">
            <span class="about-eyebrow">Why Crowns IT</span>
            <h2>What Makes Us <span style="color: var(--green);">Different</span></h2>
        </div>
        <div class="about-why-grid reveal">
            <div class="about-why-card">
                <i data-lucide="zap"></i>
                <h4>Fast Delivery</h4>
                <p>Agile workflows and experienced teams ensure your project moves from idea to launch without unnecessary delays.</p>
            </div>
            <div class="about-why-card">
                <i data-lucide="shield-check"></i>
                <h4>Reliable & Secure</h4>
                <p>We follow best practices in security, data protection, and code quality to keep your business safe.</p>
            </div>
            <div class="about-why-card">
                <i data-lucide="users"></i>
                <h4>Dedicated Team</h4>
                <p>A dedicated project manager and specialist team assigned to your project from start to finish.</p>
            </div>
            <div class="about-why-card">
                <i data-lucide="headphones"></i>
                <h4>24/7 Support</h4>
                <p>Our support team is available around the clock to resolve issues and keep your systems running smoothly.</p>
            </div>
            <div class="about-why-card">
                <i data-lucide="trending-up"></i>
                <h4>Scalable Solutions</h4>
                <p>Architecture designed to grow with your business — handle more users, traffic, and features over time.</p>
            </div>
            <div class="about-why-card">
                <i data-lucide="badge-check"></i>
                <h4>Proven Track Record</h4>
                <p>140+ successful projects, 99.8% client satisfaction, and systems trusted by 1M+ users monthly.</p>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="about-cta-section">
        <div class="about-cta-inner reveal">
            <h2>Ready to Start Your Next Project?</h2>
            <p>Let's discuss your ideas and build something extraordinary together. Get a free consultation and transparent quote today.</p>
            <div class="hero-actions" style="justify-content: center; margin-top: 1.5rem;">
                <a href="mailto:info@crownsit.com" class="btn-read-more">Get Free Quote <i data-lucide="arrow-right"></i></a>
            </div>
        </div>
    </section>
@endsection
