@extends('layouts.app')

@php
    $sections = $sections ?? collect();
    $getImageUrl = fn ($slug, $fallback) => optional($sections->get($slug))->image_url ?? $fallback;
    $getAltText = fn ($slug, $fallback) => optional($sections->get($slug))->alt_text ?? $fallback;
@endphp

@section('title', 'Custom Software Solutions & Engineering | Crowns IT Software Agency')
@section('meta_description', 'Discover enterprise-grade custom software engineering by Crowns IT (Crown IT) - the best software company. We develop ERP systems, bespoke CRMs, and system automations.')

@section('content')
<!-- Hero Section with Light Background Image -->
<section class="webapp-hero">
    <div class="webapp-hero-content reveal">
        <h1>Custom <span>Software Solutions</span></h1>
        <p>Engineered to automate your manual processes, integrate legacy applications, and solve your unique operational challenges. Partner with Crowns IT to build custom infrastructure designed for scale.</p>
        <div class="hero-actions" style="margin-top: 2rem; justify-content: center;">
            <a href="{{ url('/') }}#contact" class="btn-read-more" aria-label="Contact us for custom software solutions">Get Started <i data-lucide="arrow-right"></i></a>
        </div>
    </div>
</section>

<!-- Text on one side, Image on other -->
<section class="webapp-split-section">
    <div class="split-container">
        <div class="split-text reveal">
            <h2>Enterprise-Grade <span>Software Engineering</span></h2>
            <p>At Crowns IT, we construct custom software architectures, native desktop systems, and automation logic that remove daily operational friction. We design every module from scratch to align precisely with your existing company workflows.</p>
            <ul class="features-list">
                <li><i data-lucide="check-circle-2"></i> <strong>Tailored Workflows:</strong> Perfectly mapped to your unique operational logic</li>
                <li><i data-lucide="check-circle-2"></i> <strong>Modern Integration:</strong> Bridges legacy servers, databases, and third-party tools</li>
                <li><i data-lucide="check-circle-2"></i> <strong>Enterprise Security:</strong> Incorporates granular permissions, MFA, and SSL</li>
                <li><i data-lucide="check-circle-2"></i> <strong>Data Intelligence:</strong> Fully centralizes records with dynamic reporting tools</li>
            </ul>
        </div>
        <div class="split-image reveal">
            <div class="tab-image">
                <img src="{{ $getImageUrl('split_image', asset('images/webapp_side_img.png')) }}" alt="{{ $getAltText('split_image', 'Enterprise Custom Software Development UI Dashboard') }}" loading="lazy">
            </div>
        </div>
    </div>
</section>

