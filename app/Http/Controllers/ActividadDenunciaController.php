<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ActividadDenuncia;
use App\Http\Resources\ActividadDenunciaResource;
use Illuminate\Http\Response;

class ActividadDenunciaController extends Controller
{
    // Obtener todas las actividades de denuncia
    public function index()
    {
        $actividades = ActividadDenuncia::all();
        return response()->json([
            'success' => true,
            'data' => ActividadDenunciaResource::collection($actividades),
        ], Response::HTTP_OK);
    }

    // Obtener una actividad de denuncia específica
    public function show($id)
    {
        $actividad = ActividadDenuncia::find($id);

        if (!$actividad) {
            return response()->json([
                'success' => false,
                'message' => 'Actividad de denuncia no encontrada.',
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'success' => true,
            'data' => new ActividadDenunciaResource($actividad),
        ], Response::HTTP_OK);
    }

    // Crear una nueva actividad de denuncia
    public function store(Request $request)
    {
        $request->validate([
            'actividad_denuncia' => 'required|string|max:255',
        ]);

        $actividad = ActividadDenuncia::create([
            'actividad_denuncia' => $request->actividad_denuncia,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Actividad de denuncia creada exitosamente.',
            'data' => new ActividadDenunciaResource($actividad),
        ], Response::HTTP_CREATED);
    }

    // Actualizar una actividad de denuncia
    public function update(Request $request, $id)
    {
        $actividad = ActividadDenuncia::find($id);

        if (!$actividad) {
            return response()->json([
                'success' => false,
                'message' => 'Actividad de denuncia no encontrada.',
            ], Response::HTTP_NOT_FOUND);
        }

        $request->validate([
            'actividad_denuncia' => 'required|string|max:255',
        ]);

        $actividad->update([
            'actividad_denuncia' => $request->actividad_denuncia,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Actividad de denuncia actualizada exitosamente.',
            'data' => new ActividadDenunciaResource($actividad),
        ], Response::HTTP_OK);
    }

    // Eliminar una actividad de denuncia
    public function destroy($id)
    {
        $actividad = ActividadDenuncia::find($id);

        if (!$actividad) {
            return response()->json([
                'success' => false,
                'message' => 'Actividad de denuncia no encontrada.',
            ], Response::HTTP_NOT_FOUND);
        }

        $actividad->delete();

        return response()->json([
            'success' => true,
            'message' => 'Actividad de denuncia eliminada exitosamente.',
        ], Response::HTTP_OK);
    }
}
