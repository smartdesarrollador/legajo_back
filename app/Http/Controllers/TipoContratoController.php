<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\TipoContratoResource;
use App\Models\TipoContrato;
use Symfony\Component\HttpFoundation\Response;

class TipoContratoController extends Controller
{
   /**
     * Muestra una lista de tipos de contrato.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $tiposContrato = TipoContrato::all();
        return response()->json(TipoContratoResource::collection($tiposContrato), Response::HTTP_OK);
    }

    /**
     * Muestra un tipo de contrato específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $tipoContrato = TipoContrato::findOrFail($id);
        return response()->json(new TipoContratoResource($tipoContrato), Response::HTTP_OK);
    }
}
