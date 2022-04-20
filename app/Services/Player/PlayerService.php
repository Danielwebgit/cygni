<?php

namespace App\Services\Player;

use App\Models\Player;
use Illuminate\Support\Facades\Hash;

class PlayerService
{
    public function __construct(
        private Player $model
    ){}

    public function createPlayer(array $playerData)
    {
        return Player::create([
            'name' => $playerData['name'],
            'surname' => $playerData['surname'],
            'email' => $playerData['email'],
            'password' => Hash::make($playerData['password'])
        ]);
    }
}
