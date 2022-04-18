<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\{
    PlayerController,
    ScoreController,
    GameController
};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

/** Rota do grupo de jogadores v1 */
Route::prefix('jogadores')->group(function (){

    Route::get('/', [PlayerController::class, 'index'])
    ->name('player.index');

    Route::post('/cadastrar-jogador', [PlayerController::class, 'store'])
    ->name('player.store');
});

/** Rota do grupo de jogos v1 */
Route::prefix('jogos')->group(function (){

    Route::get('/', [GameController::class, 'index'])
    ->name('game.index');

    Route::post('/cadastrar-jogador', [GameController::class, 'store'])
    ->name('game.store');
});

/** Rota do grupo de scores v1 */
Route::prefix('scores')->group(function (){

    Route::get('/', [ScoreController::class, 'index'])
    ->name('player-score.index');

    Route::post('/jogador/{player}', [ScoreController::class, 'store'])
    ->name('player-score.store');
});
