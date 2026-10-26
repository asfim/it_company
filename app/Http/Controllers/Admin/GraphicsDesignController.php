<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GraphicsDesignSection;
use App\Services\ImageOptimizerService;
use Illuminate\Http\Request;

class GraphicsDesignController extends Controller
{
    public function index()
    {
        $sections = GraphicsDesignSection::orderBy('sort_order')->get();
        return view('admin.graphics-design.index', compact('sections'));
    }

    public function edit(GraphicsDesignSection $section)
    {
        return view('admin.graphics-design.edit', ['section' => $section]);
    }

    public function update(Request $request, GraphicsDesignSection $section)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'description' => 'nullable|string|max:2000',
            'alt_text' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'image' => 'nullable|image|max:10240',
        ]);

        if (empty($validated['alt_text'])) {
            $validated['alt_text'] = ImageOptimizerService::generateAltText($validated['label'], 'Graphics Design');
        }

        if ($request->hasFile('image')) {
            ImageOptimizerService::deleteOldImage($section->image_path);
            $seoHint = $validated['label'] . ' graphics design';
            $validated['image_path'] = ImageOptimizerService::uploadAndOptimize(
                $request->file('image'),
                'graphics-design',
                $seoHint,
                800
            );
        }

        $section->update($validated);

        return redirect()->route('admin.graphics-design.index')->with('success', 'Graphics Design section updated successfully.');
    }
}
