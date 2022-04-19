<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;

class GameController extends Controller
{
    /**
     * Lista todos os jogos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::with('scores')->get();

        return response()->json([
            'message' => 'Jogos e seus Scores',
            'user' => $games
        ], 201);
    }
}
