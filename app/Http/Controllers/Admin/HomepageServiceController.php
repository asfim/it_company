<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageService;
use Illuminate\Http\Request;

class HomepageServiceController extends Controller
{
    public function index()
    {
        $services = HomepageService::orderBy('sort_order')->get();
        return view('admin.homepage.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.homepage.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:100',
            'link' => 'nullable|string|max:255',
            'sort_order' => 'required|integer',
        ]);

        HomepageService::create($validated);

        return redirect()->route('admin.homepage.services.index')->with('success', 'Service created successfully.');
    }

    public function edit(HomepageService $service)
    {
        return view('admin.homepage.services.edit', compact('service'));
    }

    public function update(Request $request, HomepageService $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:100',
            'link' => 'nullable|string|max:255',
            'sort_order' => 'required|integer',
        ]);

        $service->update($validated);

        return redirect()->route('admin.homepage.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(HomepageService $service)
    {
        $service->delete();

        return redirect()->route('admin.homepage.services.index')->with('success', 'Service deleted successfully.');
    }
}
