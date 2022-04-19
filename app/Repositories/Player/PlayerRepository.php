<?php

namespace App\Repositories\Player;

use App\Models\Player;
use Illuminate\Support\Facades\DB;

class PlayerRepository
{
    public function __construct(
        private Player $model
    ){}

    public function findPlayer(int $player_id)
    {
        return $this->model::query()->select('name')->find($player_id);
    }

    public function getRank()
    {
        $ranks = [];

        $dataRank = DB::select(
            "SELECT *, dense_rank() OVER (order by score desc) AS posicao FROM scores"
        );

        foreach($dataRank as $rank){
            $ranks [] = array(
                'jogador' =>  $this->findPlayer($rank->player_id)->name,
                'score' => $rank->score,
                'posicao' => $rank->posicao
            );
        }
        return $ranks;
    }

    public function getAllPlayers()
    {
        return $this->model::query()->select('name', 'surname', 'email')->get();
    }
}
