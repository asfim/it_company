<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SocialLink extends Model
{
    protected $fillable = [
        'platform',
        'url',
        'sort_order',
    ];

    protected static function booted()
    {
        static::saved(function () {
            Cache::forget('social_links_all');
        });

        static::deleted(function () {
            Cache::forget('social_links_all');
        });
    }

    public static function getAllCached()
    {
        return Cache::rememberForever('social_links_all', function () {
            return self::orderBy('sort_order')->get();
        });
    }
}
