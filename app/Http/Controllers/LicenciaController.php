<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Licencia;
use App\Http\Resources\LicenciaResource;
use Illuminate\Http\Response;

class LicenciaController extends Controller
{
    // Listar todas las licencias
    public function index()
    {
        try {
            $licencias = Licencia::with('area', 'trabajador', 'estadoPermiso')->get();
            return response()->json([
                'success' => true,
                'message' => 'Lista de licencias obtenida exitosamente.',
                'data' => LicenciaResource::collection($licencias)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de licencias.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear una nueva licencia
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fecha_emision' => 'required|date',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'jefe_vacaciones' => 'required|string|max:255',
            'motivo' => 'required|string|max:255',
            'id_area' => 'required|exists:areas,id_area',
            'id_trabajador' => 'required|exists:trabajadores,id_trabajador',
            'id_estado_permiso' => 'required|exists:estado_permisos,id_estado_permiso',
        ]);

        try {
            $licencia = Licencia::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Licencia creada exitosamente.',
                'data' => new LicenciaResource($licencia)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear la licencia.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Mostrar una licencia específica
    public function show($id)
    {
        try {
            $licencia = Licencia::with('area', 'trabajador', 'estadoPermiso')->findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Licencia obtenida exitosamente.',
                'data' => new LicenciaResource($licencia)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la licencia.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar una licencia
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'fecha_emision' => 'required|date',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'jefe_vacaciones' => 'required|string|max:255',
            'motivo' => 'required|string|max:255',
            'id_area' => 'required|exists:areas,id_area',
            'id_trabajador' => 'required|exists:trabajadores,id_trabajador',
            'id_estado_permiso' => 'required|exists:estado_permisos,id_estado_permiso',
        ]);

        try {
            $licencia = Licencia::findOrFail($id);
            $licencia->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Licencia actualizada exitosamente.',
                'data' => new LicenciaResource($licencia)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar la licencia.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar una licencia
    public function destroy($id)
    {
        try {
            $licencia = Licencia::findOrFail($id);
            $licencia->delete();
            return response()->json([
                'success' => true,
                'message' => 'Licencia eliminada exitosamente.'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar la licencia.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
