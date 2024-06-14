<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuario;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function __construct() {
        auth()->setDefaultDriver('api');
     }
     
    public function signup(Request $request){        
        $userData = usuario::create($request->except('pasword_confirmation'));
        return response()->json(['message'=>"User Added", 'userData'=>$userData,"statusCode"=>200]);
    }

    public function login()
    { 
        $credentials = request(['nombre', 'password']);
        if (! $token = auth()->guard('api')->attempt($credentials)) {
            return response()->json(['error' => 'Failed Email or Password not matches!!'], 401);
        }
        error_log('login auth controller');
        return $this->respondWithToken($token);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
