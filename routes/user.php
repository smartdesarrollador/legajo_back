<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::post('register',[UserController::class,'register']);

Route::post('login',[UserController::class,'login']);

Route::get('/usuarios/lista', [UserController::class, 'index']);

Route::post('/generate-temporary-token', [UserController::class, 'generateTemporaryToken']);

Route::post('/validate-token', [UserController::class, 'validateToken']);