<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\FAcumulacionVacaciones;
use App\Http\Resources\FAcumulacionVacacionesResource;
use Illuminate\Http\Response;

class FAcumulacionVacacionesController extends Controller
{
    // Listar todas las acumulaciones de vacaciones
    public function index()
    {
        try {
            $acumulaciones = FAcumulacionVacaciones::all();
            return response()->json([
                'success' => true,
                'message' => 'Lista de acumulaciones de vacaciones obtenida exitosamente.',
                'data' => FAcumulacionVacacionesResource::collection($acumulaciones),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de acumulaciones de vacaciones.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Obtener una acumulación de vacaciones por su ID
    public function show($id)
    {
        try {
            $acumulacion = FAcumulacionVacaciones::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Acumulación de vacaciones obtenida exitosamente.',
                'data' => new FAcumulacionVacacionesResource($acumulacion),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la acumulación de vacaciones.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear una nueva acumulación de vacaciones
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fecha_acumulacion' => 'required|date',
            'dias_acumulados' => 'required|integer',
            'periodo_acumulado' => 'required|string|max:255',
            'nro_dias_acumulados' => 'required|integer',
            'id_vacaciones' => 'required|exists:vacaciones,id_vacaciones',
        ]);

        try {
            $acumulacion = FAcumulacionVacaciones::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Acumulación de vacaciones creada exitosamente.',
                'data' => new FAcumulacionVacacionesResource($acumulacion),
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear la acumulación de vacaciones.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar una acumulación de vacaciones existente
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'fecha_acumulacion' => 'sometimes|date',
            'dias_acumulados' => 'sometimes|integer',
            'periodo_acumulado' => 'sometimes|string|max:255',
            'nro_dias_acumulados' => 'sometimes|integer',
            'id_vacaciones' => 'sometimes|exists:vacaciones,id_vacaciones',
        ]);

        try {
            $acumulacion = FAcumulacionVacaciones::findOrFail($id);
            $acumulacion->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Acumulación de vacaciones actualizada exitosamente.',
                'data' => new FAcumulacionVacacionesResource($acumulacion),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar la acumulación de vacaciones.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar una acumulación de vacaciones
    public function destroy($id)
    {
        try {
            $acumulacion = FAcumulacionVacaciones::findOrFail($id);
            $acumulacion->delete();
            return response()->json([
                'success' => true,
                'message' => 'Acumulación de vacaciones eliminada exitosamente.',
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar la acumulación de vacaciones.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
