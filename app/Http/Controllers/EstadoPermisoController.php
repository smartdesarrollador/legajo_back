<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EstadoPermiso;
use App\Http\Resources\EstadoPermisoResource;
use Illuminate\Http\Response;

class EstadoPermisoController extends Controller
{
     // Listar todos los estados de permiso
    public function index()
    {
        try {
            $estados = EstadoPermiso::all();
            return response()->json([
                'success' => true,
                'message' => 'Lista de estados de permiso obtenida exitosamente.',
                'data' => EstadoPermisoResource::collection($estados),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de estados de permiso.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Obtener un estado de permiso por su ID
    public function show($id)
    {
        try {
            $estado = EstadoPermiso::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Estado de permiso obtenido exitosamente.',
                'data' => new EstadoPermisoResource($estado),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el estado de permiso.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear un nuevo estado de permiso
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'estado_permiso' => 'required|string|max:255',
        ]);

        try {
            $estado = EstadoPermiso::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Estado de permiso creado exitosamente.',
                'data' => new EstadoPermisoResource($estado),
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el estado de permiso.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar un estado de permiso existente
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'estado_permiso' => 'sometimes|string|max:255',
        ]);

        try {
            $estado = EstadoPermiso::findOrFail($id);
            $estado->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Estado de permiso actualizado exitosamente.',
                'data' => new EstadoPermisoResource($estado),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el estado de permiso.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar un estado de permiso
    public function destroy($id)
    {
        try {
            $estado = EstadoPermiso::findOrFail($id);
            $estado->delete();
            return response()->json([
                'success' => true,
                'message' => 'Estado de permiso eliminado exitosamente.',
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el estado de permiso.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
