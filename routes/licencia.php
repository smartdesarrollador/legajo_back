<?php

use App\Http\Controllers\LicenciaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



Route::get('licencias', [LicenciaController::class, 'index']);

// Consulta de licencias de un determinado trabajador
Route::get('consulta-licencia', [LicenciaController::class, 'consulta_licencia']);

// Consulta de licencias de trabajadores de un determinado empleador
Route::get('consulta-licencias-trabajadores', [LicenciaController::class, 'consulta_licencias_trabajadores']);

// Obtener trabajadores por empleador
Route::get('licencia/obtener-trabajadores', [LicenciaController::class, 'obtener_trabajadores']);

// Obtener áreas por empleador
Route::get('licencia/obtener-areas', [LicenciaController::class, 'obtener_areas']);
