<?php

namespace App\Jobs\Series;

use App\Models\Film;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Import implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $series;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($series)
    {
        $this->series = $series;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $film = Film::firstOrNew([
            'film_id' => $this->series->id,
            'title' => $this->series->original_name,
        ]);

        $film->imdb_id = '';
        $film->description = '';
        $film->popularity = $this->series->popularity;
        $film->type = 'series';
        $film->released_at = null;

        $film->save();
    }
}
