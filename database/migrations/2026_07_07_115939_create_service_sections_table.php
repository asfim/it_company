<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('service_sections', function (Blueprint $table) {
            $table->id();
            $table->string('service_key'); // web-app, web-dev, software, marketing, ui-ux
            $table->string('slug');
            $table->string('label');
            $table->text('description')->nullable();
            $table->string('image_path')->nullable();
            $table->string('alt_text')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            $table->unique(['service_key', 'slug']);
        });

        $now = now();
        $sections = [
            // 1. Web Application (service_key = 'web-app')
            ['service_key' => 'web-app', 'slug' => 'split_image', 'label' => 'Split Section Image', 'description' => 'Image for the next-generation digital experiences section.', 'image_path' => 'images/webapp_side_img.png', 'sort_order' => 10],
            ['service_key' => 'web-app', 'slug' => 'stats_center_image', 'label' => 'Stats Center Image', 'description' => 'Image displayed between stats arches.', 'image_path' => 'images/webapp_side_img.png', 'sort_order' => 20],
            ['service_key' => 'web-app', 'slug' => 'tab_erp', 'label' => 'ERP System Tab Image', 'description' => 'Image shown on the ERP System tab.', 'image_path' => 'images/uiux_visual.png', 'sort_order' => 30],
            ['service_key' => 'web-app', 'slug' => 'tab_lc', 'label' => 'LC Management Tab Image', 'description' => 'Image shown on the LC Management tab.', 'image_path' => 'images/uiux_wireframes.png', 'sort_order' => 40],
            ['service_key' => 'web-app', 'slug' => 'tab_pos', 'label' => 'POS Software Tab Image', 'description' => 'Image shown on the POS Software tab.', 'image_path' => 'images/uiux_wireframes.png', 'sort_order' => 50],
            ['service_key' => 'web-app', 'slug' => 'tab_ecom', 'label' => 'E-Commerce Platform Tab Image', 'description' => 'Image shown on the E-Commerce Platform tab.', 'image_path' => 'images/uiux_testing.png', 'sort_order' => 60],
            ['service_key' => 'web-app', 'slug' => 'tab_pharmacy', 'label' => 'Pharmacy Management Tab Image', 'description' => 'Image shown on the Pharmacy Management Software tab.', 'image_path' => 'images/uiux_research.png', 'sort_order' => 70],
            ['service_key' => 'web-app', 'slug' => 'tab_isp', 'label' => 'ISP Billing Tab Image', 'description' => 'Image shown on the ISP Billing Software tab.', 'image_path' => 'images/uiux_research.png', 'sort_order' => 80],
            ['service_key' => 'web-app', 'slug' => 'tab_reunion', 'label' => 'Private Reunion Tab Image', 'description' => 'Image shown on the Private Reunion Site tab.', 'image_path' => 'images/uiux_visual.png', 'sort_order' => 90],
            ['service_key' => 'web-app', 'slug' => 'tab_restaurant', 'label' => 'Restaurant POS Tab Image', 'description' => 'Image shown on the Restaurant POS tab.', 'image_path' => 'images/uiux_systems.png', 'sort_order' => 100],

            // 2. Web Development (service_key = 'web-dev')
            ['service_key' => 'web-dev', 'slug' => 'split_image', 'label' => 'Split Section Image', 'description' => 'Image for the next-generation web design section.', 'image_path' => 'images/webapp_side_img.png', 'sort_order' => 10],
            ['service_key' => 'web-dev', 'slug' => 'card_corporate', 'label' => 'Corporate Website Card Image', 'description' => 'Image shown on the Corporate Website tab.', 'image_path' => 'images/uiux_systems.png', 'sort_order' => 20],
            ['service_key' => 'web-dev', 'slug' => 'card_landing', 'label' => 'Landing Page Card Image', 'description' => 'Image shown on the Landing Page tab.', 'image_path' => 'images/uiux_visual.png', 'sort_order' => 30],
            ['service_key' => 'web-dev', 'slug' => 'card_blog', 'label' => 'Blog/News Portal Card Image', 'description' => 'Image shown on the Blog/News Portal tab.', 'image_path' => 'images/uiux_research.png', 'sort_order' => 40],
            ['service_key' => 'web-dev', 'slug' => 'card_portfolio', 'label' => 'Portfolio Site Card Image', 'description' => 'Image shown on the Portfolio Site tab.', 'image_path' => 'images/uiux_visual.png', 'sort_order' => 50],
            ['service_key' => 'web-dev', 'slug' => 'card_realestate', 'label' => 'Real Estate Card Image', 'description' => 'Image shown on the Real Estate tab.', 'image_path' => 'images/uiux_wireframes.png', 'sort_order' => 60],
            ['service_key' => 'web-dev', 'slug' => 'card_education', 'label' => 'Educational Portal Card Image', 'description' => 'Image shown on the Educational Portal tab.', 'image_path' => 'images/uiux_systems.png', 'sort_order' => 70],
            ['service_key' => 'web-dev', 'slug' => 'card_nonprofit', 'label' => 'Non-Profit/NGO Card Image', 'description' => 'Image shown on the Non-Profit/NGO tab.', 'image_path' => 'images/uiux_research.png', 'sort_order' => 80],

            // 3. Custom Software (service_key = 'software')
            ['service_key' => 'software', 'slug' => 'split_image', 'label' => 'Split Section Image', 'description' => 'Image for the next-generation custom software section.', 'image_path' => 'images/webapp_side_img.png', 'sort_order' => 10],
            ['service_key' => 'software', 'slug' => 'stats_center_image', 'label' => 'Stats Center Image', 'description' => 'Image displayed between stats arches.', 'image_path' => 'images/webapp_side_img.png', 'sort_order' => 20],
            ['service_key' => 'software', 'slug' => 'service_erp', 'label' => 'ERP System Card Image', 'description' => 'Image shown on the ERP System card.', 'image_path' => 'images/webapp_erp.png', 'sort_order' => 30],
            ['service_key' => 'software', 'slug' => 'service_crm', 'label' => 'CRM System Card Image', 'description' => 'Image shown on the CRM System card.', 'image_path' => 'images/webapp_ecommerce.png', 'sort_order' => 40],
            ['service_key' => 'software', 'slug' => 'service_pos', 'label' => 'POS Software Card Image', 'description' => 'Image shown on the POS Software card.', 'image_path' => 'images/webapp_pos.png', 'sort_order' => 50],
            ['service_key' => 'software', 'slug' => 'service_desktop', 'label' => 'Desktop Apps Card Image', 'description' => 'Image shown on the Desktop Apps card.', 'image_path' => 'images/webapp_side_img.png', 'sort_order' => 60],
            ['service_key' => 'software', 'slug' => 'service_api', 'label' => 'API Engineering Card Image', 'description' => 'Image shown on the API Engineering card.', 'image_path' => 'images/webapp_lc.png', 'sort_order' => 70],
            ['service_key' => 'software', 'slug' => 'service_db', 'label' => 'Database System Card Image', 'description' => 'Image shown on the Database System card.', 'image_path' => 'images/webapp_side_img.png', 'sort_order' => 80],
            ['service_key' => 'software', 'slug' => 'service_legacy', 'label' => 'Legacy System Card Image', 'description' => 'Image shown on the Legacy System Modernization card.', 'image_path' => 'images/webapp_side_img.png', 'sort_order' => 90],

            // 4. Digital Marketing (service_key = 'marketing')
            ['service_key' => 'marketing', 'slug' => 'split_image', 'label' => 'Split Section Image', 'description' => 'Image for the next-generation digital marketing section.', 'image_path' => 'images/webapp_side_img.png', 'sort_order' => 10],
            ['service_key' => 'marketing', 'slug' => 'stats_center_image', 'label' => 'Stats Center Image', 'description' => 'Image displayed between stats arches.', 'image_path' => 'images/webapp_pos.png', 'sort_order' => 20],
            ['service_key' => 'marketing', 'slug' => 'service_seo', 'label' => 'SEO Card Image', 'description' => 'Image shown on the SEO service card.', 'image_path' => 'images/marketing_seo.png', 'sort_order' => 30],
            ['service_key' => 'marketing', 'slug' => 'service_social', 'label' => 'Social Media Marketing Card Image', 'description' => 'Image shown on the Social Media Marketing card.', 'image_path' => 'images/uiux_visual.png', 'sort_order' => 40],
            ['service_key' => 'marketing', 'slug' => 'service_ppc', 'label' => 'Google & Meta Ads Card Image', 'description' => 'Image shown on the Google & Meta Ads card.', 'image_path' => 'images/uiux_testing.png', 'sort_order' => 50],
            ['service_key' => 'marketing', 'slug' => 'service_email', 'label' => 'Email Marketing Card Image', 'description' => 'Image shown on the Email Marketing card.', 'image_path' => 'images/uiux_wireframes.png', 'sort_order' => 60],
            ['service_key' => 'marketing', 'slug' => 'service_cro', 'label' => 'CRO Analytics Card Image', 'description' => 'Image shown on the CRO Analytics card.', 'image_path' => 'images/uiux_research.png', 'sort_order' => 70],

            // 5. UI/UX Design (service_key = 'ui-ux')
            ['service_key' => 'ui-ux', 'slug' => 'split_image', 'label' => 'Split Section Image', 'description' => 'Image for the next-generation UI/UX design section.', 'image_path' => 'images/webapp_side_img.png', 'sort_order' => 10],
            ['service_key' => 'ui-ux', 'slug' => 'stats_center_image', 'label' => 'Stats Center Image', 'description' => 'Image displayed between stats arches.', 'image_path' => 'images/webapp_ecommerce.png', 'sort_order' => 20],
            ['service_key' => 'ui-ux', 'slug' => 'service_user_research', 'label' => 'User Research Card Image', 'description' => 'Image shown on the User Research card.', 'image_path' => 'images/uiux_research.png', 'sort_order' => 30],
            ['service_key' => 'ui-ux', 'slug' => 'service_wireframing', 'label' => 'Wireframes Card Image', 'description' => 'Image shown on the Wireframes card.', 'image_path' => 'images/uiux_wireframes.png', 'sort_order' => 40],
            ['service_key' => 'ui-ux', 'slug' => 'service_ui_design', 'label' => 'UI Design Card Image', 'description' => 'Image shown on the UI Design card.', 'image_path' => 'images/uiux_visual.png', 'sort_order' => 50],
            ['service_key' => 'ui-ux', 'slug' => 'service_design_system', 'label' => 'Design System Card Image', 'description' => 'Image shown on the Design System card.', 'image_path' => 'images/uiux_systems.png', 'sort_order' => 60],
            ['service_key' => 'ui-ux', 'slug' => 'service_usability_testing', 'label' => 'Usability Testing Card Image', 'description' => 'Image shown on the Usability Testing card.', 'image_path' => 'images/uiux_testing.png', 'sort_order' => 70]
        ];

        foreach ($sections as &$sec) {
            $sec['created_at'] = $now;
            $sec['updated_at'] = $now;
        }

        DB::table('service_sections')->insert($sections);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_sections');
    }
};
