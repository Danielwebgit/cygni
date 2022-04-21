<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Repositories\Player\PlayerRepository;

class PlayerController extends Controller
{
    public function __construct(
        private PlayerRepository $playerRepository
    ){}
    /**
     * Lista todos os Jogadores.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = $this->playerRepository->getAllPlayers();

        return response()->json($players);
    }
}
