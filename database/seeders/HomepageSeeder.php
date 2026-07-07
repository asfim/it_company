<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomepageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        // 1. Seed homepage_settings
        $settings = [
            // HERO
            [
                'key' => 'hero_tagline',
                'value' => 'Excellence is not an option,',
                'label' => 'Hero Tagline',
                'type' => 'text',
                'group' => 'hero',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'key' => 'hero_title',
                'value' => 'It’s our standard.',
                'label' => 'Hero Title',
                'type' => 'text',
                'group' => 'hero',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'key' => 'hero_description',
                'value' => 'We deliver custom software solutions focused on performance, scalability, and innovation. Our support team ensures smooth communication and a seamless project experience. We focus on client satisfaction, long-term partnerships, and business growth.',
                'label' => 'Hero Description',
                'type' => 'textarea',
                'group' => 'hero',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'key' => 'hero_slider_image_1',
                'value' => 'assets/1.png',
                'label' => 'Hero Slider Image 1',
                'type' => 'image',
                'group' => 'hero',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'key' => 'hero_slider_image_2',
                'value' => 'assets/2.png',
                'label' => 'Hero Slider Image 2',
                'type' => 'image',
                'group' => 'hero',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'key' => 'hero_slider_image_3',
                'value' => 'assets/3.png',
                'label' => 'Hero Slider Image 3',
                'type' => 'image',
                'group' => 'hero',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'key' => 'hero_stat_satisfied_clients_num',
                'value' => '100+',
                'label' => 'Hero Stat: Satisfied Clients Number',
                'type' => 'text',
                'group' => 'hero',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'key' => 'hero_stat_satisfied_clients_label',
                'value' => 'Satisfied Clients',
                'label' => 'Hero Stat: Satisfied Clients Label',
                'type' => 'text',
                'group' => 'hero',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'key' => 'hero_stat_users_num',
                'value' => '1M+',
                'label' => 'Hero Stat: Users Number',
                'type' => 'text',
                'group' => 'hero',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'key' => 'hero_stat_users_label',
                'value' => 'users every month',
                'label' => 'Hero Stat: Users Label',
                'type' => 'text',
                'group' => 'hero',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'key' => 'hero_stat_traffic_num',
                'value' => '1.2M+',
                'label' => 'Hero Stat: Traffic Number',
                'type' => 'text',
                'group' => 'hero',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'key' => 'hero_stat_traffic_label',
                'value' => 'Daily Website Traffic',
                'label' => 'Hero Stat: Traffic Label',
                'type' => 'text',
                'group' => 'hero',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'key' => 'hero_stat_delivered_num',
                'value' => '140+',
                'label' => 'Hero Stat: Delivered Solutions Number',
                'type' => 'text',
                'group' => 'hero',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'key' => 'hero_stat_delivered_label',
                'value' => 'Delivered Digital Solutions',
                'label' => 'Hero Stat: Delivered Solutions Label',
                'type' => 'text',
                'group' => 'hero',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'key' => 'hero_stat_presence_num',
                'value' => '2+',
                'label' => 'Hero Stat: Presence Countries Number',
                'type' => 'text',
                'group' => 'hero',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'key' => 'hero_stat_presence_label',
                'value' => 'Presence in Counties',
                'label' => 'Hero Stat: Presence Countries Label',
                'type' => 'text',
                'group' => 'hero',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'key' => 'hero_stat_payment_num',
                'value' => '3M+',
                'label' => 'Hero Stat: Payment Transactions Number',
                'type' => 'text',
                'group' => 'hero',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'key' => 'hero_stat_payment_label',
                'value' => 'Trusted Payment Transactions',
                'label' => 'Hero Stat: Payment Transactions Label',
                'type' => 'text',
                'group' => 'hero',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // SERVICES HEADING
            [
                'key' => 'services_eyebrow',
                'value' => 'OUR SERVICES',
                'label' => 'Services Eyebrow',
                'type' => 'text',
                'group' => 'services',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'key' => 'services_title',
                'value' => 'We Offer Sustainable Services For Your Business Growth',
                'label' => 'Services Title',
                'type' => 'text',
                'group' => 'services',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // WHY CHOOSE US HEADING
            [
                'key' => 'wcu_eyebrow',
                'value' => 'Why Choose Us',
                'label' => 'WCU Eyebrow',
                'type' => 'text',
                'group' => 'wcu',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'key' => 'wcu_title',
                'value' => 'Built Different, Built Better',
                'label' => 'WCU Title',
                'type' => 'text',
                'group' => 'wcu',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'key' => 'wcu_subtitle',
                'value' => 'We combine creativity with technology to deliver outcomes that matter.',
                'label' => 'WCU Subtitle',
                'type' => 'text',
                'group' => 'wcu',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // PROCESS HEADING
            [
                'key' => 'process_eyebrow',
                'value' => 'How we work',
                'label' => 'Process Eyebrow',
                'type' => 'text',
                'group' => 'process',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'key' => 'process_title',
                'value' => 'Our simple process',
                'label' => 'Process Title',
                'type' => 'text',
                'group' => 'process',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'key' => 'process_subtitle',
                'value' => 'From idea to launch in 4 clear steps.',
                'label' => 'Process Subtitle',
                'type' => 'text',
                'group' => 'process',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // PRODUCT HEADING
            [
                'key' => 'product_eyebrow',
                'value' => 'OUR PRODUCT',
                'label' => 'Product Eyebrow',
                'type' => 'text',
                'group' => 'product',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'key' => 'product_title',
                'value' => 'Our Recent Products',
                'label' => 'Product Title',
                'type' => 'text',
                'group' => 'product',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // TECH HEADING
            [
                'key' => 'tech_eyebrow',
                'value' => 'Our Technology',
                'label' => 'Tech Eyebrow',
                'type' => 'text',
                'group' => 'tech',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'key' => 'tech_title',
                'value' => 'Technologies We Use',
                'label' => 'Tech Title',
                'type' => 'text',
                'group' => 'tech',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // TEAM HEADING
            [
                'key' => 'team_eyebrow',
                'value' => 'Our Team',
                'label' => 'Team Eyebrow',
                'type' => 'text',
                'group' => 'team',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'key' => 'team_title',
                'value' => 'Meet the Experts',
                'label' => 'Team Title',
                'type' => 'text',
                'group' => 'team',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'key' => 'team_subtitle',
                'value' => 'The dedicated professionals behind our success.',
                'label' => 'Team Subtitle',
                'type' => 'text',
                'group' => 'team',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'key' => 'team_center_image',
                'value' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=800&auto=format&fit=crop',
                'label' => 'Team Section Center Image',
                'type' => 'image',
                'group' => 'team',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // TESTIMONIALS HEADING
            [
                'key' => 'testimonials_eyebrow',
                'value' => 'TESTIMONIALS',
                'label' => 'Testimonials Eyebrow',
                'type' => 'text',
                'group' => 'testimonials',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'key' => 'testimonials_title',
                'value' => 'What Our Clients Say',
                'label' => 'Testimonials Title',
                'type' => 'text',
                'group' => 'testimonials',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('homepage_settings')->insert($settings);

        // 2. Seed homepage_services
        $services = [
            [
                'title' => 'E-Commerce Services',
                'description' => 'Everything you need to build, run, and grow an online business.',
                'icon' => 'building-2',
                'link' => '/services/web-application',
                'sort_order' => 10,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Mobile App Development',
                'description' => 'Reach customers anywhere with fast, user-friendly Android & iOS apps.',
                'icon' => 'smartphone',
                'link' => '/services/software',
                'sort_order' => 20,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Custom Web Platform',
                'description' => 'Build scalable and custom web platforms tailored to your business needs.',
                'icon' => 'monitor',
                'link' => '/services/web-development',
                'sort_order' => 30,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Website Design & Dev',
                'description' => 'Create modern, responsive websites with seamless design and development.',
                'icon' => 'layout',
                'link' => '/services/web-development',
                'sort_order' => 40,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Digital Marketing',
                'description' => 'Grow your business with result-driven digital marketing strategies and campaigns.',
                'icon' => 'trending-up',
                'link' => '/services/digital-marketing',
                'sort_order' => 50,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Graphics Design',
                'description' => 'Create eye-catching graphics and creative designs that strengthen your brand identity.',
                'icon' => 'cpu',
                'link' => '/services/graphics-design',
                'sort_order' => 60,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('homepage_services')->insert($services);

        // 3. Seed homepage_wcu_cards
        $wcuCards = [
            [
                'title' => 'Trusted & Reliable',
                'description' => '100% delivery commitment with full transparency throughout every project phase.',
                'icon_svg' => '<svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" /></svg>',
                'sort_order' => 10,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'On-Time Delivery',
                'description' => 'We respect your deadlines and deliver pixel-perfect results on schedule every time.',
                'icon_svg' => '<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" /><polyline points="12 6 12 12 16 14" /></svg>',
                'sort_order' => 20,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Expert Team',
                'description' => '15+ skilled professionals across design, development, and marketing disciplines.',
                'icon_svg' => '<svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" /><circle cx="9" cy="7" r="4" /><path d="M23 21v-2a4 4 0 0 0-3-3.87" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /></svg>',
                'sort_order' => 30,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Results Driven',
                'description' => 'Every strategy is backed by data and focused on growing your business metrics.',
                'icon_svg' => '<svg viewBox="0 0 24 24"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17" /><polyline points="16 7 22 7 22 13" /></svg>',
                'sort_order' => 40,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('homepage_wcu_cards')->insert($wcuCards);

        // 4. Seed homepage_processes
        $processes = [
            [
                'step_number' => 1,
                'title' => 'Discovery',
                'description' => 'We understand your goals, audience, and requirements in depth.',
                'icon_svg' => 'search', // Standard lucide lookup
                'sort_order' => 10,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'step_number' => 2,
                'title' => 'Design',
                'description' => 'We create wireframes and visual designs tailored to your brand.',
                'icon_svg' => '<svg class="process-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>',
                'sort_order' => 20,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'step_number' => 3,
                'title' => 'Develop',
                'description' => 'Our engineers build robust, scalable solutions with clean code.',
                'icon_svg' => 'code',
                'sort_order' => 30,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'step_number' => 4,
                'title' => 'Launch',
                'description' => 'We deploy, test, and support your project for long-term success.',
                'icon_svg' => 'rocket',
                'sort_order' => 40,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('homepage_processes')->insert($processes);

        // 5. Seed homepage_products
        $products = [
            [
                'title' => 'Build And Scale Your Online Store',
                'description' => 'E-commerce platform helps you manage inventory, process payments securely, and deliver exceptional shopping experiences to your customers across all devices.',
                'features' => "Product & Inventory Management\nSecure Payment Gateways\nOrder Tracking & Analytics",
                'mock_title' => 'E-Commerce',
                'image_path' => 'images/webapp_ecommerce.png',
                'sort_order' => 10,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Simplify Trade Finance Operations',
                'description' => 'A complete solution for managing Letters of Credit, streamlining the documentation process, and ensuring secure international trade transactions.',
                'features' => "Automated LC Processing\nSecure Document Handling\nReal-time Status Tracking",
                'mock_title' => 'Trade Finance',
                'image_path' => 'images/webapp_erp.png',
                'sort_order' => 20,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Fast And Reliable Point Of Sale',
                'description' => 'Our modern POS system handles fast checkout, tracks offline and online sales, manages inventory automatically, and provides daily sales insights.',
                'features' => "Fast Checkout Processing\nReal-time Inventory Sync\nSales Reporting & Insights",
                'mock_title' => 'POS System',
                'image_path' => 'images/webapp_pos.png',
                'sort_order' => 30,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Complete ISP Billing And Management',
                'description' => 'Powerful ISP management software for automated billing, bandwidth tracking, customer ticketing, and network monitoring all in one unified dashboard.',
                'features' => "Automated Billing & Invoicing\nBandwidth Management\nCustomer Support Ticketing",
                'mock_title' => 'ISP Admin',
                'image_path' => 'images/uiux_systems.png',
                'sort_order' => 40,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Memorable Logos That Define Your Brand',
                'description' => 'Professional logo design crafted to reflect your brand personality, stand out in the market, and work flawlessly across digital and print platforms.',
                'features' => "Custom Logo Concepts\nBrand Identity Guidelines\nVector & Print-Ready Files",
                'mock_title' => 'Logo Design',
                'image_path' => 'images/logo_design.png',
                'sort_order' => 50,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('homepage_products')->insert($products);

        // 6. Seed homepage_technologies
        $technologies = [
            // Top Row (Left to Right)
            [
                'name' => 'PHP',
                'icon_class' => 'devicon-php-plain colored',
                'direction' => 'left',
                'sort_order' => 10,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'LARAVEL',
                'icon_class' => 'devicon-laravel-plain colored',
                'direction' => 'left',
                'sort_order' => 20,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'WORDPRESS',
                'icon_class' => 'devicon-wordpress-plain colored',
                'direction' => 'left',
                'sort_order' => 30,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'REACT JS',
                'icon_class' => 'devicon-react-original colored',
                'direction' => 'left',
                'sort_order' => 40,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'VUE JS',
                'icon_class' => 'devicon-vuejs-plain colored',
                'direction' => 'left',
                'sort_order' => 50,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'NODE JS',
                'icon_class' => 'devicon-nodejs-plain colored',
                'direction' => 'left',
                'sort_order' => 60,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'PYTHON',
                'icon_class' => 'devicon-python-plain colored',
                'direction' => 'left',
                'sort_order' => 70,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'MYSQL',
                'icon_class' => 'devicon-mysql-plain colored',
                'direction' => 'left',
                'sort_order' => 80,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Bottom Row (Left to Right, reversed direction)
            [
                'name' => 'ANDROID',
                'icon_class' => 'devicon-android-plain colored',
                'direction' => 'right',
                'sort_order' => 90,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'APPLE IOS',
                'icon_class' => 'devicon-apple-original',
                'direction' => 'right',
                'sort_order' => 100,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'HTML5',
                'icon_class' => 'devicon-html5-plain colored',
                'direction' => 'right',
                'sort_order' => 110,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'CSS3',
                'icon_class' => 'devicon-css3-plain colored',
                'direction' => 'right',
                'sort_order' => 120,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'TAILWIND',
                'icon_class' => 'devicon-tailwindcss-plain colored',
                'direction' => 'right',
                'sort_order' => 130,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'JAVASCRIPT',
                'icon_class' => 'devicon-javascript-plain colored',
                'direction' => 'right',
                'sort_order' => 140,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'TYPESCRIPT',
                'icon_class' => 'devicon-typescript-plain colored',
                'direction' => 'right',
                'sort_order' => 150,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'FIGMA',
                'icon_class' => 'devicon-figma-plain colored',
                'direction' => 'right',
                'sort_order' => 160,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('homepage_technologies')->insert($technologies);

        // 7. Seed homepage_team_members
        $teamMembers = [
            [
                'name' => 'John Doe',
                'designation' => 'CEO & Founder',
                'description' => 'Visionary leader with 15+ years of experience in driving digital innovation and corporate strategy.',
                'image_path' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=200&auto=format&fit=crop',
                'sort_order' => 10,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Jane Smith',
                'designation' => 'Lead Developer',
                'description' => 'Expert in scalable architecture, cloud computing, and modern web technologies.',
                'image_path' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=200&auto=format&fit=crop',
                'sort_order' => 20,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Mike Johnson',
                'designation' => 'UI/UX Designer',
                'description' => 'Crafting intuitive and beautiful user experiences with pixel-perfect precision.',
                'image_path' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?q=80&w=200&auto=format&fit=crop',
                'sort_order' => 30,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Emily Davis',
                'designation' => 'Marketing Manager',
                'description' => 'Driving growth through data-driven digital marketing strategies and SEO expertise.',
                'image_path' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?q=80&w=200&auto=format&fit=crop',
                'sort_order' => 40,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'David Wilson',
                'designation' => 'Project Manager',
                'description' => 'Ensuring smooth agile deliveries and seamless communication across all client projects.',
                'image_path' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=200&auto=format&fit=crop',
                'sort_order' => 50,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('homepage_team_members')->insert($teamMembers);

        // 8. Seed homepage_testimonials
        $testimonials = [
            [
                'name' => 'Marcus Lee',
                'designation' => 'Social Media Manager',
                'stars' => 5,
                'review' => 'As a professional managing multiple accounts, I rely on Crowns IT for consistent growth. Their service is secure, fast and never triggers flags.',
                'avatar_bg' => '#3b82f6',
                'row' => 1,
                'sort_order' => 10,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Diego Costa',
                'designation' => 'Business Owner',
                'stars' => 4,
                'review' => 'Used Crowns IT for our promo video. Got 10K+ views overnight, which helped us trend locally. Customer support was responsive and faster than promised!',
                'avatar_bg' => '#ef4444',
                'row' => 1,
                'sort_order' => 20,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Aisha Johnson',
                'designation' => 'Lifestyle Blogger',
                'stars' => 5,
                'review' => 'Needed a confidence boost for my new account—Crowns IT\'s views made my content look popular instantly. No drop-offs!',
                'avatar_bg' => '#d946ef',
                'row' => 1,
                'sort_order' => 30,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Emma Thompson',
                'designation' => 'Instagram Influencer',
                'stars' => 5,
                'review' => 'I needed a quick boost to kickstart my new account, and Crowns IT delivered real-looking followers within minutes. Highly recommend for creators!',
                'avatar_bg' => '#10b981',
                'row' => 1,
                'sort_order' => 40,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Sophie Laurent',
                'designation' => 'Fashion Creator',
                'stars' => 5,
                'review' => 'Crowns IT\'s Instagram likes saved my campaign! My engagement metrics looked strong for brand deals, and the likes came from real profiles.',
                'avatar_bg' => '#f59e0b',
                'row' => 2,
                'sort_order' => 50,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Priya Sharma',
                'designation' => 'Marketing Manager',
                'stars' => 5,
                'review' => 'Bought Instagram likes for our product launch campaign—results were instant! The likes looked genuine, and our post visibility soared.',
                'avatar_bg' => '#f43f5e',
                'row' => 2,
                'sort_order' => 60,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Tomás Rivera',
                'designation' => 'Soccer Player',
                'stars' => 4,
                'review' => 'After going viral once, I used Crowns IT to maintain momentum with extra TikTok views. My follower count doubled, and scouts actually reached out!',
                'avatar_bg' => '#8b5cf6',
                'row' => 2,
                'sort_order' => 70,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Chloe Dubois',
                'designation' => 'Makeup Artist',
                'stars' => 5,
                'review' => 'My makeup reels weren\'t getting traction until I tried Crowns IT\'s TikTok followers. Gained 5K real-seeming followers in a day—clients noticed!',
                'avatar_bg' => '#06b6d4',
                'row' => 2,
                'sort_order' => 80,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('homepage_testimonials')->insert($testimonials);
    }
}
