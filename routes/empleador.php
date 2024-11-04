<?php

use App\Http\Controllers\EmpleadorController;
use Illuminate\Support\Facades\Route;

// Rutas para EmpleadorController

// Mostrar todos los empleadores
Route::get('/empleadores', [EmpleadorController::class, 'index']);

// Mostrar un empleador específico
Route::get('/empleadores/{id}', [EmpleadorController::class, 'show']);

// Crear un nuevo empleador
Route::post('/empleadores', [EmpleadorController::class, 'store']);

// Actualizar un empleador existente
Route::put('/empleadores/{id}', [EmpleadorController::class, 'update']);

// Eliminar un empleador
Route::delete('/empleadores/{id}', [EmpleadorController::class, 'destroy']);

// Mostrar el último empleador registrado
Route::get('/ultimo_empleador', [EmpleadorController::class, 'ultimo_empleador']);

// Mostrar actividad del último empleador
Route::get('/actividad_ultimo_empleador', [EmpleadorController::class, 'actividad_ultimo_empleador']);

// Mostrar empleador asociado al usuario autenticado
 Route::middleware('/empleadores/auth:api')->get('/user', [EmpleadorController::class, 'showByLoggedUser']);

// Obtener régimen laboral desde la tabla intermedia
Route::get('/empleadores/{id}/regimen-laboral-intermedia', [EmpleadorController::class, 'getRegimenLaboralFromIntermedia']);

// Obtener empleador por ID de usuario
Route::get('/empleador/user/{id_user}', [EmpleadorController::class, 'getEmpleadorByUserId']);

// Actualizar empleador con relación a régimen laboral
Route::put('/empleador/{id}', [EmpleadorController::class, 'updateEmpleador']);

// Listar todos los empleadores
Route::get('/empleadores/listar', [EmpleadorController::class, 'listarEmpleadores']);

// Buscar empleador por nombre
Route::get('/empleadores/search_by_name', [EmpleadorController::class, 'searchByName']);

// Buscar empleador por tipo
Route::get('/empleadores/search_by_type', [EmpleadorController::class, 'searchByType']);

// Buscar empleadores con filtros
Route::get('/empleadores/search', [EmpleadorController::class, 'search']);
