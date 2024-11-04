<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\AreaResource;
use App\Models\Area;
use Symfony\Component\HttpFoundation\Response;

class AreaController extends Controller
{
    /**
     * Muestra una lista de áreas.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $areas = Area::all();
        return response()->json(AreaResource::collection($areas), Response::HTTP_OK);
    }

    /**
     * Muestra un área específica.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $area = Area::findOrFail($id);
        return response()->json(new AreaResource($area), Response::HTTP_OK);
    }
}
