@extends('layouts.app')

@php
    $sections = $sections ?? collect();
    $getImageUrl = fn ($slug, $fallback) => optional($sections->get($slug))->image_url ?? $fallback;
    $getAltText = fn ($slug, $fallback) => optional($sections->get($slug))->alt_text ?? $fallback;
@endphp

@section('title', 'Premium UI/UX Design & Wireframing | Crowns IT Software Agency')
@section('meta_description', 'Get expert UI/UX design services from Crowns IT (Crown IT) - the best software company and product design agency. We create user-centric wireframes and Figma prototypes.')

@section('content')
    <!-- Hero Section -->
    <section class="uiux-hero">
        <div class="uiux-hero-content reveal" style="color: black;">
            <span class="uiux-hero-tag">UI/UX Design Studio</span>
            <h1>Intuitive & Beautiful <span>UI/UX Design</span></h1>
            <p>We craft high-fidelity user experiences and stunning visual interfaces that captivate users, simplify complex workflows, and dramatically accelerate product engagement. Turn your ideas into beautiful, interactive realities.</p>
            <div class="hero-actions" style="margin-top: 2rem; justify-content: center;">
                <a href="{{ url('/') }}#contact" class="btn-read-more" aria-label="Request a custom UI/UX mockup">Get Free Design Audit <i data-lucide="arrow-right"></i></a>
            </div>
            <div class="uiux-hero-stats">
                <div class="uiux-hero-stat">
                    <h4>Research-driven Interfaces</h4>
                    <p>User journeys designed from real behavior, not assumptions.</p>
                </div>
                <div class="uiux-hero-stat">
                    <h4>Clickable Prototypes</h4>
                    <p>Validate flows with interactive Figma prototypes before development.</p>
                </div>
                <div class="uiux-hero-stat">
                    <h4>Conversion-focused UI</h4>
                    <p>Modern visuals created to boost trust, clarity and engagement.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Split Intro Section -->
    <section class="webapp-split-section">
        <div class="split-container">
            <div class="split-text reveal">
                <h2>Designed for Emotion, <span>Engineered for Conversion</span></h2>
                <p>At Crowns IT, we believe great design is invisible. We combine deep user behavioral research with sleek, modern aesthetics to design interfaces that not only look spectacular but feel incredibly natural and intuitive to navigate.</p>
                <ul class="features-list">
                    <li><i data-lucide="heart"></i> <strong>User-Centered Strategy:</strong> Designs rooted in actual customer empathy, behavior maps, and interviews.</li>
                    <li><i data-lucide="palette"></i> <strong>Premium Aesthetic Identity:</strong> Curated Outfit typography, elegant color harmonies, and flawless layouts.</li>
                    <li><i data-lucide="zap"></i> <strong>Interactive Clickable Prototypes:</strong> Experience the look, feel, and flow of your system in Figma before a single line of code is written.</li>
                    <li><i data-lucide="layers"></i> <strong>Scalable Design Systems:</strong> Reusable atomic components and styles that guarantee long-term brand consistency.</li>
                </ul>
                <div class="uiux-highlights">
                    <div class="highlight-card">
                        <h4>Experience-first journeys</h4>
                        <p>Wireframes and flows designed to reduce friction and delight users at every step.</p>
                    </div>
                    <div class="highlight-card">
                        <h4>Design systems that scale</h4>
                        <p>Component libraries and visual rules that make your product cohesive and easy to maintain.</p>
                    </div>
                    <div class="highlight-card">
                        <h4>Rounded-to-perfection visuals</h4>
                        <p>High-fidelity interfaces that look sharp across desktop, mobile, and tablet screens.</p>
                    </div>
                </div>
            </div>
            <div class="split-image reveal">
                <div class="tab-image">
                    <img src="{{ $getImageUrl('split_image', asset('images/webapp_side_img.png')) }}" alt="{{ $getAltText('split_image', 'UI/UX Design High-Fidelity App Wireframe and Design Tokens') }}" loading="lazy">
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Showcase Banner Section -->
    <section class="webapp-stats-showcase">
        <div class="stats-header reveal" style="text-align: center; margin-bottom: 3.5rem;">
            <h2 style="font-size: clamp(2rem, 3.5vw, 3rem); font-weight: 800; color: #1e293b; margin-bottom: 1rem;">Crafting Visual <span>Masterpieces</span></h2>
            <p style="color: #64748b; font-size: 1.1rem; max-width: 800px; margin: 0 auto; line-height: 1.6;">Our human-centered interfaces enhance brand value, delight users, and drive maximum retention across mobile and web platforms.</p>
        </div>
        <div class="stats-banner-container reveal">
            <div class="stats-banner-grid">
                <!-- Left Capsule (Abstract Shape) -->
                <div class="stats-capsule stats-visual-purple">
                    <div class="scroll-shape"></div>
                </div>

                <!-- Arch 1: Usability Stats -->
                <div class="stats-arch stats-arch-purple">
                    <div class="stats-arch-content">
                        <h3>98%</h3>
                        <h4>User Satisfaction Rate</h4>
                        <p>We systematically test our layouts with real users to ensure perfect usability.</p>
                    </div>
                </div>

                <!-- Center Capsule: Design tool illustration -->
                <div class="stats-capsule stats-developer-img">
                    <img src="{{ $getImageUrl('stats_center_image', asset('images/webapp_ecommerce.png')) }}" alt="{{ $getAltText('stats_center_image', 'Premium interactive E-Commerce design interface mockup') }}" loading="lazy">
                </div>

                <!-- Arch 2: Mockups Stats -->
                <div class="stats-arch stats-arch-blue">
                    <div class="stats-arch-content">
                        <h3>200+</h3>
                        <h4>Visual Mockups Delivered</h4>
                        <p>Designing modern, responsive layouts for SaaS, mobile apps, and corporate brands.</p>
                    </div>
                </div>

                <!-- Right Capsule (Abstract Shape) -->
                <div class="stats-capsule stats-visual-blue">
                    <div class="ribbon-shape"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- UI/UX Solutions Tabs Section -->
    <section class="webapp-tabs-section">
        <div class="tabs-header reveal">
            <h2>Our Seamless <span>Design Workflow</span></h2>
            <p>We follow a highly structured, collaborative design path that translates complex requirements into elegant visual solutions.</p>
        </div>

        <div class="tabs-container reveal">
            <div class="tabs-nav">
                <button class="tab-btn active" data-tab="research">1. Research & Strategy</button>
                <button class="tab-btn" data-tab="wireframes">2. Wireframes & UX</button>
                <button class="tab-btn" data-tab="ui">3. UI & Visual Design</button>
                <button class="tab-btn" data-tab="systems">4. Design Systems</button>
                <button class="tab-btn" data-tab="testing">5. Usability & Audit</button>
            </div>

            <div class="tabs-content">
                <!-- Research & Strategy -->
                <div class="tab-pane active" id="tab-research">
                    <div class="tab-split">
                        <div class="tab-image">
                          <img src="{{ $getImageUrl('service_user_research', asset('images/uiux_research.png')) }}" alt="{{ $getAltText('service_user_research', 'User Persona Research and Empathy Mapping Stage') }}" loading="lazy">
                        </div>
                        <div class="tab-text">
                            <h3>User Research & Brand Strategy</h3>
                            <p>We begin by deep-diving into your target audience's behaviors, challenges, and goals. Through detailed user interviews, competitor analysis, empathy mapping, and user persona creation, we establish a robust strategy that guides every subsequent styling decision. Build a digital product backed by real user insights.</p>
                            <a href="{{ url('/') }}#contact" class="btn-read-more" style="margin-top: 1.5rem; padding: 0.6rem 1.2rem; font-size: 0.85rem;" aria-label="Book a Discovery Session">Book Strategy Session</a>
                        </div>
                    </div>
                </div>

                <!-- Wireframes & UX -->
                <div class="tab-pane" id="tab-wireframes">
                    <div class="tab-split">
                        <div class="tab-text">
                            <h3>Interactive Wireframes & UX Blueprinting</h3>
                            <p>We construct detailed layout blueprints and user journey maps. By sketching out intuitive, low-fidelity wireframes and linking them into clickable interactive prototypes in Figma, we define key user navigation paths, user flows, and product functions first, ensuring a logical and frictionless structure before styling.</p>
                            <a href="{{ url('/') }}#contact" class="btn-read-more" style="margin-top: 1.5rem; padding: 0.6rem 1.2rem; font-size: 0.85rem;" aria-label="Learn about wireframes">Explore UX Blueprinting</a>
                        </div>
                        <div class="tab-image">
                          <img src="{{ $getImageUrl('service_wireframing', asset('images/uiux_wireframes.png')) }}" alt="{{ $getAltText('service_wireframing', 'Interactive UX Wireframe blueprints and structure mockups') }}" loading="lazy">
                        </div>
                    </div>
                </div>

                <!-- UI & Visual Design -->
                <div class="tab-pane" id="tab-ui">
                    <div class="tab-split">
                        <div class="tab-image">
                          <img src="{{ $getImageUrl('service_ui_design', asset('images/uiux_visual.png')) }}" alt="{{ $getAltText('service_ui_design', 'Stunning High-Fidelity UI and Visual System') }}" loading="lazy">
                        </div>
                        <div class="tab-text">
                            <h3>High-Fidelity UI & Visual Craftsmanship</h3>
                            <p>We transform interactive blueprints into breath-taking visual masterpieces. We carefully curate modern typography, design cohesive and pleasant color systems, establish sleek grid layouts, and design subtle animations and dark/light modes. We make your product look modern, premium, and stunning at first glance.</p>
                            <a href="{{ url('/') }}#contact" class="btn-read-more" style="margin-top: 1.5rem; padding: 0.6rem 1.2rem; font-size: 0.85rem;" aria-label="Launch Custom UI Design">Get Custom Visual Layout</a>
                        </div>
                    </div>
                </div>

                <!-- Design Systems -->
                <div class="tab-pane" id="tab-systems">
                    <div class="tab-split">
                        <div class="tab-text">
                            <h3>Scalable Component Libraries & Design Systems</h3>
                            <p>We build atomic design systems with reusable components. Every button, input field, navigation bar, card, and modal is meticulously documented as a Figma library with strict states (default, hover, active, disabled). This speeds up developer handoff by 200%, eliminates inconsistencies, and simplifies future upgrades.</p>
                            <a href="{{ url('/') }}#contact" class="btn-read-more" style="margin-top: 1.5rem; padding: 0.6rem 1.2rem; font-size: 0.85rem;" aria-label="Setup Design Systems">Create Design System</a>
                        </div>
                        <div class="tab-image">
                          <img src="{{ $getImageUrl('service_design_system', asset('images/uiux_systems.png')) }}" alt="{{ $getAltText('service_design_system', 'Figma scalable component library and style tokens guide') }}" loading="lazy">
                        </div>
                    </div>
                </div>

                <!-- Usability & Audit -->
                <div class="tab-pane" id="tab-testing">
                    <div class="tab-split">
                        <div class="tab-image">
                          <img src="{{ $getImageUrl('service_usability_testing', asset('images/uiux_testing.png')) }}" alt="{{ $getAltText('service_usability_testing', 'Usability testing and live user session mapping') }}" loading="lazy">
                        </div>
                        <div class="tab-text">
                            <h3>Usability Testing & Accessibility Audits</h3>
                            <p>We validate designs with empirical feedback loops. We conduct live user testing sessions, audit heatmap behaviors, and check user-flow dropout rates. We also verify full accessibility compliance under WCAG 2.1 (AA) guidelines, optimizing contrast ratios, text scaling, and keyboard routing to ensure your app is accessible to all.</p>
                            <a href="{{ url('/') }}#contact" class="btn-read-more" style="margin-top: 1.5rem; padding: 0.6rem 1.2rem; font-size: 0.85rem;" aria-label="Get Usability Audit">Request Usability Audit</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="webapp-faq-section">
        <div class="faq-container reveal">
            <div class="faq-header">
                <h2>Frequently Asked <span>Questions</span></h2>
                <p>Have questions about professional UI/UX design? Find answers to the most common queries below.</p>
            </div>

            <div class="faq-list">
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>What is the difference between UI and UX design?</h3>
                        <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>UX (User Experience) design focuses on the structure, logic, behavior flow, and ease of use of a product—making sure it is easy and logical to navigate. UI (User Interface) design is concerned with the aesthetics, visual details, color palette, typography, micro-animations, and visual branding—making sure it looks beautiful and fits your identity.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Which software and tools do you use for UI/UX design?</h3>
                        <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>We primarily use industry-leading tools like Figma and Adobe XD for creating high-fidelity layout grids, components, style guides, and clickable interactive prototypes. For custom icons, brand identity visuals, and detailed asset renders, we use Adobe Illustrator, Photoshop, and Blender.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Can you redesign our existing web application or mobile app?</h3>
                        <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, absolutely. We specialize in product redesigns. We perform a thorough usability audit of your current system, identify bottleneck pages and friction paths that cause dropouts, map out new structures, and deliver a modern, stunning interface that boosts user satisfaction and conversion metrics.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>What is a Design System, and why is it essential?</h3>
                        <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>A Design System is a single source of truth that contains all typography guidelines, brand colors, layout grids, and interactive components (like buttons, form fields, inputs, dropdowns) used across your product. It ensures absolute visual consistency as your product scales, makes future updates simple, and speeds up developers' code output drastically.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Will I be able to click and test the app before it is developed?</h3>
                        <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, absolutely. We create fully interactive, clickable prototypes in Figma. This allows you, your investors, and your target users to completely click through buttons, open modals, test user flows, and experience the final product's look, feel, and behavior before developers begin writing the code.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const tabBtns = document.querySelectorAll('.tab-btn');
                const tabPanes = document.querySelectorAll('.tab-pane');

                tabBtns.forEach(btn => {
                    btn.addEventListener('click', () => {
                        // Remove active class from all buttons and panes
                        tabBtns.forEach(b => b.classList.remove('active'));
                        tabPanes.forEach(p => p.classList.remove('active'));

                        // Add active class to clicked button
                        btn.classList.add('active');

                        // Show corresponding pane
                        const tabId = btn.getAttribute('data-tab');
                        document.getElementById('tab-' + tabId).classList.add('active');
                    });
                });

                // FAQ Accordion logic
                const faqItems = document.querySelectorAll('.faq-item');
                faqItems.forEach(item => {
                    const question = item.querySelector('.faq-question');
                    question.addEventListener('click', () => {
                        const activeItem = document.querySelector('.faq-item.active');
                        if (activeItem && activeItem !== item) {
                            activeItem.classList.remove('active');
                            activeItem.querySelector('.faq-icon i').className = 'fa-solid fa-plus';
                        }
                        item.classList.toggle('active');

                        const icon = item.querySelector('.faq-icon i');
                        if (item.classList.contains('active')) {
                            icon.className = 'fa-solid fa-minus';
                        } else {
                            icon.className = 'fa-solid fa-plus';
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
