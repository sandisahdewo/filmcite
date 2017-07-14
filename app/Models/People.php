<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use Sluggable;

    protected $fillable = [
        'slug',
        'name',
        'popularity',
    ];

    protected $casts = [
        'popularity' => 'float',
    ];

    public function sluggable()
    {
        return [
            'slug' => ['source' => 'name'],
        ];
    }
}
