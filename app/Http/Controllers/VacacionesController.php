<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Vacaciones;
use App\Http\Resources\VacacionesResource;
use Illuminate\Http\Response;


class VacacionesController extends Controller
{
    // Listar todas las vacaciones
    public function index()
    {
        try {
            $vacaciones = Vacaciones::with('tipoVacaciones', 'trabajador')->get();
            return response()->json([
                'success' => true,
                'message' => 'Lista de vacaciones obtenida exitosamente.',
                'data' => VacacionesResource::collection($vacaciones)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de vacaciones.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear una nueva solicitud de vacaciones
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fecha_solicitud' => 'required|date',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'dias' => 'required|integer',
            'id_tipo_vacaciones' => 'required|exists:tipo_vacaciones,id_tipo_vacaciones',
            'id_trabajador' => 'required|exists:trabajadores,id_trabajador',
        ]);

        try {
            $vacaciones = Vacaciones::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Vacaciones creadas exitosamente.',
                'data' => new VacacionesResource($vacaciones)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear las vacaciones.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Mostrar una solicitud de vacaciones específica
    public function show($id)
    {
        try {
            $vacaciones = Vacaciones::with('tipoVacaciones', 'trabajador')->findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Vacaciones obtenidas exitosamente.',
                'data' => new VacacionesResource($vacaciones)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener las vacaciones.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar una solicitud de vacaciones
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'fecha_solicitud' => 'required|date',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'dias' => 'required|integer',
            'id_tipo_vacaciones' => 'required|exists:tipo_vacaciones,id_tipo_vacaciones',
            'id_trabajador' => 'required|exists:trabajadores,id_trabajador',
        ]);

        try {
            $vacaciones = Vacaciones::findOrFail($id);
            $vacaciones->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Vacaciones actualizadas exitosamente.',
                'data' => new VacacionesResource($vacaciones)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar las vacaciones.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar una solicitud de vacaciones
    public function destroy($id)
    {
        try {
            $vacaciones = Vacaciones::findOrFail($id);
            $vacaciones->delete();
            return response()->json([
                'success' => true,
                'message' => 'Vacaciones eliminadas exitosamente.'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar las vacaciones.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
