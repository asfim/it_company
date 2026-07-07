<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageSetting extends Model
{
    protected $fillable = [
        'key',
        'value',
        'label',
        'type',
        'group',
    ];

    /**
     * Helper to get setting value by key.
     */
    public static function getValue(string $key, $default = null)
    {
        $setting = self::where('key', $key)->first();
        if (!$setting) {
            return $default;
        }

        if ($setting->type === 'image' && $setting->value) {
            // Full external URL — return as-is
            if (filter_var($setting->value, FILTER_VALIDATE_URL)) {
                return $setting->value;
            }
            // Relative public path
            if (str_starts_with($setting->value, 'assets/') || str_starts_with($setting->value, 'images/')) {
                return asset($setting->value);
            }
            return asset('storage/' . $setting->value);
        }

        return $setting->value ?? $default;
    }

    /**
     * Get all hero slider images as an array of URLs.
     */
    public static function getSliderImages(): array
    {
        $images = [];
        $i = 1;
        while (true) {
            $val = self::getValue("hero_slider_image_{$i}");
            if (!$val) break;
            $images[] = $val;
            $i++;
        }
        return $images;
    }
}
