<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => 'The Future of Custom Web Applications: Scaling in 2026',
                'slug' => 'the-future-of-custom-web-applications-scaling-in-2026',
                'category' => 'dev',
                'image_url' => 'images/webapp_side_img.png',
                'excerpt' => 'How modern cloud architectures, microservices, and serverless edge databases are transforming software scalability and performance standards for global enterprises.',
                'content' => "As we cross into 2026, custom web applications are facing unprecedented user demands. Traditional architectures are giving way to serverless database edges, globally distributed microservices, and advanced browser runtime environments.\n\nIn this guide, we dive deep into the core components that make modern applications scale seamlessly. From optimizing database read replicas to implementing global CDNs and edge functions, scaling is no longer just about vertical compute; it's about intelligent request routing and distributed state management.\n\nFurthermore, we explore the rise of client-side databases that synchronize with central servers, providing near-instant load times and robust offline capabilities. By utilizing technology stacks like Next.js, FastAPI, and PlanetScale, modern developers can build robust applications that cater to millions of daily active users.",
                'author_name' => 'Mahmud Sabuj',
                'author_avatar_text' => 'MS',
                'author_role' => 'Chief Technology Officer',
                'read_time' => '8 min read',
                'is_featured' => true,
            ],
            [
                'title' => 'Why Atomic Design Systems Are Essential for Enterprise UX',
                'slug' => 'why-atomic-design-systems-are-essential-for-enterprise-ux',
                'category' => 'design',
                'image_url' => 'images/uiux_systems.png',
                'excerpt' => 'Discover how reusable design token libraries speed up product development handoff by 200% while maintaining absolute consistency.',
                'content' => "Enterprise design projects can quickly become chaotic without a single source of truth. Atomic design, a methodology introduced by Brad Frost, breaks down interfaces into atoms, molecules, organisms, templates, and pages.\n\nBy mapping this concept to modern UI tools like Figma and code components in React or Vue, product teams can build modular design tokens that accelerate product launch times by over 200%.\n\nIn this post, we explain step-by-step how to define design tokens for typography, spacing, and colors, construct layout organisms, and verify that developers maintain absolute fidelity to the designs using automated visual regression tests.",
                'author_name' => 'Alex Mercer',
                'author_avatar_text' => 'AM',
                'author_role' => 'Principal UI/UX Designer',
                'read_time' => '5 min read',
                'is_featured' => false,
            ],
            [
                'title' => 'Optimizing Amazon KDP Listings for Maximum Sales',
                'slug' => 'optimizing-amazon-kdp-listings-for-maximum-sales',
                'category' => 'publishing',
                'image_url' => 'images/logo_design.png',
                'excerpt' => 'An expert KDP handbook explaining category selection formulas, metadata settings, and how A+ modular grids double conversions.',
                'content' => "Self-publishing on Amazon Kindle Direct Publishing (KDP) is highly competitive. Simply uploading a manuscript is no longer enough to ensure success.\n\nThis post reveals the formulas used by best-selling authors to choose low-competition keywords, select top categories, and write descriptions that capture readers.\n\nWe also examine how to design high-quality A+ Content modular layouts that build authority, reduce return rates, and increase conversion rates by up to 50% on your listing pages.",
                'author_name' => 'Thomas Chen',
                'author_avatar_text' => 'TC',
                'author_role' => 'Self-Publishing Director',
                'read_time' => '6 min read',
                'is_featured' => false,
            ],
            [
                'title' => 'Demystifying GA4: Creating High-Converting Funnels',
                'slug' => 'demystifying-ga4-creating-high-converting-funnels',
                'category' => 'marketing',
                'image_url' => 'images/marketing_seo.png',
                'excerpt' => 'Learn to configure custom event triggers in Google Tag Manager and analyze user heatmaps to optimize landing page bounce rates.',
                'content' => "Google Analytics 4 (GA4) represents a paradigm shift from Universal Analytics. By focusing on event-based tracking, GA4 provides a more granular view of user behavior.\n\nHowever, setting it up correctly can be daunting. We walk you through configuring conversion triggers inside Google Tag Manager (GTM), constructing landing page path funnels, and identifying drop-offs.\n\nBy combining GA4 metrics with user session recording tools, you can discover hidden friction points on your landing pages and decrease overall bounce rates.",
                'author_name' => 'Elena Lim',
                'author_avatar_text' => 'EL',
                'author_role' => 'Growth Architect',
                'read_time' => '7 min read',
                'is_featured' => false,
            ],
            [
                'title' => 'The Creative Workflow: Sketching Memorable Logos',
                'slug' => 'the-creative-workflow-sketching-memorable-logos',
                'category' => 'design',
                'image_url' => 'images/uiux_visual.png',
                'excerpt' => 'From visual brainstorming and geometry overlays to vector bezier paths, explore the lifecycle of a modern corporate icon.',
                'content' => "A corporate logo is the visual cornerstone of a brand. Designing one that stands out requires a balance between creative art and rigorous design geometry.\n\nThis article outlines our internal design methodology, from freehand sketch brainstorming sessions to using vector grids and typography kerning in Illustrator.\n\nWe highlight the importance of scalability, color versatility (ensuring it looks great in monochrome), and how to gather productive feedback from corporate clients during iterations.",
                'author_name' => 'David Wang',
                'author_avatar_text' => 'DW',
                'author_role' => 'Brand strategist',
                'read_time' => '4 min read',
                'is_featured' => false,
            ],
            [
                'title' => 'Automating Bulk Image Retouching for E-Commerce Pipelines',
                'slug' => 'automating-bulk-image-retouching-for-ecommerce-pipelines',
                'category' => 'dev',
                'image_url' => 'images/webapp_pos.png',
                'excerpt' => 'How we leverage cloud APIs and precise cropping paths to edit and synchronize thousands of product listings instantly.',
                'content' => "E-Commerce brands process thousands of images daily. Background removal, shadow generation, and alignment can quickly bottleneck publishing cycles.\n\nWe detail how to build an automated pipeline using custom image editing endpoints, CDN storage, and queuing workers to process bulk uploads.\n\nBy leveraging advanced cropping algorithms and precision clipping paths, images are retouched, optimized for web formats, and synced to storefronts automatically.",
                'author_name' => 'Mahmud Sabuj',
                'author_avatar_text' => 'MS',
                'author_role' => 'Chief Technology Officer',
                'read_time' => '5 min read',
                'is_featured' => false,
            ],
        ];

        foreach ($posts as $post) {
            Blog::updateOrCreate(
                ['slug' => $post['slug']],
                $post
            );
        }
    }
}
