<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageProduct extends Model
{
    protected $fillable = [
        'title',
        'description',
        'features',
        'mock_title',
        'image_path',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    public function getImageUrlAttribute()
    {
        if (!$this->image_path) {
            return null;
        }

        if (filter_var($this->image_path, FILTER_VALIDATE_URL) || str_starts_with($this->image_path, 'images/') || str_starts_with($this->image_path, 'assets/')) {
            $path = $this->image_path;
            $webpPath = preg_replace('/\.(png|jpe?g)$/i', '.webp', $path);
            if ($webpPath !== $path && file_exists(public_path($webpPath))) {
                return asset($webpPath);
            }
            return asset($this->image_path);
        }

        $path = $this->image_path;
        $webpPath = preg_replace('/\.(png|jpe?g)$/i', '.webp', $path);
        if ($webpPath !== $path && file_exists(storage_path('app/public/' . $webpPath))) {
            return asset('storage/' . $webpPath);
        }
        return asset('storage/' . $this->image_path);
    }

    /**
     * Get features as array.
     */
    public function getFeaturesListAttribute()
    {
        if (!$this->features) {
            return [];
        }
        return array_filter(array_map('trim', explode("\n", str_replace("\r", "", $this->features))));
    }
}
