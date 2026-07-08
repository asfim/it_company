@extends('layouts.app')

@php
    $sections = $sections ?? collect();
    $getImageUrl = fn ($slug, $fallback) => optional($sections->get($slug))->image_url ?? $fallback;
    $getAltText = fn ($slug, $fallback) => optional($sections->get($slug))->alt_text ?? $fallback;
@endphp

@section('title', 'Custom Web Development Services | Crowns IT Software Company')
@section('meta_description', 'Get custom web development services from Crowns IT (Crown IT) - a premier software agency. We build responsive, fast, and SEO-optimized business websites.')

@section('content')
    <!-- Hero Section with Light Background Image -->
    <section class="webapp-hero">
        <div class="webapp-hero-content reveal">
            <h1>Professional <span>Web Development</span> Services</h1>
            <p>Stunning, fast, and SEO-optimized websites built to elevate your online presence and turn visitors into loyal
                customers. Partner with Crowns IT to build a premium, custom web experience.</p>
            <div class="hero-actions" style="margin-top: 2rem; justify-content: center;">
                <a href="{{ url('/') }}#contact" class="btn-read-more"
                    aria-label="Contact us for custom web development">Get Started <i data-lucide="arrow-right"></i></a>
            </div>
        </div>
    </section>

    <!-- Text on one side, Image on other -->
    <section class="webapp-split-section">
        <div class="split-container">
            <div class="split-text reveal">
                <h2>High-Performance <span>Custom Web Development</span></h2>
                <p>At Crowns IT, our expert web developers create modern, responsive websites that capture your brand's
                    essence and engage your target audience. From landing pages to complex corporate portals, we focus on
                    speed, user experience, and conversion optimization using modern clean-code standards.</p>
                <ul class="features-list">
                    <li><i data-lucide="check-circle-2"></i> <strong>Responsive Layouts:</strong> Flawless rendering on
                        mobile devices, tablets, and desktops</li>
                    <li><i data-lucide="check-circle-2"></i> <strong>Speed Optimization:</strong> Fast load times for
                        excellent Google Core Web Vitals</li>
                    <li><i data-lucide="check-circle-2"></i> <strong>Technical SEO:</strong> Semantically structured HTML
                        built for maximum search visibility</li>
                    <li><i data-lucide="check-circle-2"></i> <strong>Modern CMS:</strong> Easy content administration to
                        keep your site updated</li>
                </ul>
            </div>
            <div class="split-image reveal">
                <div class="tab-image">
                    <img src="{{ $getImageUrl('split_image', asset('images/webapp_side_img.png')) }}"
                        alt="{{ $getAltText('split_image', 'Custom Web Development Project Interface on a Laptop Mockup') }}" loading="lazy">
                </div>
            </div>
        </div>
    </section>


    <!-- Tabs Section -->
    <section class="webapp-tabs-section">
        <div class="tabs-header reveal">
            <h2>Tailored <span>Web Development Solutions</span></h2>
            <p>We design and develop custom websites tailored to different business models, helping you stand out in the
                competitive digital landscape.</p>
        </div>

        <div class="tabs-container reveal">
            <div class="tabs-nav">
                <button class="tab-btn active" data-tab="corporate">Corporate Website</button>
                <button class="tab-btn" data-tab="landing">Landing Page</button>
                <button class="tab-btn" data-tab="blog">Blog/News Portal</button>
                <button class="tab-btn" data-tab="portfolio">Portfolio Site</button>
                <button class="tab-btn" data-tab="realestate">Real Estate</button>
                <button class="tab-btn" data-tab="education">Educational Portal</button>
                <button class="tab-btn" data-tab="nonprofit">Non-Profit/NGO</button>
            </div>

            <div class="tabs-content">
                <!-- Corporate Website -->
                <div class="tab-pane active" id="tab-corporate">
                    <div class="tab-split">
                        <div class="tab-image">
                            <img src="{{ $getImageUrl('card_corporate', asset('images/uiux_systems.png')) }}"
                                alt="{{ $getAltText('card_corporate', 'Professional Corporate Web Development Design') }}" loading="lazy">
                        </div>
                        <div class="tab-text">
                            <h3>Corporate Websites</h3>
                            <p>Establish strong brand credibility with a premium corporate website. We showcase your
                                company's core values, list your services in detail, present customer testimonials, and
                                integrate secure contact forms to capture qualified business leads.</p>
                            <a href="{{ url('/') }}#contact" class="btn-read-more"
                                style="margin-top: 1.5rem; padding: 0.6rem 1.2rem; font-size: 0.85rem;"
                                aria-label="Learn more about Corporate Websites">Request a Quote</a>
                        </div>
                    </div>
                </div>

                <!-- Landing Page -->
                <div class="tab-pane" id="tab-landing">
                    <div class="tab-split">
                        <div class="tab-text">
                            <h3>High-Converting Landing Pages</h3>
                            <p>Maximize your PPC and marketing campaign returns with highly optimized single-page websites.
                                Designed with clear call-to-actions (CTAs), persuasive content layouts, fast load times, and
                                structured navigation to drive immediate user conversions.</p>
                            <a href="{{ url('/') }}#contact" class="btn-read-more"
                                style="margin-top: 1.5rem; padding: 0.6rem 1.2rem; font-size: 0.85rem;"
                                aria-label="Learn more about Landing Pages">Request a Quote</a>
                        </div>
                        <div class="tab-image">
                            <img src="{{ $getImageUrl('card_landing', asset('images/uiux_visual.png')) }}" alt="{{ $getAltText('card_landing', 'High Converting Landing Page Web Design UI') }}"
                                loading="lazy">
                        </div>
                    </div>
                </div>

                <!-- Blog/News Portal -->
                <div class="tab-pane" id="tab-blog">
                    <div class="tab-split">
                        <div class="tab-image">
                            <img src="{{ $getImageUrl('card_blog', asset('images/uiux_research.png')) }}"
                                alt="{{ $getAltText('card_blog', 'News Portal and Editorial Blog Web Development') }}" loading="lazy">
                        </div>
                        <div class="tab-text">
                            <h3>Blogs & News Portals</h3>
                            <p>Share your voice and publish industry stories with content-heavy editorial portals. Built
                                with categorized content layouts, custom search features, optimized image rendering, social
                                sharing tools, and intuitive admin dashboards for frictionless blogging.</p>
                            <a href="{{ url('/') }}#contact" class="btn-read-more"
                                style="margin-top: 1.5rem; padding: 0.6rem 1.2rem; font-size: 0.85rem;"
                                aria-label="Learn more about News Portals">Request a Quote</a>
                        </div>
                    </div>
                </div>

                <!-- Portfolio Site -->
                <div class="tab-pane" id="tab-portfolio">
                    <div class="tab-split">
                        <div class="tab-text">
                            <h3>Creative Portfolio Websites</h3>
                            <p>Showcase your creative work in style. Perfect for designers, photographers, architects, and
                                creative agencies. We build beautiful, visually engaging layouts that present your projects,
                                case studies, and achievements with sleek CSS animations.</p>
                            <a href="{{ url('/') }}#contact" class="btn-read-more"
                                style="margin-top: 1.5rem; padding: 0.6rem 1.2rem; font-size: 0.85rem;"
                                aria-label="Learn more about Portfolio Sites">Request a Quote</a>
                        </div>
                        <div class="tab-image">
                            <img src="{{ $getImageUrl('card_portfolio', asset('images/uiux_visual.png')) }}"
                                alt="{{ $getAltText('card_portfolio', 'Creative Agency Portfolio Web Development Showcase') }}" loading="lazy">
                        </div>
                    </div>
                </div>

                <!-- Real Estate -->
                <div class="tab-pane" id="tab-realestate">
                    <div class="tab-split">
                        <div class="tab-image">
                            <img src="{{ $getImageUrl('card_realestate', asset('images/uiux_wireframes.png')) }}" alt="{{ $getAltText('card_realestate', 'Real Estate Property Directory Web Design') }}"
                                loading="lazy">
                        </div>
                        <div class="tab-text">
                            <h3>Real Estate Directory Portals</h3>
                            <p>Enhance property sales with feature-rich real estate directories. We build websites featuring
                                dynamic property filters, advanced map searches, image galleries, virtual tour embeds, and
                                easy lead-routing forms directly to real estate agents.</p>
                            <a href="{{ url('/') }}#contact" class="btn-read-more"
                                style="margin-top: 1.5rem; padding: 0.6rem 1.2rem; font-size: 0.85rem;"
                                aria-label="Learn more about Real Estate Sites">Request a Quote</a>
                        </div>
                    </div>
                </div>

                <!-- Educational Portal -->
                <div class="tab-pane" id="tab-education">
                    <div class="tab-split">
                        <div class="tab-text">
                            <h3>Educational Institution Portals</h3>
                            <p>Modernize your school, college, or online academy with comprehensive academic portals. We
                                integrate class schedules, downloadable student materials, administrative notifications,
                                news boards, and admission intake applications.</p>
                            <a href="{{ url('/') }}#contact" class="btn-read-more"
                                style="margin-top: 1.5rem; padding: 0.6rem 1.2rem; font-size: 0.85rem;"
                                aria-label="Learn more about Educational Portals">Request a Quote</a>
                        </div>
                        <div class="tab-image">
                            <img src="{{ $getImageUrl('card_education', asset('images/uiux_systems.png')) }}"
                                alt="{{ $getAltText('card_education', 'Educational University Web Portal Design') }}" loading="lazy">
                        </div>
                    </div>
                </div>

                <!-- Non-Profit/NGO -->
                <div class="tab-pane" id="tab-nonprofit">
                    <div class="tab-split">
                        <div class="tab-image">
                            <img src="{{ $getImageUrl('card_nonprofit', asset('images/uiux_research.png')) }}"
                                alt="{{ $getAltText('card_nonprofit', 'Non Profit NGO Community Web Development') }}" loading="lazy">
                        </div>
                        <div class="tab-text">
                            <h3>NGO & Non-Profit Websites</h3>
                            <p>Tell your story and drive community support with dedicated non-profit portals. We incorporate
                                transparent donation gateway integrations, event schedules, volunteer enrollment forms, and
                                media-rich campaign pages to increase social impact.</p>
                            <a href="{{ url('/') }}#contact" class="btn-read-more"
                                style="margin-top: 1.5rem; padding: 0.6rem 1.2rem; font-size: 0.85rem;"
                                aria-label="Learn more about NGO Websites">Request a Quote</a>
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
                <p>Have questions about professional web development? Find answers to the most common queries below.</p>
            </div>

            <div class="faq-list">
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Why is responsive web design so important?</h3>
                        <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>Over 55% of all global web traffic originates from mobile devices. Responsive web design ensures
                            that your site dynamically scales and reformats to look beautiful and function perfectly on
                            smartphones, tablets, laptops, and large desktop screens, protecting your search rankings and
                            maximizing user conversions.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>How much does a professional custom website cost?</h3>
                        <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>The cost of web development depends entirely on the design scope, features, content size, and
                            specific integrations. A basic landing page or campaign site is highly affordable, whereas
                            custom multi-page corporate portals or real estate listing engines require more extensive
                            programming. We offer transparent pricing structures tailored to your budget.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Do you develop custom websites or use platforms like WordPress?</h3>
                        <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>We do both! Depending on your specific business requirements, we build custom sites using
                            advanced frameworks (like Laravel, Vue, React, or Tailwind CSS) for maximum speed and security,
                            or user-friendly Content Management Systems (like WordPress) if you require quick content
                            updates.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Will I be able to update my website content easily after launch?</h3>
                        <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, absolutely. We integrate modern administrative backend management systems (CMS) that allow
                            you to easily edit text, publish new blog articles, upload images, manage page listings, and add
                            new projects without needing any technical programming knowledge.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Do you design websites with SEO best practices?</h3>
                        <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, we build all our websites with solid technical SEO foundations. This includes clean,
                            semantic HTML structure, proper header hierarchy (H1, H2, H3), lightning-fast page speed
                            optimization, custom meta tags, schema markup integrations, and submission to major search
                            engine sitemaps.</p>
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