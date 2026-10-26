<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceSection;
use App\Services\ImageOptimizerService;
use Illuminate\Http\Request;

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
            'image' => 'nullable|image|max:10240',
        ]);

        if (empty($validated['alt_text'])) {
            $validated['alt_text'] = ImageOptimizerService::generateAltText($validated['label'], $this->getServiceName($serviceKey));
        }

        if ($request->hasFile('image')) {
            ImageOptimizerService::deleteOldImage($section->image_path);
            $seoHint = $validated['label'] . ' ' . $serviceKey;
            $validated['image_path'] = ImageOptimizerService::uploadAndOptimize(
                $request->file('image'),
                'services/' . $serviceKey,
                $seoHint,
                800
            );
        }

        $section->update($validated);

        return redirect()->route('admin.services.index', $serviceKey)
            ->with('success', $this->getServiceName($serviceKey) . ' section updated successfully.');
    }
}
