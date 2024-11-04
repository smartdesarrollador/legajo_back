<?php

use App\Http\Controllers\ContratoController;
use Illuminate\Support\Facades\Route;

/* Route::apiResource('contratos', ContratoController::class); */

Route::prefix('contratos')->group(function () {
    // Ruta para listar contratos con filtros (index)
    Route::get('/', [ContratoController::class, 'index']);

    // Ruta para obtener las opciones de áreas
    Route::get('/areas', [ContratoController::class, 'getAreas']);

    // Ruta para obtener las opciones de estados de contrato
    Route::get('/estados', [ContratoController::class, 'getEstadosContrato']);

    // Ruta para obtener las opciones de tipos de contrato
    Route::get('/tipos', [ContratoController::class, 'getTiposContrato']);

    // Ruta para obtener la lista de trabajadores
    Route::get('/trabajadores', [ContratoController::class, 'getTrabajadores']);

    // Ruta para obtener los detalles de un contrato específico (show)
    Route::get('/{id}', [ContratoController::class, 'show']);
});