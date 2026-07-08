<?php

namespace App\Http\Controllers;

use App\Mail\GetStartedMail;
use App\Models\GraphicsDesignSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function index()
    {
        $services = \App\Models\HomepageService::orderBy('sort_order')->get();
        $wcuCards = \App\Models\HomepageWcuCard::orderBy('sort_order')->get();
        $processes = \App\Models\HomepageProcess::orderBy('sort_order')->get();
        $products = \App\Models\HomepageProduct::orderBy('sort_order')->get();
        $technologies = \App\Models\HomepageTechnology::orderBy('sort_order')->get();
        $teamMembers = \App\Models\HomepageTeamMember::orderBy('sort_order')->get();
        $testimonials = \App\Models\HomepageTestimonial::orderBy('sort_order')->get();

        return view('welcome', compact(
            'services',
            'wcuCards',
            'processes',
            'products',
            'technologies',
            'teamMembers',
            'testimonials'
        ));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function contactSubmit(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:150',
            'phone'   => 'nullable|string|max:20',
            'service' => 'nullable|string|max:100',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|max:5000',
        ]);

        return redirect()->route('contact')->with('success', 'Thank you, ' . $validated['name'] . '! Your message has been received. We will get back to you soon.');
    }

    /**
     * Handle "Get Started" modal form submission.
     * Saves to DB first, then attempts to send email to info@crownsit.com
     */
    public function getStartedSubmit(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'phone'   => 'required|string|max:30',
            'service' => 'required|string|max:150',
            'message' => 'required|string|max:3000',
        ]);

        // Always save to database first — no submission is ever lost
        $submission = \DB::table('get_started_submissions')->insertGetId([
            'name'       => $validated['name'],
            'phone'      => $validated['phone'],
            'service'    => $validated['service'],
            'message'    => $validated['message'],
            'mail_sent'  => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $mailSent = false;
        try {
            Mail::to('info@crownsit.com')->send(
                new GetStartedMail(
                    $validated['name'],
                    $validated['phone'],
                    $validated['service'],
                    $validated['message']
                )
            );
            $mailSent = true;
            \DB::table('get_started_submissions')->where('id', $submission)->update(['mail_sent' => true]);
        } catch (\Exception $e) {
            \Log::error('GetStarted mail failed: ' . $e->getMessage());
        }

        // Always return success — submission is saved in DB even if mail fails
        return response()->json([
            'success' => true,
            'message' => 'Thank you, ' . $validated['name'] . '! We received your request and will contact you shortly. 🎉',
        ]);
    }

    public function webApplication()
    {
        $sections = \App\Models\ServiceSection::where('service_key', 'web-app')->orderBy('sort_order')->get()->keyBy('slug');
        return view('services.web-application', compact('sections'));
    }

    public function webDevelopment()
    {
        $sections = \App\Models\ServiceSection::where('service_key', 'web-dev')->orderBy('sort_order')->get()->keyBy('slug');
        return view('services.web-development', compact('sections'));
    }

    public function software()
    {
        $sections = \App\Models\ServiceSection::where('service_key', 'software')->orderBy('sort_order')->get()->keyBy('slug');
        return view('services.software', compact('sections'));
    }

    public function digitalMarketing()
    {
        $sections = \App\Models\ServiceSection::where('service_key', 'marketing')->orderBy('sort_order')->get()->keyBy('slug');
        return view('services.digital-marketing', compact('sections'));
    }

    public function graphicsDesign()
    {
        $sections = GraphicsDesignSection::orderBy('sort_order')->get()->keyBy('slug');

        return view('services.graphics-design', compact('sections'));
    }

    public function uiUxDesign()
    {
        $sections = \App\Models\ServiceSection::where('service_key', 'ui-ux')->orderBy('sort_order')->get()->keyBy('slug');
        return view('services.ui-ux-design', compact('sections'));
    }

    public function blog()
    {
        $featured = \App\Models\Blog::where('is_featured', true)->first();
        if (!$featured) {
            $featured = \App\Models\Blog::orderBy('created_at', 'desc')->first();
        }

        $featuredId = $featured ? $featured->id : null;
        $posts = \App\Models\Blog::where('id', '!=', $featuredId)->orderBy('created_at', 'desc')->get();

        return view('blog.index', compact('featured', 'posts'));
    }

    public function blogShow($slug)
    {
        $post = \App\Models\Blog::where('slug', $slug)->firstOrFail();
        
        $relatedPosts = \App\Models\Blog::where('category', $post->category)
            ->where('id', '!=', $post->id)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
            
        if ($relatedPosts->count() < 3) {
            $fillCount = 3 - $relatedPosts->count();
            $excludeIds = $relatedPosts->pluck('id')->push($post->id)->toArray();
            $fillPosts = \App\Models\Blog::whereNotIn('id', $excludeIds)
                ->orderBy('created_at', 'desc')
                ->limit($fillCount)
                ->get();
            $relatedPosts = $relatedPosts->merge($fillPosts);
        }

        return view('blog.show', compact('post', 'relatedPosts'));
    }
}
