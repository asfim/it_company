<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomepageSettingsController extends Controller
{
    public function edit()
    {
        $settings = HomepageSetting::all()->groupBy('group');
        return view('admin.homepage.settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $settings = HomepageSetting::all();

        foreach ($settings as $setting) {
            if ($setting->type === 'image') {
                if ($request->hasFile($setting->key)) {
                    // Delete old image if it's not a default asset
                    if ($setting->value && !str_starts_with($setting->value, 'assets/') && !str_starts_with($setting->value, 'images/')) {
                        Storage::disk('public')->delete($setting->value);
                    }

                    $path = $request->file($setting->key)->store('homepage', 'public');
                    $setting->update(['value' => $path]);
                }
            } else {
                if ($request->has($setting->key)) {
                    $setting->update(['value' => $request->input($setting->key)]);
                }
            }
        }

        return redirect()->route('admin.homepage.settings.edit')->with('success', 'Homepage settings updated successfully.');
    }
}
