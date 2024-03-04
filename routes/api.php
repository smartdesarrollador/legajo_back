<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AccionController;
use App\Http\Controllers\TrabajadorController;
use App\Http\Controllers\EmpleadorController;
use App\Http\Controllers\UserController;

use App\Mail\TestContact;
use App\Http\Controllers\Test\ContactController;


use App\Http\Controllers\Test\Api\CrudController;
use App\Http\Controllers\Test\TestFileController;
use App\Http\Controllers\TestApiController;
use App\Http\Controllers\Test\TestConsultasController;








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

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::apiResource('test_api', TestApiController::class);

Route::get('test/consulta1', [TestConsultasController::class, 'consulta1']);

/* crud basico */

/* Route::apiResource('test_api_crud', CrudController::class)->middleware('cors'); */

Route::get('test_api_crud', [CrudController::class, 'index']);
Route::post('test_api_crud', [CrudController::class, 'store']);
Route::put('test_api_crud/{id}', [CrudController::class, 'update']);
Route::delete('test_api_crud/{id}', [CrudController::class, 'destroy']);


/* Route::get('acciones',[AccionController::class,'index']); */

Route::apiResource('acciones', AccionController::class);

Route::post('file', [TestFileController::class, 'file']);

Route::apiResource('trabajador', TrabajadorController::class);

Route::apiResource('empleador', EmpleadorController::class);

Route::get('ultimo_empleador',[EmpleadorController::class,'ultimo_empleador']);

Route::get('actividad_ultimo_empleador',[EmpleadorController::class,'actividad_ultimo_empleador']);

Route::post('register',[UserController::class,'register']);

Route::post('login',[UserController::class,'login']);


/* Test Envio Mail */
Route::get('contactanos',function(){
    Mail::to('sistemadesignstyle@gmail.com')->send(new TestContact);
    return "mensaje enviado";
})->name('contactanos');

Route::post('enviar_correo',[ContactController::class,'sendContactForm']);