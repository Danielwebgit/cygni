<?php

namespace App\Services\Score;

use App\Models\Score;
use Illuminate\Support\Facades\Auth;

class ScoreService
{
    public function __construct(
        private Score $model
    ){}

    public function createScore(array $scoreData)
    {
        return $this->model->query()->create([
            'game_id' => $scoreData['game_id'],
            'player_id' => $scoreData['player_id'] ?? Auth::user()->id,
            'score' => $scoreData['score']
        ]);
    }
}
