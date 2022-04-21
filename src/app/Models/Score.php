<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $fillable = [
        'score',
        'player_id',
        'game_id',
    ];

    public function games(){
        return $this->belongsTo(Game::class);
    }

    public function player(){
        return $this->belongsTo(Score::class);
    }
}
