<?php

use App\Http\Controllers\TrabajadorController;
use Illuminate\Support\Facades\Route;

Route::apiResource('trabajadores', TrabajadorController::class);

Route::get('/trabajador/{id}/regimen-laboral', [TrabajadorController::class, 'getRegimenLaboral']);

Route::post('/trabajadores/create', [TrabajadorController::class, 'createTrabajador']);