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
            <p class="hero-tagline">{{ \App\Models\HomepageSetting::getValue('hero_tagline') }}</p>
            <div class="hero-bold">
                {{ \App\Models\HomepageSetting::getValue('hero_title') }}
                <span class="underline-bar"></span>
            </div>

            <p class="hero-desc">
                {{ \App\Models\HomepageSetting::getValue('hero_description') }}
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
                <img id="heroSlider" src="{{ \App\Models\HomepageSetting::getValue('hero_slider_image_1') }}" alt="Crowns IT Software Agency - Hero Portfolio" style="transition: opacity 0.8s ease-in-out; width: 100%; height: 100%; object-fit: cover;">
            </div>

            <!-- Card: Talents -->
            <div class="card-talents">
                <div class="card-meet">Trusted</div>
                <div class="card-with">by over {{ \App\Models\HomepageSetting::getValue('hero_stat_satisfied_clients_num') }}</div>
                <div class="card-talents-num">{{ \App\Models\HomepageSetting::getValue('hero_stat_satisfied_clients_label') }}</div>
                <div class="avatars-row">
                    <div class="avatar av1">SK</div>
                    <div class="avatar av2">MR</div>
                    <div class="avatar-plus">+</div>
                </div>
            </div>

            <!-- Card: Systems 160M -->
            <div class="card-systems">
                <div class="card-sys-label">Powering systems used by</div>
                <div class="card-sys-num">{{ \App\Models\HomepageSetting::getValue('hero_stat_users_num') }}</div>
                <div class="card-sys-sub">{{ \App\Models\HomepageSetting::getValue('hero_stat_users_label') }}</div>
            </div>

            <!-- Card: Hits 2M -->
            <div class="card-hits">
                <div class="card-hits-num">{{ \App\Models\HomepageSetting::getValue('hero_stat_traffic_num') }}</div>
                <div class="card-hits-label">{{ \App\Models\HomepageSetting::getValue('hero_stat_traffic_label') }}</div>
            </div>

            <!-- Bottom stats row -->
            <div class="card-stats-row">
                <div class="stat-mini">
                    <div class="stat-mini-label">{{ \App\Models\HomepageSetting::getValue('hero_stat_delivered_label') }}</div>
                    <div class="stat-mini-num">{{ \App\Models\HomepageSetting::getValue('hero_stat_delivered_num') }}</div>
                </div>
                <div class="stat-mini">
                    <div class="stat-mini-label">{{ \App\Models\HomepageSetting::getValue('hero_stat_presence_label') }}</div>
                    <div class="stat-mini-num">{{ \App\Models\HomepageSetting::getValue('hero_stat_presence_num') }}</div>
                </div>
                <div class="stat-mini">
                    <div class="stat-mini-label">{{ \App\Models\HomepageSetting::getValue('hero_stat_payment_label') }}</div>
                    <div class="stat-mini-num">{{ \App\Models\HomepageSetting::getValue('hero_stat_payment_num') }}</div>
                </div>
            </div>
        </div>
    </section>

    <section class="services-clock-section" id="services">
        <div class="section-header reveal">
            <div class="hero-tag">{{ \App\Models\HomepageSetting::getValue('services_eyebrow') }}</div>
            <h2>{{ \App\Models\HomepageSetting::getValue('services_title') }}</h2>
        </div>

        <div class="clock-container reveal">
            <div class="clock-center">
                <h3>SERVICES</h3>
                <br>
                <button class="btn-read-more">More Services</button>


            </div>

            <!-- The spinning hand -->
            <div class="clock-hand"></div>

            @foreach($services as $index => $service)
                <div class="clock-item-wrapper pos-{{ $index + 1 }}">
                    <a href="{{ $service->link }}" class="clock-card">
                        <div class="clock-icon"><i data-lucide="{{ $service->icon }}"></i></div>
                        <h3>{{ $service->title }}</h3>
                        <p>{{ $service->description }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    <!-- WHY CHOOSE US SECTION -->
    <section class="wcu-section" id="why-choose-us">
        <p class="wcu-eyebrow">{{ \App\Models\HomepageSetting::getValue('wcu_eyebrow') }}</p>
        <h2 class="wcu-title">{{ \App\Models\HomepageSetting::getValue('wcu_title') }}</h2>
        <p class="wcu-subtitle">{{ \App\Models\HomepageSetting::getValue('wcu_subtitle') }}</p>

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

            @php $wcuIds = ['TL','TR','BL','BR']; @endphp
            @foreach($wcuCards as $idx => $card)
                @php $cardId = $wcuIds[$idx] ?? 'C'.$idx; @endphp
                <div class="wcu-card" id="wcuCard{{ $cardId }}">
                    <div class="wcu-icon-wrap">
                        {!! $card->icon_svg !!}
                    </div>
                    <h3>{{ $card->title }}</h3>
                    <p>{{ $card->description }}</p>
                </div>
                @if($idx === 1)
                    <!-- Center -->
                    <div class="wcu-center-img" id="wcuCenterImg">
                        <div class="wcu-building-placeholder">
                            <svg class="wcu-building-svg" viewBox="0 0 120 160" xmlns="http://www.w3.org/2000/svg">
                                <polygon points="60,10 110,40 110,150 10,150 10,40" fill="rgba(34,197,94,0.05)" stroke="rgba(34,197,94,0.4)" stroke-width="1" />
                                <g fill="rgba(34,197,94,0.5)">
                                    <rect x="25" y="55" width="8" height="10" rx="1" /><rect x="40" y="55" width="8" height="10" rx="1" /><rect x="55" y="55" width="8" height="10" rx="1" /><rect x="70" y="55" width="8" height="10" rx="1" /><rect x="85" y="55" width="8" height="10" rx="1" />
                                    <rect x="25" y="75" width="8" height="10" rx="1" /><rect x="40" y="75" width="8" height="10" rx="1" /><rect x="55" y="75" width="8" height="10" rx="1" /><rect x="70" y="75" width="8" height="10" rx="1" /><rect x="85" y="75" width="8" height="10" rx="1" />
                                    <rect x="25" y="95" width="8" height="10" rx="1" /><rect x="40" y="95" width="8" height="10" rx="1" /><rect x="70" y="95" width="8" height="10" rx="1" /><rect x="85" y="95" width="8" height="10" rx="1" />
                                </g>
                                <ellipse cx="60" cy="150" rx="45" ry="6" fill="rgba(34,197,94,0.15)" />
                            </svg>
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
    </section>

    <!-- OUR PROCESS SECTION -->
    <section class="process-section" id="process">
        <div class="process-container">
            <div class="process-header reveal">
                <div class="process-label">{{ \App\Models\HomepageSetting::getValue('process_eyebrow') }}</div>
                <h2>{{ \App\Models\HomepageSetting::getValue('process_title') }}</h2>
                <p>{{ \App\Models\HomepageSetting::getValue('process_subtitle') }}</p>
            </div>

            <div class="process-timeline-wrapper reveal">
                <div class="process-timeline-line"></div>
                <div class="process-timeline-progress"></div>

                <div class="process-timeline">
                    @foreach($processes as $step)
                        <div class="process-step">
                            <div class="process-step-circle">
                                <div class="process-circle">{{ $step->step_number }}</div>
                            </div>
                            <div class="process-card">
                                @if(strlen($step->icon_svg) < 30)
                                    {{-- Lucide icon name --}}
                                    <i data-lucide="{{ $step->icon_svg }}" class="process-icon"
                                        style="color: var(--green); width: 40px; height: 40px; margin: 0 auto 1.5rem; display: block;"></i>
                                @else
                                    {{-- Raw SVG code --}}
                                    {!! $step->icon_svg !!}
                                @endif
                                <h3 class="process-title">{{ $step->title }}</h3>
                                <p class="process-desc">{{ $step->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- OUR PRODUCT SECTION -->
    <section class="product-section-wrapper" id="product">
        <div class="product-section-heading">
            <div class="product-heading-label">{{ \App\Models\HomepageSetting::getValue('product_eyebrow') }}</div>
            <p class="product-heading-sub">{{ \App\Models\HomepageSetting::getValue('product_title') }}</p>
        </div>

        <div class="product-panel">

            <!-- Tab Sidebar -->
            <div class="product-tab-sidebar">
                <div class="product-tab-icon"><i data-lucide="building-2"></i></div>
                @foreach($products as $index => $product)
                    <button class="product-tab-btn {{ $index === 0 ? 'active' : '' }}" data-idx="{{ $index }}">{{ $product->mock_title }}</button>
                @endforeach
            </div>

            <!-- Content Area -->
            @php $firstProduct = $products->first(); @endphp
            <div class="product-content-area">
                <h3 class="product-prod-title" id="prodTitle">{{ $firstProduct?->title }}</h3>
                <p class="product-prod-desc" id="prodDesc">{{ $firstProduct?->description }}</p>
                <div class="product-feature-list" id="featList">
                    @foreach($firstProduct?->features_list ?? [] as $feature)
                        <div class="product-feature-item"><span class="product-feat-dot"></span>{{ $feature }}</div>
                    @endforeach
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
                        <span class="product-mock-label" id="mockTitle">{{ $firstProduct?->mock_title }}</span>
                    </div>
                    <div class="product-mock-body">
                        <img id="mockImage" class="product-preview-img"
                            src="{{ $firstProduct?->image_url }}"
                            alt="{{ $firstProduct?->mock_title }} Product Preview">
                    </div>
                </div>
            </div>

        </div>
    </section>

    <script>
        const productsData = [
            @foreach($products as $product)
            {
                title: @json($product->title),
                desc: @json($product->description),
                features: @json($product->features_list),
                mockTitle: @json($product->mock_title),
                image: @json($product->image_url)
            }{{ !$loop->last ? ',' : '' }}
            @endforeach
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
                    if (window.lucide) { window.lucide.createIcons(); }
                });
            });
        });
    </script>

    <!-- OUR TECHNOLOGY SECTION -->
    <section class="tech-section" id="technology">
        <div class="tech-section-heading">
            <p class="tech-eyebrow">{{ \App\Models\HomepageSetting::getValue('tech_eyebrow') }}</p>
            <h2 class="tech-title">{{ \App\Models\HomepageSetting::getValue('tech_title') }}</h2>
        </div>

        @php
            $techLeft  = $technologies->where('direction', 'left')->values();
            $techRight = $technologies->where('direction', 'right')->values();
        @endphp
        <div class="tech-marquee-wrapper">
            <!-- Top Row (Right to Left) -->
            <div class="tech-marquee tech-marquee-left">
                <div class="tech-marquee-track">
                    @foreach($techLeft->concat($techLeft) as $tech)
                        <div class="tech-card"><i class="{{ $tech->icon_class }}"></i><span>{{ $tech->name }}</span></div>
                    @endforeach
                </div>
            </div>
            <!-- Bottom Row (Left to Right) -->
            <div class="tech-marquee tech-marquee-right">
                <div class="tech-marquee-track reverse">
                    @foreach($techRight->concat($techRight) as $tech)
                        <div class="tech-card"><i class="{{ $tech->icon_class }}"></i><span>{{ $tech->name }}</span></div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- OUR TEAM SECTION -->
    <section class="team-section" id="team">
        <p class="team-eyebrow">{{ \App\Models\HomepageSetting::getValue('team_eyebrow') }}</p>
        <h2 class="team-title">{{ \App\Models\HomepageSetting::getValue('team_title') }}</h2>
        <p class="team-subtitle">{{ \App\Models\HomepageSetting::getValue('team_subtitle') }}</p>

        <div class="team-grid-wrapper">
            @foreach($teamMembers as $index => $member)
                @if($index === 1)
                    <!-- Center Image -->
                    <div class="team-center-img-wrapper">
                        <img src="{{ \App\Models\HomepageSetting::getValue('team_center_image') }}" alt="Company Team">
                    </div>
                @endif
                <div class="team-card bg-{{ $index + 1 }}">
                    <div class="team-avatar">
                        <img src="{{ $member->image_url }}" alt="{{ $member->name }}">
                    </div>
                    <h3>{{ $member->name }}</h3>
                    <p class="designation">{{ $member->designation }}</p>
                    <p>{{ $member->description }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <!-- TESTIMONIALS SECTION -->
    <section class="testi-section" id="testimonials">
        <div class="testi-heading">
            <p class="testi-eyebrow">{{ \App\Models\HomepageSetting::getValue('testimonials_eyebrow') }}</p>
            <h2 class="testi-title">{{ \App\Models\HomepageSetting::getValue('testimonials_title') }}</h2>
        </div>

        @php
            $testiRow1 = $testimonials->filter(fn($t) => $t->row === 1)->values();
            $testiRow2 = $testimonials->filter(fn($t) => $t->row === 2)->values();
        @endphp
        <div class="testi-marquee-wrapper">
            <!-- Top Row (Left to Right) -->
            <div class="testi-marquee">
                <div class="testi-marquee-track testi-to-right">
                    @foreach($testiRow1->concat($testiRow1) as $testi)
                        <div class="testi-card">
                            <div class="testi-user">
                                <div class="testi-avatar" style="background:{{ $testi->avatar_color }}">{{ $testi->avatar_letter }}</div>
                                <div class="testi-info">
                                    <h4>{{ $testi->name }}</h4>
                                    <span>{{ $testi->role }}</span>
                                </div>
                            </div>
                            <div class="testi-stars">{{ $testi->stars }}</div>
                            <p>{{ $testi->content }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Bottom Row (Right to Left) -->
            <div class="testi-marquee">
                <div class="testi-marquee-track testi-to-left">
                    @foreach($testiRow2->concat($testiRow2) as $testi)
                        <div class="testi-card">
                            <div class="testi-user">
                                <div class="testi-avatar" style="background:{{ $testi->avatar_color }}">{{ $testi->avatar_letter }}</div>
                                <div class="testi-info">
                                    <h4>{{ $testi->name }}</h4>
                                    <span>{{ $testi->role }}</span>
                                </div>
                            </div>
                            <div class="testi-stars">{{ $testi->stars }}</div>
                            <p>{{ $testi->content }}</p>
                        </div>
                    @endforeach
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
                @foreach(\App\Models\HomepageSetting::getSliderImages() as $img)
                    @json($img){{ !$loop->last ? ',' : '' }}
                @endforeach
            ];
            let currentIndex = 0;
            const heroImg = document.getElementById('heroSlider');
            
            if (heroImg && images.length > 1) {
                setInterval(() => {
                    heroImg.style.opacity = 0;
                    setTimeout(() => {
                        currentIndex = (currentIndex + 1) % images.length;
                        heroImg.src = images[currentIndex];
                        heroImg.style.opacity = 1;
                    }, 800);
                }, 3000);
            }
        });
    </script>


@endsection
