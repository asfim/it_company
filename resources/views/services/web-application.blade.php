@extends('layouts.app')

@section('title', 'Custom Web Application Development Services | Crowns IT')
@section('meta_description', 'Crowns IT offers premier custom web application development services. We build scalable, secure, and robust web apps, E-Commerce platforms, ERP, POS, and industry-specific software solutions.')

@section('content')
    <!-- Hero Section with Light Background Image -->
    <section class="webapp-hero">
        <div class="webapp-hero-content reveal">
            <h1><span>Web Application</span> Development </h1>
            <p>Empower your business with high-performance, secure, and scalable web applications. As a leading software
                development agency, Crowns IT builds robust custom web solutions tailored to your unique enterprise needs.
            </p>
            <div class="hero-actions" style="margin-top: 2rem; justify-content: center;">
                <a href="{{ url('/') }}#contact" class="btn-read-more"
                    aria-label="Contact us for web application development">Get Started <i
                        data-lucide="arrow-right"></i></a>
            </div>
        </div>
    </section>

    <!-- Text on one side, Image on other -->
    <section class="webapp-split-section">
        <div class="split-container">
            <div class="split-text reveal">
                <h2>Next-Generation <span>Digital Software Experiences</span></h2>
                <p>At Crowns IT, our expert web developers engineer enterprise-grade web applications that go far beyond
                    standard websites. We deliver robust digital platforms designed to solve complex business challenges,
                    streamline workflows, and maximize ROI.</p>
                <ul class="features-list">
                    <li><i data-lucide="check-circle-2"></i> <strong>Custom Architecture:</strong> Built specifically for
                        your unique business logic</li>
                    <li><i data-lucide="check-circle-2"></i> <strong>Enterprise Security:</strong> Advanced data protection
                        and secure hosting</li>
                    <li><i data-lucide="check-circle-2"></i> <strong>Seamless Integrations:</strong> API connectivity with
                        CRM, ERP, and payment gateways</li>
                    <li><i data-lucide="check-circle-2"></i> <strong>High Performance:</strong> Lightning-fast speed
                        optimization for best user experience</li>
                </ul>
            </div>
            <div class="split-image reveal">
                <div class="tab-image">
                    <img src="{{ asset('images/webapp_side_img.png') }}"
                        alt="Custom Web Application Development Dashboard UI Interface by Crowns IT" loading="lazy">
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Showcase Banner Section -->
    <section class="webapp-stats-showcase">
        <div class="stats-header reveal" style="text-align: center; margin-bottom: 3.5rem;">
            <h1 style="font-size: clamp(2rem, 3.5vw, 3rem); font-weight: 800; color: #1e293b; margin-bottom: 1rem;">Proven
                Expertise & <span>Product Engineering</span></h1>
            <p style="color: #64748b; font-size: 1.1rem; max-width: 800px; margin: 0 auto; line-height: 1.6;">Our dedicated
                software development agency builds robust, secure, and production-grade applications that scale seamlessly
                with your business operations.</p>
        </div>
        <div class="stats-banner-container reveal">
            <div class="stats-banner-grid">
                <!-- Capsule Left (Abstract Visual) -->
                <div class="stats-capsule stats-visual-purple">
                    <div class="scroll-shape"></div>
                </div>

                <!-- Arch Purple (7+ Years Stats) -->
                <div class="stats-arch stats-arch-purple">
                    <div class="stats-arch-content">
                        <h3>7+ Years</h3>
                        <h4>Building Products</h4>
                        <p>Years of solving complex problems and shipping products that scale.</p>
                    </div>
                </div>

                <!-- Capsule Center (Developer Coding) -->
                <div class="stats-capsule stats-developer-img">
                    <img src="{{ asset('images/webapp_side_img.png') }}"
                        alt="Crowns IT Developer working on custom web development" loading="lazy">
                </div>

                <!-- Arch Blue (50+ Products Stats) -->
                <div class="stats-arch stats-arch-blue">
                    <div class="stats-arch-content">
                        <h3>50+</h3>
                        <h4>Products Shipped</h4>
                        <p>From MVPs to complex systems, we ship products that drive real impact.</p>
                    </div>
                </div>

                <!-- Capsule Right (Abstract Visual) -->
                <div class="stats-capsule stats-visual-blue">
                    <div class="ribbon-shape"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tabs Section -->
    <section class="webapp-tabs-section">
        <div class="tabs-header reveal">
            <h2>Industry-Specific <span>Software Solutions</span></h2>
            <p>We develop specialized, cloud-based web applications tailored to various industries, ensuring you get the
                exact digital tools required to accelerate your business growth.</p>
        </div>

        <div class="tabs-container reveal">
            <div class="tabs-nav">
                <button class="tab-btn active" data-tab="ecommerce">E-Commerce</button>
                <button class="tab-btn" data-tab="pos">POS System</button>
                <button class="tab-btn" data-tab="lc">Letter of Credit (LC)</button>
                <button class="tab-btn" data-tab="isp">ISP</button>
                <button class="tab-btn" data-tab="erp">ERP</button>
                <button class="tab-btn" data-tab="pharmacy">Pharmacy Management</button>
                <button class="tab-btn" data-tab="reunion">Reunion Site</button>
                <button class="tab-btn" data-tab="restaurant">Restaurant Management</button>
            </div>

            <div class="tabs-content">
                <!-- E-Commerce -->
                <div class="tab-pane active" id="tab-ecommerce">
                    <div class="tab-split">
                        <div class="tab-image">
                            <img src="{{ asset('images/uiux_visual.png') }}"
                                alt="Custom E-Commerce Web Application Platform Design" loading="lazy">
                        </div>
                        <div class="tab-text">
                            <h3>E-Commerce Web Platforms</h3>
                            <p>Build a powerful, high-converting online store with our bespoke e-commerce web application
                                solutions. We integrate secure multi-currency payment gateways, intuitive product catalog
                                management, and optimized, frictionless checkout experiences that drive sales and scale your
                                retail business globally.</p>
                            <a href="{{ url('/') }}#contact" class="btn-read-more"
                                style="margin-top: 1.5rem; padding: 0.6rem 1.2rem; font-size: 0.85rem;"
                                aria-label="Learn more about E-Commerce platforms">Request a Demo</a>
                        </div>
                    </div>
                </div>

                <!-- POS -->
                <div class="tab-pane" id="tab-pos">
                    <div class="tab-split">
                        <div class="tab-text">
                            <h3>Cloud-Based Point of Sale (POS) Systems</h3>
                            <p>Streamline your retail and wholesale operations with our custom cloud-based POS software.
                                Effortlessly manage multi-branch inventory, track real-time sales analytics, and handle fast
                                customer transactions from any connected device, giving you total centralized control over
                                your physical and digital storefronts.</p>
                            <a href="{{ url('/') }}#contact" class="btn-read-more"
                                style="margin-top: 1.5rem; padding: 0.6rem 1.2rem; font-size: 0.85rem;"
                                aria-label="Learn more about POS Systems">Request a Demo</a>
                        </div>
                        <div class="tab-image">
                            <img src="{{ asset('images/uiux_systems.png') }}"
                                alt="Modern Cloud-Based Point of Sale POS Software Dashboard" loading="lazy">
                        </div>
                    </div>
                </div>

                <!-- LC Management -->
                <div class="tab-pane" id="tab-lc">
                    <div class="tab-split">
                        <div class="tab-image">
                            <img src="{{ asset('images/uiux_wireframes.png') }}"
                                alt="Letter of Credit LC Management Trade Finance Software Interface" loading="lazy">
                        </div>
                        <div class="tab-text">
                            <h3>Letter of Credit (LC) Management Software</h3>
                            <p>Simplify complex commercial Letter of Credit workflows with secure, automated tracking and
                                intelligent document management. Enhance your enterprise trade finance operations with
                                complete audit transparency, drastically reduced manual errors, and significantly faster
                                transaction processing times.</p>
                            <a href="{{ url('/') }}#contact" class="btn-read-more"
                                style="margin-top: 1.5rem; padding: 0.6rem 1.2rem; font-size: 0.85rem;"
                                aria-label="Learn more about LC Management">Request a Demo</a>
                        </div>
                    </div>
                </div>

                <!-- ISP -->
                <div class="tab-pane" id="tab-isp">
                    <div class="tab-split">
                        <div class="tab-text">
                            <h3>ISP Network Management Systems</h3>
                            <p>Deploy comprehensive, automated billing, bandwidth monitoring, and CRM solutions tailored for
                                Internet Service Providers. Automate your network operations, manage user bandwidth
                                allocation efficiently, and provide exceptional customer service backed by real-time data
                                analytics.</p>
                            <a href="{{ url('/') }}#contact" class="btn-read-more"
                                style="margin-top: 1.5rem; padding: 0.6rem 1.2rem; font-size: 0.85rem;"
                                aria-label="Learn more about ISP Systems">Request a Demo</a>
                        </div>
                        <div class="tab-image">
                            <img src="{{ asset('images/uiux_testing.png') }}"
                                alt="Internet Service Provider ISP Network Management Web App" loading="lazy">
                        </div>
                    </div>
                </div>

                <!-- ERP -->
                <div class="tab-pane" id="tab-erp">
                    <div class="tab-split">
                        <div class="tab-image">
                            <img src="{{ asset('images/uiux_systems.png') }}"
                                alt="Custom Enterprise Resource Planning ERP Software Dashboard" loading="lazy">
                        </div>
                        <div class="tab-text">
                            <h3>Enterprise Resource Planning (ERP)</h3>
                            <p>Integrate all your core business processes into one unified, scalable digital system. Our
                                customized ERP software solutions optimize resource management, human resources (HR),
                                complex supply chains, and corporate financials to give you a complete, real-time 360-degree
                                view of your organization.</p>
                            <a href="{{ url('/') }}#contact" class="btn-read-more"
                                style="margin-top: 1.5rem; padding: 0.6rem 1.2rem; font-size: 0.85rem;"
                                aria-label="Learn more about ERP Software">Request a Demo</a>
                        </div>
                    </div>
                </div>

                <!-- Pharmacy -->
                <div class="tab-pane" id="tab-pharmacy">
                    <div class="tab-split">
                        <div class="tab-text">
                            <h3>Pharmacy Management System</h3>
                            <p>Digitize your healthcare business by managing prescription records, tracking medicine
                                inventory levels, handling digital billing, and automating medical supplier orders with our
                                dedicated pharmacy web applications. Designed specifically for healthcare compliance,
                                accuracy, and operational ease of use.</p>
                            <a href="{{ url('/') }}#contact" class="btn-read-more"
                                style="margin-top: 1.5rem; padding: 0.6rem 1.2rem; font-size: 0.85rem;"
                                aria-label="Learn more about Pharmacy Management">Request a Demo</a>
                        </div>
                        <div class="tab-image">
                            <img src="{{ asset('images/uiux_research.png') }}"
                                alt="Healthcare Pharmacy Management System Web Application" loading="lazy">
                        </div>
                    </div>
                </div>

                <!-- Reunion Site -->
                <div class="tab-pane" id="tab-reunion">
                    <div class="tab-split">
                        <div class="tab-image">
                            <img src="{{ asset('images/uiux_visual.png') }}"
                                alt="Alumni Reunion and Community Networking Web Portal" loading="lazy">
                        </div>
                        <div class="tab-text">
                            <h3>Reunion & Community Networking Portals</h3>
                            <p>Connect alumni, university families, and large communities with specialized online portals.
                                Features include automated event management, searchable member directories, secure online
                                ticket sales, media sharing galleries, and custom social networking capabilities tailored
                                strictly to your private group.</p>
                            <a href="{{ url('/') }}#contact" class="btn-read-more"
                                style="margin-top: 1.5rem; padding: 0.6rem 1.2rem; font-size: 0.85rem;"
                                aria-label="Learn more about Reunion Sites">Request a Demo</a>
                        </div>
                    </div>
                </div>

                <!-- Restaurant Management -->
                <div class="tab-pane" id="tab-restaurant">
                    <div class="tab-split">
                        <div class="tab-text">
                            <h3>Restaurant Management System</h3>
                            <p>Streamline your food service operations with our comprehensive cloud restaurant management
                                software. Seamlessly handle dynamic table reservations, digital orders, fast billing,
                                ingredient inventory, and kitchen display ticketing in real-time. Enhance the dining
                                experience and optimize your staff efficiency.</p>
                            <a href="{{ url('/') }}#contact" class="btn-read-more"
                                style="margin-top: 1.5rem; padding: 0.6rem 1.2rem; font-size: 0.85rem;"
                                aria-label="Learn more about Restaurant Management">Request a Demo</a>
                        </div>
                        <div class="tab-image">
                            <img src="{{ asset('images/uiux_systems.png') }}"
                                alt="Cloud Restaurant Management POS System and Software" loading="lazy">
                        </div>
                    </div>
                </div>
                <!-- FAQ Section -->
                <section class="webapp-faq-section">
                    <div class="faq-container reveal">
                        <div class="faq-header">
                            <h2>Frequently Asked <span>Questions</span></h2>
                            <p>Have questions about custom web application development? Find answers to the most common
                                queries below.</p>
                        </div>

                        <div class="faq-list">
                            <div class="faq-item">
                                <div class="faq-question">
                                    <h3>What is the difference between a website and a web application?</h3>
                                    <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
                                </div>
                                <div class="faq-answer">
                                    <p>A website is primarily informational, presenting static content for visitors to read.
                                        A web application is highly interactive, allowing users to perform actions, process
                                        data, customize dashboards, log into accounts, and perform tasks (like placing
                                        orders, managing inventory, or generating invoices).</p>
                                </div>
                            </div>

                            <div class="faq-item">
                                <div class="faq-question">
                                    <h3>How long does it take to develop a custom web application?</h3>
                                    <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
                                </div>
                                <div class="faq-answer">
                                    <p>The timeline depends entirely on the complexity, features, and scale of the
                                        application. A standard MVP or smaller system (like a basic POS or ISP dashboard)
                                        can take 4-8 weeks, while complex enterprise platforms (like customized ERPs or
                                        advanced Letter of Credit systems) may take 3-6 months. We provide detailed project
                                        timelines during our initial consultation.</p>
                                </div>
                            </div>

                            <div class="faq-item">
                                <div class="faq-question">
                                    <h3>Can you integrate our existing third-party services and APIs?</h3>
                                    <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
                                </div>
                                <div class="faq-answer">
                                    <p>Yes, absolutely. We have extensive experience integrating a wide variety of
                                        third-party APIs. This includes payment gateways (SSLCommerz, Stripe, PayPal), SMS
                                        gateways, shipping services, CRM tools, accounting systems, biometric tracking API
                                        services, and social authentication methods.</p>
                                </div>
                            </div>

                            <div class="faq-item">
                                <div class="faq-question">
                                    <h3>How secure will my custom web application be?</h3>
                                    <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
                                </div>
                                <div class="faq-answer">
                                    <p>Security is our top priority. We implement modern security standards, including
                                        SSL/HTTPS encryption, secure user authentication systems (OAuth/MFA), protection
                                        against SQL Injection, Cross-Site Scripting (XSS), and Cross-Site Request Forgery
                                        (CSRF). We also perform regular vulnerability testing during the development phase.
                                    </p>
                                </div>
                            </div>

                            <div class="faq-item">
                                <div class="faq-question">
                                    <h3>Do you offer post-launch support and maintenance?</h3>
                                    <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
                                </div>
                                <div class="faq-answer">
                                    <p>Yes, we offer flexible post-launch maintenance and technical support packages. This
                                        covers regular software updates, security patches, database backups, performance
                                        monitoring, and server scaling. We ensure your web application continues to run
                                        flawlessly as your user base grows.</p>
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