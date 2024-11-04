<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\EstadoTrabajadorResource;
use App\Models\EstadoTrabajador;
use Symfony\Component\HttpFoundation\Response;

class EstadoTrabajadorController extends Controller
{
    //

    /**
     * Muestra una lista de estados de trabajador.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $estadosTrabajador = EstadoTrabajador::all();
        return response()->json(EstadoTrabajadorResource::collection($estadosTrabajador), Response::HTTP_OK);
    }

    /**
     * Muestra un estado de trabajador específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $estadoTrabajador = EstadoTrabajador::findOrFail($id);
        return response()->json(new EstadoTrabajadorResource($estadoTrabajador), Response::HTTP_OK);
    }
}
