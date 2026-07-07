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
            'service' => 'required|string|max:150',
            'message' => 'required|string|max:3000',
        ]);

        // Always save to database first — no submission is ever lost
        $submission = \DB::table('get_started_submissions')->insertGetId([
            'name'       => $validated['name'],
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
        return view('services.web-application');
    }

    public function webDevelopment()
    {
        return view('services.web-development');
    }

    public function software()
    {
        return view('services.software');
    }

    public function digitalMarketing()
    {
        return view('services.digital-marketing');
    }

    public function graphicsDesign()
    {
        $sections = GraphicsDesignSection::orderBy('sort_order')->get()->keyBy('slug');

        return view('services.graphics-design', compact('sections'));
    }

    public function uiUxDesign()
    {
        return view('services.ui-ux-design');
    }

    public function blog()
    {
        return view('blog.index');
    }
}
