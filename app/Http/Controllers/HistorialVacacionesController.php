<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\HistorialVacaciones;
use App\Http\Resources\HistorialVacacionesResource;
use Illuminate\Http\Response;

class HistorialVacacionesController extends Controller
{
    // Listar todos los historiales de vacaciones
    public function index()
    {
        try {
            $historialesVacaciones = HistorialVacaciones::with('trabajador', 'tipoMovimiento')->get();
            return response()->json([
                'success' => true,
                'message' => 'Lista de historiales de vacaciones obtenida exitosamente.',
                'data' => HistorialVacacionesResource::collection($historialesVacaciones)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de historiales de vacaciones.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear un nuevo historial de vacaciones
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fecha' => 'required|date',
            'dias' => 'required|integer',
            'comentarios' => 'nullable|string',
            'id_trabajador' => 'required|exists:trabajadores,id_trabajador',
            'id_tipo_movimiento' => 'required|exists:tipo_movimientos,id_tipo_movimiento'
        ]);

        try {
            $historialVacaciones = HistorialVacaciones::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Historial de vacaciones creado exitosamente.',
                'data' => new HistorialVacacionesResource($historialVacaciones)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el historial de vacaciones.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Mostrar un historial de vacaciones específico
    public function show($id)
    {
        try {
            $historialVacaciones = HistorialVacaciones::with('trabajador', 'tipoMovimiento')->findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Historial de vacaciones obtenido exitosamente.',
                'data' => new HistorialVacacionesResource($historialVacaciones)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el historial de vacaciones.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar un historial de vacaciones
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'fecha' => 'required|date',
            'dias' => 'required|integer',
            'comentarios' => 'nullable|string',
            'id_trabajador' => 'required|exists:trabajadores,id_trabajador',
            'id_tipo_movimiento' => 'required|exists:tipo_movimientos,id_tipo_movimiento'
        ]);

        try {
            $historialVacaciones = HistorialVacaciones::findOrFail($id);
            $historialVacaciones->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Historial de vacaciones actualizado exitosamente.',
                'data' => new HistorialVacacionesResource($historialVacaciones)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el historial de vacaciones.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar un historial de vacaciones
    public function destroy($id)
    {
        try {
            $historialVacaciones = HistorialVacaciones::findOrFail($id);
            $historialVacaciones->delete();
            return response()->json([
                'success' => true,
                'message' => 'Historial de vacaciones eliminado exitosamente.'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el historial de vacaciones.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
