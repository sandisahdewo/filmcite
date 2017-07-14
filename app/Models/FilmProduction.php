<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilmProduction extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'film_id',
        'production_id',
    ];

    protected $casts = [
        'film_id' => 'integer',
        'production_id' => 'integer',
    ];
}
