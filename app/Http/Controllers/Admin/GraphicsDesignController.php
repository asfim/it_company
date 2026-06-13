<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GraphicsDesignSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'image' => 'nullable|image|max:5120',
        ]);

        if ($request->hasFile('image')) {
            if ($section->image_path) {
                Storage::disk('public')->delete($section->image_path);
            }

            $validated['image_path'] = $request->file('image')->store('graphics-design', 'public');
        }

        $section->update($validated);

        return redirect()->route('admin.graphics-design.index')->with('success', 'Graphics Design section updated successfully.');
    }
}
