<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageTeamMember;
use App\Services\ImageOptimizerService;
use Illuminate\Http\Request;

class HomepageTeamController extends Controller
{
    public function index()
    {
        $members = HomepageTeamMember::orderBy('sort_order')->get();
        return view('admin.homepage.team.index', compact('members'));
    }

    public function create()
    {
        return view('admin.homepage.team.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:10240',
            'sort_order' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            $seoHint = $validated['name'] . ' ' . $validated['designation'];
            $validated['image_path'] = ImageOptimizerService::uploadAndOptimize(
                $request->file('image'),
                'team',
                $seoHint,
                400
            );
        }

        HomepageTeamMember::create($validated);

        return redirect()->route('admin.homepage.team.index')->with('success', 'Team Member created successfully.');
    }

    public function edit(HomepageTeamMember $team)
    {
        return view('admin.homepage.team.edit', ['member' => $team]);
    }

    public function update(Request $request, HomepageTeamMember $team)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:10240',
            'sort_order' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            ImageOptimizerService::deleteOldImage($team->image_path);
            $seoHint = $validated['name'] . ' ' . $validated['designation'];
            $validated['image_path'] = ImageOptimizerService::uploadAndOptimize(
                $request->file('image'),
                'team',
                $seoHint,
                400
            );
        }

        $team->update($validated);

        return redirect()->route('admin.homepage.team.index')->with('success', 'Team Member updated successfully.');
    }

    public function destroy(HomepageTeamMember $team)
    {
        ImageOptimizerService::deleteOldImage($team->image_path);

        $team->delete();

        return redirect()->route('admin.homepage.team.index')->with('success', 'Team Member deleted successfully.');
    }
}
