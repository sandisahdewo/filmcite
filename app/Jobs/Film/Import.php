<?php

namespace App\Jobs\Film;

use App\Models\Film;
use App\Models\FilmGenre;
use App\Models\Genre;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Import implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $film;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($film)
    {
        $this->film = $film;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $film = Film::firstOrNew([
            'film_id' => $this->film->id,
            'title' => $this->film->original_title,
        ]);

        $film->imdb_id = '';
        $film->description = '';
        $film->popularity = $this->film->popularity;
        $film->is_adult = $this->film->adult;
        $film->released_at = null;

        $film->save();

        if ($film->is_adult) {
            $genre = Genre::firstOrCreate(['title' => 'Adult']);

            FilmGenre::firstOrCreate([
                'film_id' => $film->id,
                'genre_id' => $genre->id,
            ]);
        }
    }
}
