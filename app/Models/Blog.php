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
}
