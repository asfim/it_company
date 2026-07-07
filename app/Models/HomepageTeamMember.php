<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageTeamMember extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'description',
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
            return asset($this->image_path);
        }

        return asset('storage/' . $this->image_path);
    }
}
