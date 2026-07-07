<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageTechnology;
use Illuminate\Http\Request;

class HomepageTechnologyController extends Controller
{
    public function index()
    {
        $technologies = HomepageTechnology::orderBy('sort_order')->get();
        return view('admin.homepage.technologies.index', compact('technologies'));
    }

    public function create()
    {
        return view('admin.homepage.technologies.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon_class' => 'required|string|max:255',
            'direction' => 'required|in:left,right',
            'sort_order' => 'required|integer',
        ]);

        HomepageTechnology::create($validated);

        return redirect()->route('admin.homepage.technologies.index')->with('success', 'Technology created successfully.');
    }

    public function edit(HomepageTechnology $technology)
    {
        return view('admin.homepage.technologies.edit', compact('technology'));
    }

    public function update(Request $request, HomepageTechnology $technology)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon_class' => 'required|string|max:255',
            'direction' => 'required|in:left,right',
            'sort_order' => 'required|integer',
        ]);

        $technology->update($validated);

        return redirect()->route('admin.homepage.technologies.index')->with('success', 'Technology updated successfully.');
    }

    public function destroy(HomepageTechnology $technology)
    {
        $technology->delete();

        return redirect()->route('admin.homepage.technologies.index')->with('success', 'Technology deleted successfully.');
    }
}
