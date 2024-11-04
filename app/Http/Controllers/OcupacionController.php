<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ocupacion;
use App\Http\Resources\OcupacionResource;
use Illuminate\Http\Response;

class OcupacionController extends Controller
{
    // Listar todas las ocupaciones
    public function index()
    {
        try {
            $ocupaciones = Ocupacion::all();
            return response()->json([
                'success' => true,
                'message' => 'Lista de ocupaciones obtenida exitosamente.',
                'data' => OcupacionResource::collection($ocupaciones)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de ocupaciones.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear una nueva ocupación
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ocupacion' => 'required|string|max:255',
        ]);

        try {
            $ocupacion = Ocupacion::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Ocupación creada exitosamente.',
                'data' => new OcupacionResource($ocupacion)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear la ocupación.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Mostrar una ocupación específica
    public function show($id)
    {
        try {
            $ocupacion = Ocupacion::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Ocupación obtenida exitosamente.',
                'data' => new OcupacionResource($ocupacion)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la ocupación.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar una ocupación
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'ocupacion' => 'required|string|max:255',
        ]);

        try {
            $ocupacion = Ocupacion::findOrFail($id);
            $ocupacion->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Ocupación actualizada exitosamente.',
                'data' => new OcupacionResource($ocupacion)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar la ocupación.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar una ocupación
    public function destroy($id)
    {
        try {
            $ocupacion = Ocupacion::findOrFail($id);
            $ocupacion->delete();
            return response()->json([
                'success' => true,
                'message' => 'Ocupación eliminada exitosamente.'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar la ocupación.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
