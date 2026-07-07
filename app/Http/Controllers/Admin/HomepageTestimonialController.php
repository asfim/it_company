<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageTestimonial;
use Illuminate\Http\Request;

class HomepageTestimonialController extends Controller
{
    public function index()
    {
        $testimonials = HomepageTestimonial::orderBy('sort_order')->get();
        return view('admin.homepage.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.homepage.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'stars' => 'required|integer|min:1|max:5',
            'review' => 'required|string',
            'avatar_bg' => 'required|string|max:20',
            'row' => 'required|integer|in:1,2',
            'sort_order' => 'required|integer',
        ]);

        HomepageTestimonial::create($validated);

        return redirect()->route('admin.homepage.testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    public function edit(HomepageTestimonial $testimonial)
    {
        return view('admin.homepage.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, HomepageTestimonial $testimonial)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'stars' => 'required|integer|min:1|max:5',
            'review' => 'required|string',
            'avatar_bg' => 'required|string|max:20',
            'row' => 'required|integer|in:1,2',
            'sort_order' => 'required|integer',
        ]);

        $testimonial->update($validated);

        return redirect()->route('admin.homepage.testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(HomepageTestimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('admin.homepage.testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }
}
