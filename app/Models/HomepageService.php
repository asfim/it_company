<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageService extends Model
{
    protected $fillable = [
        'title',
        'description',
        'icon',
        'link',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];
}
