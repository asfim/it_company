<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('welcome');
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
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:20',
            'service' => 'nullable|string|max:100',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|max:5000',
        ]);

        return redirect()->route('contact')->with('success', 'Thank you, ' . $validated['name'] . '! Your message has been received. We will get back to you soon.');
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
        return view('services.graphics-design');
    }

    public function uiUxDesign()
    {
        return view('services.ui-ux-design');
    }
}
