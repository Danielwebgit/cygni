<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ScoreRequest;
use App\Services\Score\ScoreService;
use App\Repositories\Player\PlayerRepository;
use App\Repositories\Score\ScoreRepository;
use Illuminate\Support\Facades\DB;

class ScoreController extends Controller
{
    private $playerRepository;

    public function __construct(
        PlayerRepository $playerRepository
    ){
        $this->playerRepository = $playerRepository;
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $rank = $this->playerRepository->getRank();
        return response()->json([
            'data' => [$rank]
        ]);
    }

    public function store(
        ScoreRequest $request,
        ScoreService $ScoreServices
    )
    {
        $storeScore = $ScoreServices->createScore(
            $request->validated()
        );

        $player = $this->playerRepository->findPlayer($storeScore->player_id);

        if (! $storeScore)
        {
            return response()->json([
                'data' => []
            ], 404);
        }
        return response()->json([
            'data' => ["Score Cadastrado! para o $player->name"]
        ]);
    }
}
