<?php

namespace App\Http\Controllers;

class QuoteController extends Controller
{
    public function latest(): \Illuminate\Http\JsonResponse
    {
        $quotes = [
            [
                'quote' => 'Get away from her, you bitch!',
                'name' => 'Ripley',
                'title' => 'Allien',
            ],
            [
                'quote' => 'Remember those posters that said, “Today is the first day of the rest of your life”? Well, that’s true of every day but one…the day you die.',
                'name' => 'Lestern Burnham',
                'title' => 'American Beauty',
            ],
            [
                'quote' => 'All those moments will be lost in time…like tears in rain. Time to die.',
                'name' => 'Batty',
                'title' => 'Blade Runner',
            ],
        ];

        return response()->json(collect($quotes)->random());
    }
}
