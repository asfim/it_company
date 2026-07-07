<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageProcess;
use Illuminate\Http\Request;

class HomepageProcessController extends Controller
{
    public function index()
    {
        $steps = HomepageProcess::orderBy('sort_order')->get();
        return view('admin.homepage.process.index', compact('steps'));
    }

    public function edit(HomepageProcess $process)
    {
        return view('admin.homepage.process.edit', ['step' => $process]);
    }

    public function update(Request $request, HomepageProcess $process)
    {
        $validated = $request->validate([
            'step_number' => 'required|integer',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon_svg' => 'nullable|string',
            'sort_order' => 'required|integer',
        ]);

        $process->update($validated);

        return redirect()->route('admin.homepage.process.index')->with('success', 'Process Step updated successfully.');
    }
}
