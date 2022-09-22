<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Book
Route::get('/book',[BookController::class,'index']);
Route::get('/book/{id}',[BookController::class,'show']);
Route::post('/book',[BookController::class,'store']);
Route::put('/book/{id}',[BookController::class,'update']);
Route::delete('/book/{id}',[BookController::class,'destroy']);

//user
Route::post('/user',[UserController::class,'store']);

//auth
Route::post('/login',[AuthController::class,'login']);
Route::get('/logout',[AuthController::class,'logout']);
