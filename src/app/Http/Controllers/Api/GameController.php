<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\JsonResponse;

class GameController extends Controller
{
    /**
     * Lista todos os jogos.
     *
     */
    public function index(): JsonResponse
    {
        $games = Game::with('scores')->get();

        return response()->json([
            'message' => 'Jogos e seus Scores',
            'user' => $games
        ], 201);
    }
}
