<?php

namespace App\Repositories\Player;

use App\Models\Score;

class ScoreRepository
{
    public function __construct(
        private Score $model
    ){}

    public function findPlayer(int $player_id)
    {
        return $this->model::query()->select('name')->find($player_id);
    }
}
