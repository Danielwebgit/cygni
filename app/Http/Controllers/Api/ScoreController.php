<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ScoreRequest;
use App\Services\Score\ScoreService;
use App\Repositories\Player\PlayerRepository;
use Illuminate\Support\Facades\DB;

class ScoreController extends Controller
{
    public function __construct(
        private PlayerRepository $accountRepository
    ){}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ranks = DB::select(
            "SELECT *, dense_rank() OVER (order by score desc) AS posicao FROM scores"
        );

        return json_encode($ranks);
    }

    public function store(
        ScoreRequest $request,
        ScoreService $ScoreServices
    )
    {
        $storeScore = $ScoreServices->createScore(
            $request->validated()
        );

        $player = $this->accountRepository->getPlayer($storeScore->player_id);

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
