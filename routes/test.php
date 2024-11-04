<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

use App\Mail\TestContact;
use App\Http\Controllers\Test\Api\CrudController;
use App\Http\Controllers\Test\TestFileController;
use App\Http\Controllers\TestApiController;
use App\Http\Controllers\Test\TestConsultasController;




Route::apiResource('test_api', TestApiController::class);

Route::get('test/consulta1', [TestConsultasController::class, 'consulta1']);

/* crud basico */

/* Route::apiResource('test_api_crud', CrudController::class)->middleware('cors'); */

Route::get('test_api_crud', [CrudController::class, 'index']);
Route::post('test_api_crud', [CrudController::class, 'store']);
Route::put('test_api_crud/{id}', [CrudController::class, 'update']);
Route::delete('test_api_crud/{id}', [CrudController::class, 'destroy']);


/* Route::get('acciones',[AccionController::class,'index']); */

/* Route::apiResource('acciones', AccionController::class); */

Route::post('file', [TestFileController::class, 'file']);

/* Test Envio Mail */
Route::get('contactanos',function(){
    Mail::to('sistemadesignstyle@gmail.com')->send(new TestContact);
    return "mensaje enviado";
})->name('contactanos');