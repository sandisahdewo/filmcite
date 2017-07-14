<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilmGenre extends Model
{
    public $timestamps = false;

    protected $table = 'film_genres';

    protected $fillable = [
        'film_id',
        'genre_id',
    ];

    protected $casts = [
        'film_id' => 'integer',
        'genre_id' => 'integer',
    ];
}
