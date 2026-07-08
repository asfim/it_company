@extends('layouts.app')

@php
    $sections = $sections ?? collect();
    $getImageUrl = fn ($slug, $fallback) => optional($sections->get($slug))->image_url ?? $fallback;
    $getAltText = fn ($slug, $fallback) => optional($sections->get($slug))->alt_text ?? $fallback;
@endphp

@section('title', 'Digital Marketing & Growth SEO Services | Crowns IT Software Agency')
@section('meta_description', 'Scale your search visibility and brand growth with Crowns IT (Crown IT) - the best software company and marketing agency for result-oriented organic growth SEO.')

@section('content')
    <!-- Hero Section -->
    <section class="webapp-hero">
        <div class="webapp-hero-content reveal">
            <h1>Data-Driven <span>Digital Marketing</span> Solutions</h1>
            <p>Boost your brand's presence, dominate search engine rankings, and scale your sales funnel with custom, performance-focused growth strategies. We connect you with your perfect target audience and deliver measurable, compound ROI.</p>
            <div class="hero-actions" style="margin-top: 2rem; justify-content: center;">
                <a href="{{ url('/') }}#contact" class="btn-read-more" aria-label="Contact us for digital marketing services">Get Free Strategy Session <i data-lucide="arrow-right"></i></a>
            </div>
        </div>
    </section>

    <!-- Split Intro Section -->
    <section class="webapp-split-section">
        <div class="split-container">
            <div class="split-text reveal">
                <h2>Maximize Conversion Rate & <span>Accelerate Brand Growth</span></h2>
                <p>At Crowns IT, we combine sophisticated market analytics with cutting-edge advertising systems to grow your online business. We don't just generate vanity clicks—we focus on building robust sales funnels that turn visitors into long-term loyal customers.</p>
                <ul class="features-list">
                    <li><i data-lucide="target"></i> <strong>Hyper-Targeted Campaigns:</strong> Reach decision-makers using data-driven demographic and interest filters.</li>
                    <li><i data-lucide="trending-up"></i> <strong>Dominant Organic Search:</strong> Rank for competitive transactional search terms with ethical white-hat SEO.</li>
                    <li><i data-lucide="sparkles"></i> <strong>High-Impact Creative Content:</strong> Captivate social feeds with brand-aligned copies and premium graphics.</li>
                    <li><i data-lucide="pie-chart"></i> <strong>Transparent Performance Tracking:</strong> Access unified dashboards containing full attribution and CPA reports.</li>
                </ul>
            </div>
            <div class="split-image reveal">
                <div class="tab-image">
                    <img src="{{ $getImageUrl('split_image', asset('images/webapp_side_img.png')) }}" alt="{{ $getAltText('split_image', 'Digital Marketing Campaign Management Dashboard and Performance Analytics') }}" loading="lazy">
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Showcase Banner Section -->
    <section class="webapp-stats-showcase">
        <div class="stats-header reveal" style="text-align: center; margin-bottom: 3.5rem;">
            <h2 style="font-size: clamp(2rem, 3.5vw, 3rem); font-weight: 800; color: #1e293b; margin-bottom: 1rem;">Accelerate Growth & <span>Optimize ROI</span></h2>
            <p style="color: #64748b; font-size: 1.1rem; max-width: 800px; margin: 0 auto; line-height: 1.6;">Our marketing campaigns are built on empirical testing, continuous split testing, and strict target cost-per-acquisition frameworks.</p>
        </div>
        <div class="stats-banner-container reveal">
            <div class="stats-banner-grid">
                <!-- Left Capsule (Abstract Shape) -->
                <div class="stats-capsule stats-visual-purple">
                    <div class="scroll-shape"></div>
                </div>

                <!-- Arch 1: ROI Stats -->
                <div class="stats-arch stats-arch-purple">
                    <div class="stats-arch-content">
                        <h3>350%+</h3>
                        <h4>Average ROI Increase</h4>
                        <p>We systematically audit, track, and scale ad campaigns to optimize efficiency.</p>
                    </div>
                </div>

                <!-- Center Capsule: Performance dashboard visual -->
                <div class="stats-capsule stats-developer-img">
                    <img src="{{ $getImageUrl('stats_center_image', asset('images/webapp_pos.png')) }}" alt="{{ $getAltText('stats_center_image', 'Realtime advertising cost and conversion analytics dashboard') }}" loading="lazy">
                </div>

                <!-- Arch 2: Global Reach Stats -->
                <div class="stats-arch stats-arch-blue">
                    <div class="stats-arch-content">
                        <h3>10M+</h3>
                        <h4>Ad Impressions Managed</h4>
                        <p>Running high-impact campaigns across Facebook, Google, and LinkedIn.</p>
                    </div>
                </div>

                <!-- Right Capsule (Abstract Shape) -->
                <div class="stats-capsule stats-visual-blue">
                    <div class="ribbon-shape"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Marketing Solutions Tabs Section -->
    <section class="webapp-tabs-section">
        <div class="tabs-header reveal">
            <h2>Our Comprehensive <span>Marketing Systems</span></h2>
            <p>We deploy full-funnel digital marketing systems tailored to your specific audience segments, maximizing your business development.</p>
        </div>

        <div class="tabs-container reveal">
            <div class="tabs-nav">
                <button class="tab-btn active" data-tab="seo">Search Engine Optimization (SEO)</button>
                <button class="tab-btn" data-tab="smm">Social Media Marketing (SMM)</button>
                <button class="tab-btn" data-tab="ppc">PPC Advertising</button>
                <button class="tab-btn" data-tab="email">Email & Automation</button>
                <button class="tab-btn" data-tab="cro">Analytics & CRO</button>
            </div>

            <div class="tabs-content">
                <!-- SEO (Search Engine Optimization) -->
                <div class="tab-pane active" id="tab-seo">
                    <div class="tab-split">
                        <div class="tab-image">
                          <img src="{{ $getImageUrl('service_seo', asset('images/marketing_seo.png')) }}" alt="{{ $getAltText('service_seo', 'Organic Search Engine Optimization and Keyword Rankings') }}" loading="lazy">
                        </div>
                        <div class="tab-text">
                            <h3>Search Engine Optimization (SEO)</h3>
                            <p>Capture high-intent organic search traffic. We perform comprehensive technical SEO audits, implement optimized content cluster strategies, and execute high-authority link-building campaigns. Secure top-ranking search visibility for terms that drive actual sales, building long-term sustainable growth without ongoing ad costs.</p>
                            <a href="{{ url('/') }}#contact" class="btn-read-more" style="margin-top: 1.5rem; padding: 0.6rem 1.2rem; font-size: 0.85rem;" aria-label="Request a SEO Audit">Request SEO Audit</a>
                        </div>
                    </div>
                </div>

                <!-- SMM (Social Media Marketing) -->
                <div class="tab-pane" id="tab-smm">
                    <div class="tab-split">
                        <div class="tab-text">
                            <h3>Social Media Marketing (SMM)</h3>
                            <p>Establish a commanding presence on key social platforms. We design stunning custom graphics, create high-impact reels and video scripts, and manage daily community engagement. Our strategies grow your follower base, foster strong organic reach, and run native social campaigns that cultivate a passionate brand community.</p>
                            <a href="{{ url('/') }}#contact" class="btn-read-more" style="margin-top: 1.5rem; padding: 0.6rem 1.2rem; font-size: 0.85rem;" aria-label="Learn about SMM systems">Boost Social Reach</a>
                        </div>
                        <div class="tab-image">
                          <img src="{{ $getImageUrl('service_social', asset('images/uiux_visual.png')) }}" alt="{{ $getAltText('service_social', 'Social Media Growth Strategy and Brand Campaign') }}" loading="lazy">
                        </div>
                    </div>
                </div>

                <!-- PPC (Pay-Per-Click Advertising) -->
                <div class="tab-pane" id="tab-ppc">
                    <div class="tab-split">
                        <div class="tab-image">
                          <img src="{{ $getImageUrl('service_ppc', asset('images/uiux_testing.png')) }}" alt="{{ $getAltText('service_ppc', 'Google Ads and Meta PPC Campaign Optimization') }}" loading="lazy">
                        </div>
                        <div class="tab-text">
                            <h3>Paid Advertising (Google & Meta Ads)</h3>
                            <p>Drive immediate, highly qualified traffic that converts instantly. We manage end-to-end Pay-Per-Click campaigns, specializing in high-performing Google Search, Shopping, YouTube Ads, and Meta (Facebook & Instagram) pixel-tracked conversion ads. We optimize your ad spend by matching compelling creatives with perfect audience lists, driving down cost-per-lead.</p>
                            <a href="{{ url('/') }}#contact" class="btn-read-more" style="margin-top: 1.5rem; padding: 0.6rem 1.2rem; font-size: 0.85rem;" aria-label="Launch PPC Campaigns">Launch Paid Ads</a>
                        </div>
                    </div>
                </div>

                <!-- Email Marketing & Automation -->
                <div class="tab-pane" id="tab-email">
                    <div class="tab-split">
                        <div class="tab-text">
                            <h3>Email Marketing & Marketing Automation</h3>
                            <p>Nurture and convert leads on auto-pilot. We build customized email marketing architectures, integrating automated customer journeys, lead magnets, abandoned cart follow-ups, and targeted newsletter campaigns. Speak directly to your prospects at each step of their purchase decision, maximizing lifetime value and brand loyalty.</p>
                            <a href="{{ url('/') }}#contact" class="btn-read-more" style="margin-top: 1.5rem; padding: 0.6rem 1.2rem; font-size: 0.85rem;" aria-label="Setup Marketing Automation">Setup Automated Flows</a>
                        </div>
                        <div class="tab-image">
                          <img src="{{ $getImageUrl('service_email', asset('images/uiux_wireframes.png')) }}" alt="{{ $getAltText('service_email', 'Email Campaign Flow and Lead Generation Funnel') }}" loading="lazy">
                        </div>
                    </div>
                </div>

                <!-- CRO and Web Analytics -->
                <div class="tab-pane" id="tab-cro">
                    <div class="tab-split">
                        <div class="tab-image">
                          <img src="{{ $getImageUrl('service_cro', asset('images/uiux_research.png')) }}" alt="{{ $getAltText('service_cro', 'Conversion Rate Optimization CRO and Google Analytics Tracking') }}" loading="lazy">
                        </div>
                        <div class="tab-text">
                            <h3>Web Analytics & Conversion Rate Optimization (CRO)</h3>
                            <p>Make data-backed business decisions. We configure advanced Google Analytics 4 (GA4) event tracking, Google Tag Manager custom triggers, and heatmap tracking tools. By analyzing user behavior paths, drop-off funnels, and landing page layouts, we optimize copy and design to squeeze maximum leads and sales from your existing traffic.</p>
                            <a href="{{ url('/') }}#contact" class="btn-read-more" style="margin-top: 1.5rem; padding: 0.6rem 1.2rem; font-size: 0.85rem;" aria-label="Get CRO Consultation">Analyze Funnel Performance</a>
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
                <p>Have questions about professional digital marketing? Find answers to the most common queries below.</p>
            </div>

            <div class="faq-list">
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>How long does it take to see results from search engine optimization (SEO)?</h3>
                        <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>Unlike paid advertising, SEO is a long-term compounding strategy. While initial technical optimization fixes are completed in the first few weeks, search engine crawling, domain authority growth, and page ranking usually take 3 to 6 months to display significant organic traffic growth. However, this traffic is highly qualified and compounds over time without click costs.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>What is the difference between SEO and PPC ads?</h3>
                        <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>SEO focuses on ranking organically on search engine results pages by building domain authority, content, and high technical performance, providing long-term free traffic. PPC (Pay-Per-Click) advertising involves buying ad spaces (such as on Google Search or Meta feeds) to get instant top placement. PPC works instantly but stops when the ad budget is exhausted.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>How do you determine the correct monthly ad budget for Google/Meta ads?</h3>
                        <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>We analyze your industry benchmarks, target customer value, and estimated average cost-per-click (CPC). We usually recommend starting with an exploratory testing budget to discover conversion rates and customer acquisition cost (CAC). Once a profitable acquisition model is verified, we scale the budget systematically to increase transaction volumes.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Do you write the copy and design all creatives for social media and paid campaigns?</h3>
                        <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, absolutely. Crowns IT is a full-service software and digital agency. We have in-house copywriting, graphics design, and video production teams who write, design, and render high-impact social media creatives, ad scripts, ad banners, and premium landing pages to ensure full consistency and high conversion rates.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>How do we track the performance and ROI of our campaigns?</h3>
                        <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>We believe in absolute transparency. We build customized, live Looker Studio or Google Analytics 4 reporting dashboards for your business. These dashboards track critical business metrics such as total cost, impressions, click-through rates, generated leads/sales, cost-per-acquisition (CPA), and overall Return on Ad Spend (ROAS) in real-time.</p>
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
