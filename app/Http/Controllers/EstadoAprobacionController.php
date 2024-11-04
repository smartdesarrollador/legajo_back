<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\EstadoAprobacion;
use App\Http\Resources\EstadoAprobacionResource;
use Illuminate\Http\Response;

class EstadoAprobacionController extends Controller
{
    // Listar todos los estados de aprobación
    public function index()
    {
        try {
            $estados = EstadoAprobacion::with(['vacaciones'])->get();
            return response()->json([
                'success' => true,
                'message' => 'Lista de estados de aprobación obtenida exitosamente.',
                'data' => EstadoAprobacionResource::collection($estados),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de estados de aprobación.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Obtener un estado de aprobación por su ID
    public function show($id)
    {
        try {
            $estado = EstadoAprobacion::with(['vacaciones'])->findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Estado de aprobación obtenido exitosamente.',
                'data' => new EstadoAprobacionResource($estado),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el estado de aprobación.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear un nuevo estado de aprobación
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'estado_aprobacion' => 'required|string|max:255',
            'aprobado_por' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'fecha_aprobacion' => 'required|date',
            'comentario' => 'nullable|string',
            'id_vacaciones' => 'required|exists:vacaciones,id_vacaciones', // Validación de relación con vacaciones
        ]);

        try {
            $estado = EstadoAprobacion::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Estado de aprobación creado exitosamente.',
                'data' => new EstadoAprobacionResource($estado),
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el estado de aprobación.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar un estado de aprobación existente
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'estado_aprobacion' => 'sometimes|string|max:255',
            'aprobado_por' => 'sometimes|string|max:255',
            'cargo' => 'sometimes|string|max:255',
            'fecha_aprobacion' => 'sometimes|date',
            'comentario' => 'nullable|string',
            'id_vacaciones' => 'sometimes|exists:vacaciones,id_vacaciones', // Validación de relación con vacaciones
        ]);

        try {
            $estado = EstadoAprobacion::findOrFail($id);
            $estado->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Estado de aprobación actualizado exitosamente.',
                'data' => new EstadoAprobacionResource($estado),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el estado de aprobación.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar un estado de aprobación
    public function destroy($id)
    {
        try {
            $estado = EstadoAprobacion::findOrFail($id);
            $estado->delete();
            return response()->json([
                'success' => true,
                'message' => 'Estado de aprobación eliminado exitosamente.',
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el estado de aprobación.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
