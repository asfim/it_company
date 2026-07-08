<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceSection extends Model
{
    protected $fillable = [
        'service_key',
        'slug',
        'label',
        'description',
        'image_path',
        'alt_text',
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
        
        // If it starts with images/ or assets/, it's a default asset path
        if (str_starts_with($this->image_path, 'images/') || str_starts_with($this->image_path, 'assets/')) {
            return asset($this->image_path);
        }
        
        return asset('storage/' . $this->image_path);
    }
}
