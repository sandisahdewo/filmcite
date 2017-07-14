<?php

use App\Movie\Film;
use App\Movie\FilmGenre;
use App\Movie\Genre;
use Illuminate\Database\Seeder;

class FilmTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = database_path('movie/data');

        if (File::exists($path)) {
            $films = explode("\n", File::get($path));

            foreach ($films as $json) {
                $film = json_decode($json);

                $model = Film::firstOrNew([
                    'title' => $film->original_title,
                ]);

                $model->film_id = $film->id;
                $model->imdb_id = '';
                $model->description = '';
                $model->popularity = $film->popularity;
                $model->released_at = null;

                $model->save();

                if ($film->adult) {
                    $genre = Genre::firstOrCreate(['title' => 'Adult']);

                    FilmGenre::insert([
                        'film_id' => $model->id,
                        'genre_id' => $genre->id,
                    ]);
                }
            }
        }
    }
}
