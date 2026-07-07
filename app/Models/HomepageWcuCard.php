<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageWcuCard extends Model
{
    protected $table = 'homepage_wcu_cards';

    protected $fillable = [
        'title',
        'description',
        'icon_svg',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];
}
