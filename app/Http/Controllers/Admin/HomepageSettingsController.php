<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageSetting;
use App\Services\ImageOptimizerService;
use Illuminate\Http\Request;

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
                    ImageOptimizerService::deleteOldImage($setting->value);
                    $path = ImageOptimizerService::uploadAndOptimize(
                        $file = $request->file($setting->key),
                        'homepage',
                        $setting->key
                    );
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
