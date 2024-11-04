<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rol;
use App\Models\Permiso;
use App\Models\Trabajador;
use App\Models\TipoContrato;
use App\Models\Contrato;

class TestConsultasController extends Controller
{
   public function consulta1(){

    
    /* $nombreTrabajador = Trabajador::pluck('primer_nombre');
    return $nombreTrabajador; */

    /* $Contratos1 = TipoContrato::where('id_tipo_contrato', 1)
            ->firstOrFail() 
            ->contratos;   
        return response()->json($Contratos1); */
   
   /* $num_trabajadores = Trabajador::count();
return $num_trabajadores; */

/* $todos_trabajadores = Trabajador::all();
return $todos_trabajadores; */

/* $ContratoById = Contrato::find(3);
return $ContratoById; */

$usuarios = User::find(1);
$roles = $usuarios->rol()->pluck('nombre')->toArray();
return $roles;
   
    }

}
