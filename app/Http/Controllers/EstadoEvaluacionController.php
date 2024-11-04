<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\EstadoEvaluacion;
use App\Http\Resources\EstadoEvaluacionResource;
use Illuminate\Http\Response;

class EstadoEvaluacionController extends Controller
{
    // Listar todos los estados de evaluación
    public function index()
    {
        try {
            $estados = EstadoEvaluacion::all();
            return response()->json([
                'success' => true,
                'message' => 'Lista de estados de evaluación obtenida exitosamente.',
                'data' => EstadoEvaluacionResource::collection($estados),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de estados de evaluación.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Obtener un estado de evaluación por su ID
    public function show($id)
    {
        try {
            $estado = EstadoEvaluacion::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Estado de evaluación obtenido exitosamente.',
                'data' => new EstadoEvaluacionResource($estado),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el estado de evaluación.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear un nuevo estado de evaluación
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'estado_evaluacion' => 'required|string|max:255',
        ]);

        try {
            $estado = EstadoEvaluacion::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Estado de evaluación creado exitosamente.',
                'data' => new EstadoEvaluacionResource($estado),
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el estado de evaluación.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar un estado de evaluación existente
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'estado_evaluacion' => 'sometimes|string|max:255',
        ]);

        try {
            $estado = EstadoEvaluacion::findOrFail($id);
            $estado->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Estado de evaluación actualizado exitosamente.',
                'data' => new EstadoEvaluacionResource($estado),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el estado de evaluación.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar un estado de evaluación
    public function destroy($id)
    {
        try {
            $estado = EstadoEvaluacion::findOrFail($id);
            $estado->delete();
            return response()->json([
                'success' => true,
                'message' => 'Estado de evaluación eliminado exitosamente.',
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el estado de evaluación.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
