<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageTeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'image' => 'nullable|image|max:5120',
            'sort_order' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('team', 'public');
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
            'image' => 'nullable|image|max:5120',
            'sort_order' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if it's not default unsplash
            if ($team->image_path && !str_starts_with($team->image_path, 'http') && !str_starts_with($team->image_path, 'images/') && !str_starts_with($team->image_path, 'assets/')) {
                Storage::disk('public')->delete($team->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('team', 'public');
        }

        $team->update($validated);

        return redirect()->route('admin.homepage.team.index')->with('success', 'Team Member updated successfully.');
    }

    public function destroy(HomepageTeamMember $team)
    {
        if ($team->image_path && !str_starts_with($team->image_path, 'http') && !str_starts_with($team->image_path, 'images/') && !str_starts_with($team->image_path, 'assets/')) {
            Storage::disk('public')->delete($team->image_path);
        }

        $team->delete();

        return redirect()->route('admin.homepage.team.index')->with('success', 'Team Member deleted successfully.');
    }
}
