<?php

namespace App\Repositories\Player;

use App\Models\Player;

class PlayerRepository
{
    public function __construct(
        private Player $model
    ){}

    public function getPlayer(int $player_id)
    {
        return $this->model::query()->find($player_id);
    }
}
