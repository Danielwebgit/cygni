<?php

namespace App\Services\Score;

use App\Models\Score;

class ScoreService
{
    public function __construct(
        private Score $model
    ){}

    public function createScore(array $scoreData)
    {
        return $this->model::query()->create([
            'game_id' => $scoreData['game_id'],
            'player_id' => auth()->id(),
            'score' => $scoreData['new_score']
        ]);
    }
}
