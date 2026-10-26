<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageSetting;
use App\Models\SocialLink;
use App\Services\ImageOptimizerService;
use Illuminate\Http\Request;

class FooterSettingsController extends Controller
{
    public function editFooter()
    {
        $settings = HomepageSetting::where('group', 'footer')->get();
        $socialLinks = SocialLink::orderBy('sort_order')->get();
        return view('admin.footer-settings', compact('settings', 'socialLinks'));
    }

    public function updateFooter(Request $request)
    {
        $settings = HomepageSetting::where('group', 'footer')->get();

        foreach ($settings as $setting) {
            if ($setting->type === 'image') {
                if ($request->hasFile($setting->key)) {
                    ImageOptimizerService::deleteOldImage($setting->value);
                    $path = ImageOptimizerService::uploadAndOptimize(
                        $request->file($setting->key),
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

        return redirect()->route('admin.footer.settings.edit')->with('success', 'Footer settings updated successfully.');
    }

    public function editContact()
    {
        $settings = HomepageSetting::where('group', 'contact')->get();
        return view('admin.contact-settings', compact('settings'));
    }

    public function updateContact(Request $request)
    {
        $settings = HomepageSetting::where('group', 'contact')->get();

        foreach ($settings as $setting) {
            if ($setting->type === 'image') {
                if ($request->hasFile($setting->key)) {
                    ImageOptimizerService::deleteOldImage($setting->value);
                    $path = ImageOptimizerService::uploadAndOptimize(
                        $request->file($setting->key),
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

        return redirect()->route('admin.contact.settings.edit')->with('success', 'Contact settings updated successfully.');
    }

    public function storeSocialLink(Request $request)
    {
        $request->validate([
            'platform' => 'required|string',
            'url' => 'required|url',
        ]);

        SocialLink::create([
            'platform' => $request->platform,
            'url' => $request->url,
            'sort_order' => SocialLink::max('sort_order') + 10,
        ]);

        return redirect()->route('admin.footer.settings.edit')->with('success', 'Social media link added successfully.');
    }

    public function destroySocialLink($id)
    {
        $link = SocialLink::findOrFail($id);
        $link->delete();

        return redirect()->route('admin.footer.settings.edit')->with('success', 'Social media link deleted successfully.');
    }
}
