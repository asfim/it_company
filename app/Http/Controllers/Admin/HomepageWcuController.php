<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageWcuCard;
use Illuminate\Http\Request;

class HomepageWcuController extends Controller
{
    public function index()
    {
        $cards = HomepageWcuCard::orderBy('sort_order')->get();
        return view('admin.homepage.wcu.index', compact('cards'));
    }

    public function edit(HomepageWcuCard $wcu)
    {
        return view('admin.homepage.wcu.edit', ['card' => $wcu]);
    }

    public function update(Request $request, HomepageWcuCard $wcu)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon_svg' => 'nullable|string',
            'sort_order' => 'required|integer',
        ]);

        $wcu->update($validated);

        return redirect()->route('admin.homepage.wcu.index')->with('success', 'WCU Card updated successfully.');
    }
}
