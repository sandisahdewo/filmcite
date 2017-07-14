<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use Sluggable;

    public $timestamps = false;

    protected $fillable = [
        'title',
    ];

    public function sluggable()
    {
        return [
            'slug' => ['source' => 'title'],
        ];
    }
}
