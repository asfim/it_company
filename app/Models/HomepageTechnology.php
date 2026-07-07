<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageTechnology extends Model
{
    protected $table = 'homepage_technologies';

    protected $fillable = [
        'name',
        'icon_class',
        'direction',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];
}
