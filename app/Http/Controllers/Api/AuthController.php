<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(): JsonResponse
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => config('jwt.ttl') * 60,
        ]);
    }

    public function user(): JsonResponse
    {
        return response()->json(auth()->user());
    }

    public function logout(): JsonResponse
    {
        try {
            auth()->invalidate(true);
            //JWTAuth::invalidate(request()->header("Authorization"));
            return response()->json([
                "status" => "success",
                "message"=> "User successfully logged out."
            ]);
        } catch (JWTException $e) {
            report($e);
            return response()->json([
                "status" => "error",
                "message" => "Failed to logout, please try again."
            ], 500);
        }
    }
}
