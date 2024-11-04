<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\TipoEmpleadorResource;
use App\Models\TipoEmpleador;

class TipoEmpleadorController extends Controller
{
    public function index()
    {
        $tiposEmpleador = TipoEmpleador::all();
        return response()->json(TipoEmpleadorResource::collection($tiposEmpleador));
    }
}
