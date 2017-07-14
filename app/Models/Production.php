<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    use Sluggable;

    protected $fillable = [
        'production_id',
        'name',
    ];

    protected $casts = [
        'production_id' => 'integer',
    ];

    public function sluggable()
    {
        return [
            'slug' => ['source' => 'name'],
        ];
    }
}
