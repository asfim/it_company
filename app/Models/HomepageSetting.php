<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class HomepageSetting extends Model
{
    protected $fillable = [
        'key',
        'value',
        'label',
        'type',
        'group',
    ];

    protected static function booted()
    {
        static::saved(function () {
            Cache::forget('homepage_settings_all');
        });

        static::deleted(function () {
            Cache::forget('homepage_settings_all');
        });
    }

    /**
     * Helper to get setting value by key.
     */
    public static function getValue(string $key, $default = null)
    {
        $settings = Cache::rememberForever('homepage_settings_all', function () {
            return self::all()->keyBy('key');
        });

        $setting = $settings->get($key);
        if (!$setting) {
            return $default;
        }

        if ($setting->type === 'image' && $setting->value) {
            // Full external URL — return as-is
            if (filter_var($setting->value, FILTER_VALIDATE_URL)) {
                return $setting->value;
            }
            $val = $setting->value;
            $webpVal = preg_replace('/\.(png|jpe?g)$/i', '.webp', $val);

            // Relative public path
            if (str_starts_with($val, 'assets/') || str_starts_with($val, 'images/')) {
                if ($webpVal !== $val && file_exists(public_path($webpVal))) {
                    return asset($webpVal);
                }
                return asset($val);
            }

            if ($webpVal !== $val && file_exists(storage_path('app/public/' . $webpVal))) {
                return asset('storage/' . $webpVal);
            }
            return asset('storage/' . $val);
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
