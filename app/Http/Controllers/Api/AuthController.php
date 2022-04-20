<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PlayerRequest;
use App\Services\Score\ScoreService;
use App\Services\Player\PlayerService;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    public function __construct(
        private ScoreService $ScoreService,
        private PlayerService $playerService
    ){}

    public function login(Request $request): JsonResponse
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }


    public function registerPlayer(PlayerRequest $request): null|JsonResponse
    {
        $player = $this->playerService->createPlayer(
            $request->validated()
        );

        $playerData = [
            'player_id' => $player->id,
            'game_id' => 1,
            'score' => $request->validated()['score']
        ];

        $score = $this->ScoreService->createScore(
            $playerData
        );

        if(!$player || !$score){
            DB::rollBack();
            logs()->critical('Erro ao criar jogador ou score, verificar serviços!', [
                'player' => $player->name
            ]);
            return null;
        }

        return response()->json([
            'message' => 'Cadastro realizado com sucesso!',
            'user' => $player->name
        ], 201);
    }

    protected function respondWithToken($token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
