<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'film_id',
        'user_id',
        'role',
        'quote',
    ];

    protected $casts = [
        'film_id' => 'integer',
        'user_id' => 'integer',
    ];
}
