<?php

use App\Http\Controllers\LicenciaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



Route::get('licencias', [LicenciaController::class, 'index']);

Route::get('consulta-licencia', [LicenciaController::class, 'consulta_licencia']);
