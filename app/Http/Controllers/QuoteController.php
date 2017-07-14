<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;
use Validator;

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

    public function create(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'film_id' => 'required|integer|exists:films,id',
            'name' => 'required',
            'quote' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'validations' => $validator->errors(),
            ], 422);
        }

        $quote = Quote::create([
            'film_id' => $request->film_id,
            'role' => $request->name,
            'quote' => $request->quote,
        ]);

        return response()->json([
            'status' => true,
        ]);
    }
}
