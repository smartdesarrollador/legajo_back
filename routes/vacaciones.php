<?php

use App\Http\Controllers\VacacionesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



Route::get('vacaciones', [VacacionesController::class, 'index']);

Route::get('consulta-vacaciones', [VacacionesController::class, 'consulta_vacaciones']);
