<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'image_url',
        'excerpt',
        'content',
        'author_name',
        'author_avatar_text',
        'author_role',
        'read_time',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    public function getPublicImageUrlAttribute(): ?string
    {
        if (!filled($this->image_url)) {
            return null;
        }

        $scheme = parse_url($this->image_url, PHP_URL_SCHEME);

        if (filter_var($this->image_url, FILTER_VALIDATE_URL)
            && in_array(strtolower((string) $scheme), ['http', 'https'], true)) {
            return $this->image_url;
        }

        return rtrim(config('app.url', 'https://crownsit.com'), '/') . '/' . ltrim($this->image_url, '/');
    }
}
