<?php

namespace App\Http\Controllers;

use App\Contracts\UserContract;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\SuccessResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected UserContract $userRepo;

    public function __construct()
    {
        $this->userRepo = app()->make(UserContract::class);
    }
    public function login(Request $request)
    {
        $loginRequest = $request->only(['email','password']);

        if(Auth::attempt($loginRequest)) {
            $user = Auth::user();
            $request->session()->regenerate();
//            $accessToken = $user->createToken('userToken')->accessToken;
//            return ['user'=>$user,
//            ];

            return new SuccessResource([
                'message'=>'success',
                'status'=>200
            ]);

        }else{
            return new ErrorResource([
                'message'=>'Invalid password or email',
                'status'=> 422
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return new SuccessResource([

            'message'=>'success',
            'status'=>200
        ]);
    }
    public function register(Request $request)
    {
        $data = [
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>Hash::make($request->input('password')),
        ];
        $this->userRepo->create($data);
    }
}
