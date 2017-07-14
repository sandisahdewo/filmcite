<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use Sluggable;

    protected $fillable = [
        'film_id',
        'imdb_id',
        'slug',
        'language',
        'poster',
        'title',
        'description',
        'status',
        'vote',
        'popularity',
        'video',
        'type',
        'is_adult',
        'released_at',
    ];

    protected $hidden = [
        'film_id',
    ];

    protected $casts = [
        'film_id' => 'integer',
        'vote' => 'float',
        'popularity' => 'float',
        'is_adult' => 'boolean',
    ];

    protected $dates = [
        'released_at',
    ];

    protected $appends = [
        'poster_url',
        'year',
        'film_url',
    ];

    public function sluggable()
    {
        return [
            'slug' => ['source' => 'title'],
        ];
    }

    public function getPosterUrlAttribute()
    {
        if (!empty($this->attributes['poster'])) {
            return 'https://image.tmdb.org/t/p/w500' . $this->attributes['poster'];
        }

        return null;
    }

    public function getYearAttribute()
    {
        if (!empty($this->attributes['released_at'])) {
            return (int) Carbon::parse($this->attributes['released_at'])
                ->format('Y');
        }

        return null;
    }

    public function getFilmUrlAttribute()
    {
        return route('film.view', [$this->attributes['slug']]);
    }

    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }
}
