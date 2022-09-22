<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(Request $request){
        $loginRequest = $request->only(['email','password']);

        if(Auth::attempt($loginRequest)) {
            $user = Auth::user();
            $accessToken = $user->createToken('userToken')->accessToken;
            return ['user'=>$user,
                'accessToken'=>$accessToken->token
            ];

        }
    }

    public function logout(Request $request){
        $accessToken = Auth::user()->token();
        $token = $request->user()->tokens->find($accessToken);
        $token->revoke();
        return [
            'message'=>'loged out'];
    }
}
