<?php

namespace Tests\Feature;

use App\Models\Blog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SeoMetadataTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_has_canonical_metadata_and_site_schema(): void
    {
        $response = $this->get(route('home', [], false) . '?utm_source=test');

        $response->assertOk()
            ->assertSee('<link rel="canonical" href="' . config('app.url') . '/">', false)
            ->assertSee('name="description"', false)
            ->assertSee('property="og:url" content="' . config('app.url') . '/"', false)
            ->assertSee('name="twitter:card"', false)
            ->assertSee('"@type":"Organization"', false)
            ->assertDontSee('name="keywords"', false);
    }

    public function test_public_pages_have_unique_titles_canonicals_and_descriptions(): void
    {
        $paths = [
            '/',
            '/about',
            '/contact',
            '/blog',
            '/services/web-application',
            '/services/web-development',
            '/services/software',
            '/services/digital-marketing',
            '/services/graphics-design',
            '/services/ui-ux-design',
        ];
        $titles = [];

        foreach ($paths as $path) {
            $response = $this->get($path);
            $response->assertOk()
                ->assertSee('<link rel="canonical"', false)
                ->assertSee('<meta name="description"', false);

            preg_match_all('/<h1(?:\\s|>)/i', $response->getContent(), $h1Matches);
            $this->assertCount(1, $h1Matches[0], "Expected one H1 for {$path}");

            preg_match('/<title>(.*?)<\\/title>/s', $response->getContent(), $matches);
            $this->assertNotEmpty($matches[1] ?? null, "Missing title for {$path}");
            $titles[] = html_entity_decode($matches[1], ENT_QUOTES | ENT_HTML5, 'UTF-8');
        }

        $this->assertCount(count($paths), array_unique($titles));
    }

    public function test_sitemap_contains_public_pages_and_public_blog_posts_as_xml(): void
    {
        Blog::create([
            'title' => 'Sitemap Test Post',
            'slug' => 'sitemap-test-post',
            'category' => 'dev',
            'excerpt' => 'A post included in the public sitemap.',
            'content' => 'Post content.',
            'author_name' => 'Test Author',
            'author_avatar_text' => 'TA',
            'author_role' => 'Writer',
            'read_time' => '2 min read',
        ]);

        $response = $this->get(route('sitemap'));

        $response->assertOk()
            ->assertHeader('Content-Type', 'application/xml; charset=UTF-8')
            ->assertSee('<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">', false)
            ->assertSee(config('app.url') . '/about', false)
            ->assertSee(config('app.url') . '/services/web-application', false)
            ->assertSee(config('app.url') . '/blog/sitemap-test-post', false)
            ->assertDontSee('/admin', false)
            ->assertDontSee('/login', false);

        $this->assertNotFalse(simplexml_load_string($response->getContent()));
    }

    public function test_blog_post_has_article_metadata_and_structured_data(): void
    {
        $post = Blog::create([
            'title' => 'Structured Data Test',
            'slug' => 'structured-data-test',
            'category' => 'dev',
            'excerpt' => 'A useful description for this article.',
            'content' => 'Article content.',
            'author_name' => 'Test Author',
            'author_avatar_text' => 'TA',
            'author_role' => 'Writer',
            'read_time' => '2 min read',
        ]);

        $response = $this->get(route('blog.show', $post->slug));

        $response->assertOk()
            ->assertSee('property="og:type" content="article"', false)
            ->assertSee('name="description" content="A useful description for this article."', false)
            ->assertSee('"@type":"BlogPosting"', false)
            ->assertSee('"name":"Test Author"', false)
            ->assertSee(config('app.url') . '/blog/structured-data-test', false);

        preg_match_all(
            '/<script type="application\\/ld\\+json">(.*?)<\\/script>/s',
            $response->getContent(),
            $schemaScripts
        );
        $this->assertNotEmpty($schemaScripts[1]);

        foreach ($schemaScripts[1] as $schemaJson) {
            $this->assertIsArray(json_decode($schemaJson, true));
        }
    }

    public function test_blog_image_urls_preserve_external_hosts_and_resolve_local_paths(): void
    {
        $post = new Blog(['image_url' => 'https://images.example.test/cover.jpg']);

        $this->assertSame('https://images.example.test/cover.jpg', $post->public_image_url);

        $post->image_url = 'uploads/blogs/cover.jpg';

        $this->assertSame(rtrim(config('app.url'), '/') . '/uploads/blogs/cover.jpg', $post->public_image_url);
    }

    public function test_missing_blog_posts_return_not_found(): void
    {
        $this->get(route('blog.show', 'does-not-exist'))->assertNotFound();
    }

    public function test_performance_and_resource_delivery_optimizations(): void
    {
        $response = $this->get('/');
        $response->assertOk()
            ->assertDontSee('swiper-bundle.min.js', false)
            ->assertDontSee('swiper-bundle.min.css', false)
            ->assertDontSee('<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input', false)
            ->assertSee('media="print" onload="this.media=\'all\'"', false)
            ->assertSee('lucide@latest" defer', false);

        $clearCacheRes = $this->get('/clear-cache');
        $clearCacheRes->assertOk()->assertSee('All Caches Cleared Successfully');
    }
}
