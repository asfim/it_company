<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceSectionController extends Controller
{
    private function getServiceName($serviceKey)
    {
        $names = [
            'web-app' => 'Web Application',
            'web-dev' => 'Web Development',
            'software' => 'Custom Software',
            'marketing' => 'Digital Marketing',
            'ui-ux' => 'UI/UX Design',
        ];

        return $names[$serviceKey] ?? 'Service Page';
    }

    public function index($serviceKey)
    {
        $serviceName = $this->getServiceName($serviceKey);
        $sections = ServiceSection::where('service_key', $serviceKey)->orderBy('sort_order')->get();
        return view('admin.services.index', compact('sections', 'serviceKey', 'serviceName'));
    }

    public function edit($serviceKey, ServiceSection $section)
    {
        $serviceName = $this->getServiceName($serviceKey);
        return view('admin.services.edit', compact('section', 'serviceKey', 'serviceName'));
    }

    public function update(Request $request, $serviceKey, ServiceSection $section)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'description' => 'nullable|string|max:2000',
            'alt_text' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'image' => 'nullable|image|max:5120',
        ]);

        if ($request->hasFile('image')) {
            // Delete old custom image (avoid deleting default assets/images)
            if ($section->image_path && !str_starts_with($section->image_path, 'images/') && !str_starts_with($section->image_path, 'assets/')) {
                Storage::disk('public')->delete($section->image_path);
            }

            $validated['image_path'] = $request->file('image')->store('services/' . $serviceKey, 'public');
        }

        $section->update($validated);

        return redirect()->route('admin.services.index', $serviceKey)
            ->with('success', $this->getServiceName($serviceKey) . ' section updated successfully.');
    }
}
