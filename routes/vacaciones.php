<?php

use App\Http\Controllers\VacacionesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



Route::get('vacaciones', [VacacionesController::class, 'index']);

Route::get('consulta-vacaciones', [VacacionesController::class, 'consulta_vacaciones']);

Route::get('consulta-vacaciones-trabajadores', [VacacionesController::class, 'consulta_vacaciones_trabajadores']);

Route::get('vacaciones/consultar-tipos-vacaciones', [VacacionesController::class, 'getTiposVacaciones']);

Route::get('vacaciones/consultar-trabajadores', [VacacionesController::class, 'getTrabajadores']);
