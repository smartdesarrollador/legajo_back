<?php

use App\Http\Controllers\PermisoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::prefix('permisos')->group(function () {
    // Ruta para listar permisos con filtros
    Route::get('/', [PermisoController::class, 'index'])->name('permisos.index');

    // Ruta para obtener los detalles de un permiso específico
    Route::get('/{id}', [PermisoController::class, 'show'])->name('permisos.show');

    // Ruta para crear un nuevo permiso
    Route::post('/', [PermisoController::class, 'store'])->name('permisos.store');
});