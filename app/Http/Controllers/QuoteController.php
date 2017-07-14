<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;
use Validator;

class QuoteController extends Controller
{
    public function random(): \Illuminate\Http\JsonResponse
    {
        $quote = Quote::inRandomOrder()
            ->with('film')
            ->first();

        if (!is_null($quote->user_id)) {
            $quote->load('user');
        }

        return response()->json($quote);
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