<!-- Stats Showcase Banner Section -->
<section class="webapp-stats-showcase">
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
                    <h4>Engineering Excellence</h4>
                    <p>Years of solving complex problems and shipping products that scale.</p>
                </div>
            </div>

            <!-- Capsule Center (Developer Coding) -->
            <div class="stats-capsule stats-developer-img">
                <img src="{{ $getImageUrl('stats_center_image', asset('images/webapp_side_img.png')) }}" alt="{{ $getAltText('stats_center_image', 'Crowns IT Developer working on custom web development') }}" loading="lazy">
            </div>

            <!-- Arch Blue (50+ Products Stats) -->
            <div class="stats-arch stats-arch-blue">
                <div class="stats-arch-content">
                    <h3>50+</h3>
                    <h4>Systems Deployed</h4>
                    <p>From custom APIs to enterprise ERP integrations, we deliver robust solutions.</p>
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
        <h2>Bespoke <span>Software Architecture</span></h2>
        <p>Explore the full spectrum of our engineering capablities and find the custom tools needed to digitize your operations.</p>
    </div>
    
    <div class="tabs-container reveal">
        <div class="tabs-nav">
            <button class="tab-btn active" data-tab="erp">ERP Systems</button>
            <button class="tab-btn" data-tab="crm">Custom CRM</button>
            <button class="tab-btn" data-tab="automation">Automation Scripts</button>
            <button class="tab-btn" data-tab="desktop">Desktop Apps</button>
            <button class="tab-btn" data-tab="api">API Development</button>
            <button class="tab-btn" data-tab="database">Database Architecture</button>
            <button class="tab-btn" data-tab="integration">Systems Integration</button>
        </div>
        
        <div class="tabs-content">
            <!-- ERP Systems -->
            <div class="tab-pane active" id="tab-erp">
                <div class="tab-split">
                    <div class="tab-image">
                        <img src="{{ $getImageUrl('service_erp', asset('images/webapp_erp.png')) }}" alt="{{ $getAltText('service_erp', 'Custom Enterprise Resource Planning ERP Software System') }}" loading="lazy">
                    </div>
                    <div class="tab-text">
                        <h3>Enterprise Resource Planning (ERP)</h3>
                        <p>Fully centralize your company operations. We build customized ERP software to manage bookkeeping and accounting, streamline HR and payroll, track warehouse inventory levels, and handle automated procurement workflows in a unified ecosystem.</p>
                        <a href="{{ url('/') }}#contact" class="btn-read-more" style="margin-top: 1.5rem; padding: 0.6rem 1.2rem; font-size: 0.85rem;" aria-label="Learn more about Custom ERPs">Request a Demo</a>
                    </div>
                </div>
            </div>
            
            <!-- Custom CRM -->
            <div class="tab-pane" id="tab-crm">
                <div class="tab-split">
                    <div class="tab-text">
                        <h3>Bespoke CRM Software</h3>
                        <p>Empower your sales and support teams. We design client portals that accurately map sales pipelines, log customer communications, auto-assign support tickets, and trigger automated follow-ups to increase customer satisfaction and conversions.</p>
                        <a href="{{ url('/') }}#contact" class="btn-read-more" style="margin-top: 1.5rem; padding: 0.6rem 1.2rem; font-size: 0.85rem;" aria-label="Learn more about Custom CRMs">Request a Demo</a>
                    </div>
                    <div class="tab-image">
                        <img src="{{ $getImageUrl('service_crm', asset('images/webapp_ecommerce.png')) }}" alt="{{ $getAltText('service_crm', 'Bespoke Customer Relationship Management CRM Panel') }}" loading="lazy">
                    </div>
                </div>
            </div>

            <!-- Automation Scripts -->
            <div class="tab-pane" id="tab-automation">
                <div class="tab-split">
                    <div class="tab-image">
                        <img src="{{ $getImageUrl('service_pos', asset('images/webapp_pos.png')) }}" alt="{{ $getAltText('service_pos', 'Custom Scripting and Process Automation') }}" loading="lazy">
                    </div>
                    <div class="tab-text">
                        <h3>Process Automation & Scripting</h3>
                        <p>Eliminate time-consuming, repetitive manual tasks. We engineer high-performance backend scripts that scrape web data, parse bulk document files (PDF/Excel), automate scheduled reporting systems, and sync datasets across platforms overnight.</p>
                        <a href="{{ url('/') }}#contact" class="btn-read-more" style="margin-top: 1.5rem; padding: 0.6rem 1.2rem; font-size: 0.85rem;" aria-label="Learn more about Automation Services">Request a Quote</a>
                    </div>
                </div>
            </div>
            
            <!-- Desktop Apps -->
            <div class="tab-pane" id="tab-desktop">
                <div class="tab-split">
                    <div class="tab-text">
                        <h3>Native Desktop Applications</h3>
                        <p>High-speed offline and online software. We develop secure, platform-native applications (Windows, macOS, and Linux) optimized for robust local processing, offline database capabilities, biometric scanning devices, and print peripheral connectivity.</p>
                        <a href="{{ url('/') }}#contact" class="btn-read-more" style="margin-top: 1.5rem; padding: 0.6rem 1.2rem; font-size: 0.85rem;" aria-label="Learn more about Desktop Applications">Request a Quote</a>
                    </div>
                    <div class="tab-image">
                        <img src="{{ $getImageUrl('service_desktop', asset('images/webapp_side_img.png')) }}" alt="{{ $getAltText('service_desktop', 'Cross Platform Desktop App Development Interface') }}" loading="lazy">
                    </div>
                </div>
            </div>
            
            <!-- API Development -->
            <div class="tab-pane" id="tab-api">
                <div class="tab-split">
                    <div class="tab-image">
                        <img src="{{ $getImageUrl('service_api', asset('images/webapp_lc.png')) }}" alt="{{ $getAltText('service_api', 'Custom REST and GraphQL API Engineering') }}" loading="lazy">
                    </div>
                    <div class="tab-text">
                        <h3>Fast & Secure API Pipelines</h3>
                        <p>Ensure seamless connectivity between web nodes. We develop RESTful, SOAP, and GraphQL APIs using robust security structures, standard token authentication protocols (JWT/OAuth), detailed developer documentation, and optimized payload delivery.</p>
                        <a href="{{ url('/') }}#contact" class="btn-read-more" style="margin-top: 1.5rem; padding: 0.6rem 1.2rem; font-size: 0.85rem;" aria-label="Learn more about API Development">Request a Quote</a>
                    </div>
                </div>
            </div>
            
            <!-- Database Architecture -->
            <div class="tab-pane" id="tab-database">
                <div class="tab-split">
                    <div class="tab-text">
                        <h3>Scalable Database Architecture</h3>
                        <p>Protect your most valuable asset. We construct optimized SQL and NoSQL database schemas (MySQL, PostgreSQL, MongoDB, Redis) built to handle millions of read/write queries efficiently, complete with automated hourly hot-backups.</p>
                        <a href="{{ url('/') }}#contact" class="btn-read-more" style="margin-top: 1.5rem; padding: 0.6rem 1.2rem; font-size: 0.85rem;" aria-label="Learn more about Database Design">Request a Quote</a>
                    </div>
                    <div class="tab-image">
                        <img src="{{ $getImageUrl('service_db', asset('images/webapp_side_img.png')) }}" alt="{{ $getAltText('service_db', 'High Availability Database System Design and Support') }}" loading="lazy">
                    </div>
                </div>
            </div>
            
            <!-- Systems Integration -->
            <div class="tab-pane" id="tab-integration">
                <div class="tab-split">
                    <div class="tab-image">
                        <img src="{{ $getImageUrl('service_legacy', asset('images/webapp_side_img.png')) }}" alt="{{ $getAltText('service_legacy', 'Legacy Systems Integration Solutions') }}" loading="lazy">
                    </div>
                    <div class="tab-text">
                        <h3>Legacy & Modern Systems Integration</h3>
                        <p>Say goodbye to data silos. We build bridge middleware components that automatically synchronize inventory, account details, and invoices between your legacy in-house servers, modern SaaS panels, and cloud storage systems.</p>
                        <a href="{{ url('/') }}#contact" class="btn-read-more" style="margin-top: 1.5rem; padding: 0.6rem 1.2rem; font-size: 0.85rem;" aria-label="Learn more about Systems Integration">Request a Quote</a>
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
            <p>Have questions about custom software engineering? Find answers to the most common queries below.</p>
        </div>
        
        <div class="faq-list">
            <div class="faq-item">
                <div class="faq-question">
                    <h3>Why choose custom software over off-the-shelf software?</h3>
                    <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
                </div>
                <div class="faq-answer">
                    <p>Off-the-shelf software requires your business to adapt its processes to match the tool, often leading to paying for unused features or encountering rigid constraints. Custom software is engineered entirely around your unique business operations, saving employee labor, scaling effortlessly, and offering absolute ownership without monthly recurring subscription fees.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <h3>What backend technologies and languages do you use?</h3>
                    <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
                </div>
                <div class="faq-answer">
                    <p>We leverage modern, highly secure, and battle-tested programming stacks. This includes Laravel (PHP), Node.js, Python, PostgreSQL, and Electron/C# for native desktop utilities. Our choice of stack always prioritizes execution speed, cloud security, scale capacity, and future developer maintenance.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <h3>Can you integrate with or update our existing legacy platforms?</h3>
                    <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
                </div>
                <div class="faq-answer">
                    <p>Yes, absolutely. We specialize in building secure gateway layers and custom middleware pipelines that pull and push data safely from legacy databases, allowing your old systems to sync records in real-time with modern mobile apps, web dashboards, or cloud platforms.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <h3>How do you guarantee custom software data security?</h3>
                    <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
                </div>
                <div class="faq-answer">
                    <p>We deploy standard security protocols across all systems. This encompasses deep data encryption, SSL/TLS certificates, standard hashing methods, role-based user access controls (RBAC), multi-factor authentication (MFA), and automated daily off-site cloud backups to protect your company records from threats.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <h3>Do you provide staff training and code support after launch?</h3>
                    <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
                </div>
                <div class="faq-answer">
                    <p>Yes, Crowns IT delivers comprehensive training manuals, video walkthroughs, and technical support documentation. We also offer monthly technical maintenance packages covering software scaling, automated security updates, backups, and feature iterations as your operations grow.</p>
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
