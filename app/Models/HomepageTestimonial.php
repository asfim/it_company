<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageTestimonial extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'stars',
        'review',
        'avatar_bg',
        'row',
        'sort_order',
    ];

    protected $casts = [
        'stars' => 'integer',
        'row' => 'integer',
        'sort_order' => 'integer',
    ];

    /**
     * Alias for designation used in the view.
     */
    public function getRoleAttribute(): string
    {
        return $this->designation;
    }

    /**
     * Alias for review used in the view.
     */
    public function getContentAttribute(): string
    {
        return $this->review;
    }

    /**
     * Alias for avatar_bg used in the view.
     */
    public function getAvatarColorAttribute(): string
    {
        return $this->avatar_bg;
    }

    /**
     * First letter of name for the avatar circle.
     */
    public function getAvatarLetterAttribute(): string
    {
        return strtoupper(substr($this->name, 0, 1));
    }

    /**
     * Returns star characters (★) based on the stars integer.
     */
    public function getStarsDisplayAttribute(): string
    {
        return str_repeat('★', $this->stars);
    }

    /**
     * Override the stars accessor used in the view to return the display string.
     * The view uses $testi->stars which should output ★★★★★ style.
     * We keep the raw integer available via getRawOriginal('stars').
     */
    public function getStarsAttribute($value): string
    {
        return str_repeat('★', (int) $value);
    }
}
