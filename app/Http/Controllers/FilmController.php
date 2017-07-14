<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\FilmGenre;
use App\Models\FilmProduction;
use App\Models\Genre;
use App\Models\Production;
use DB;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index(): \Illuminate\View\View
    {
        return view('movie.index');
    }

    public function search(Request $request): \Illuminate\Http\JsonResponse
    {
        $films = Film::select('id', 'title', 'film_id', 'description', 'released_at')
            ->orderBy('title', 'ASC')
            ->when($request->title, function ($query) use ($request) {
                return $query->where('title', 'LIKE', '%' . $request->title . '%');
            })
            ->take($request->has('limit') ? (int) $request->limit : 10)
            ->get();

        return response()->json($films);
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        $film = Film::whereId($id)->first();
        if (empty($film)) {
            return response()->json([
                'status' => false,
                'message' => 'Film not found.',
            ], 404);
        }

        if (empty($film->description)) {
            $client = new Client([
                'base_uri' => config('services.TMDB.url'),
                'query' => [
                    'api_key' => config('services.TMDB.key'),
                ],
                'timeout' => 5,
                'http_errors' => false,
            ]);

            $response = $client->get((string) $film->film_id);

            if ($response->getStatusCode() != 200) {
                $body = json_decode((string) $response->getbody());

                return response()->json([
                    'status' => false,
                    'code' => $body->status_code,
                    'message' => $body->status_message,
                ], $response->getStatusCode());
            }

            // decode data from TheMovieDatabase
            $body = json_decode((string) $response->getbody());

            DB::transaction(function () use ($film, $body) {
                // update local database
                $film->imdb_id = $body->imdb_id;
                $film->description = $body->overview;
                $film->language = $body->original_language;
                $film->poster = $body->poster_path;
                $film->released_at = $body->release_date;
                $film->status = $body->status;
                $film->vote = $body->vote_average;
                $film->save();

                // insert into genres

                foreach ($body->genres as $genre) {
                    $default = Genre::firstOrCreate(['title' => $genre->name]);
                    FilmGenre::firstOrCreate([
                        'film_id' => $film->id,
                        'genre_id' => $default->id,
                    ]);
                }

                // insert into house production
                foreach ($body->production_companies as $company) {
                    $production = Production::firstOrCreate([
                        'production_id' => $company->id,
                        'name' => $company->name,
                    ]);

                    FilmProduction::firstOrCreate([
                        'film_id' => $film->id,
                        'production_id' => $production->id,
                    ]);
                }
            });
        }

        return response()->json($film);
    }

    public function view($slug): \Illuminate\View\View
    {
        $film = Film::whereSlug($slug)->first();
        abort_if(empty($film), 404, 'Film not found.');

        return view('movie.view', compact('film'));
    }

    public function random(): \Illuminate\View\View
    {
        return view('movie.view', compact('movie'));
    }

    public function latest(): \Illuminate\Http\JsonResponse
    {
        $films = Film::take(3)
            ->where('description', '!=', '')
            ->where('poster', '!=', '')
            ->inRandomOrder()
            ->get();

        return response()->json($films);
    }

    public function total()
    {
        $total = Film::count();

        return response()->json([
            'number' => $total,
            'string' => number_format($total, 0, ',', '.'),
        ]);
    }
}
