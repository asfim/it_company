<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageProcess extends Model
{
    protected $fillable = [
        'step_number',
        'title',
        'description',
        'icon_svg',
        'sort_order',
    ];

    protected $casts = [
        'step_number' => 'integer',
        'sort_order' => 'integer',
    ];
}
