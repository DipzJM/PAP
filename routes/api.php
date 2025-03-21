<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->post('/login', [AuthController::class, 'login']);



Route::group([
    'middleware' => 'auth:api',
    'guard' => 'auth'
], function ($router) {
    Route::get('/getUserData', [AuthController::class, 'userData']);

    //Criar Jogo
    Route::middleware('api')->post('/createGame', [GameController::class, 'CreateGame']);

    //Update UserVehicles
    Route::middleware('api')->post('/updateUserVehicles', [UserController::class, 'updateUserVehicles']);
});
