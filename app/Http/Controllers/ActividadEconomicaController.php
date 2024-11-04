<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ActividadEconomica;
use App\Http\Resources\ActividadEconomicaResource;
use Illuminate\Http\Response;

class ActividadEconomicaController extends Controller
{
    // Obtener todas las actividades económicas
    public function index()
    {
        $actividadesEconomicas = ActividadEconomica::all();
        return response()->json([
            'success' => true,
            'data' => ActividadEconomicaResource::collection($actividadesEconomicas),
        ], Response::HTTP_OK);
    }

    // Obtener una actividad económica específica
    public function show($id)
    {
        $actividadEconomica = ActividadEconomica::find($id);

        if (!$actividadEconomica) {
            return response()->json([
                'success' => false,
                'message' => 'Actividad económica no encontrada.',
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'success' => true,
            'data' => new ActividadEconomicaResource($actividadEconomica),
        ], Response::HTTP_OK);
    }

    // Crear una nueva actividad económica
    public function store(Request $request)
    {
        $request->validate([
            'actividad_economica' => 'required|string|max:255',
        ]);

        $actividadEconomica = ActividadEconomica::create([
            'actividad_economica' => $request->actividad_economica,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Actividad económica creada exitosamente.',
            'data' => new ActividadEconomicaResource($actividadEconomica),
        ], Response::HTTP_CREATED);
    }

    // Actualizar una actividad económica
    public function update(Request $request, $id)
    {
        $actividadEconomica = ActividadEconomica::find($id);

        if (!$actividadEconomica) {
            return response()->json([
                'success' => false,
                'message' => 'Actividad económica no encontrada.',
            ], Response::HTTP_NOT_FOUND);
        }

        $request->validate([
            'actividad_economica' => 'required|string|max:255',
        ]);

        $actividadEconomica->update([
            'actividad_economica' => $request->actividad_economica,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Actividad económica actualizada exitosamente.',
            'data' => new ActividadEconomicaResource($actividadEconomica),
        ], Response::HTTP_OK);
    }

    // Eliminar una actividad económica
    public function destroy($id)
    {
        $actividadEconomica = ActividadEconomica::find($id);

        if (!$actividadEconomica) {
            return response()->json([
                'success' => false,
                'message' => 'Actividad económica no encontrada.',
            ], Response::HTTP_NOT_FOUND);
        }

        $actividadEconomica->delete();

        return response()->json([
            'success' => true,
            'message' => 'Actividad económica eliminada exitosamente.',
        ], Response::HTTP_OK);
    }
}
