<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GraphicsDesignSection extends Model
{
    protected $fillable = [
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
        return $this->image_path ? asset('storage/' . $this->image_path) : null;
    }
}
