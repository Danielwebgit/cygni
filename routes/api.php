<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\{
    PlayerController,
    ScoreController,
    GameController,
    AuthController
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

/** Rota para login e registro */
Route::prefix('auth')->group(function (){
Route::post('/login', [AuthController::class,'login']);
Route::post('/cadastrar', [AuthController::class,'register']);
});

/** Rota do grupo de jogadores v1 */
Route::prefix('jogadores')->group(function (){

    Route::get('/', [PlayerController::class, 'index'])
    ->name('player.index');

    Route::post('/cadastrar', [PlayerController::class, 'store'])
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
Route::prefix('rank')->group(function (){

    Route::get('/', [ScoreController::class, 'index'])
    ->name('player-score.index');

    Route::post('/jogador/{player}', [ScoreController::class, 'store'])
    ->name('player-score.store');
});

Route::group(['middleware' => ['apiJwt',]], function () {

    Route::post('/novo-score', [ScoreController::class, 'store'])
    ->name('player-score.store');
});


