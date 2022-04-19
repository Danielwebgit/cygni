<?php

namespace App\Http\Controllers\Api;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PlayerRequest;

class AuthController extends Controller
{

    public function login(Request $request): JsonResponse
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }


    public function register(PlayerRequest $request): JsonResponse
    {
        $user = Player::create([
            'name' => $request->validated()['name'],
            'surname' => $request->validated()['surname'],
            'email' => $request->validated()['email'],
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'message' => 'Cadastro realizado com sucesso!',
            'user' => $user
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
