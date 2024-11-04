<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Funciones;
use App\Http\Resources\FuncionesResource;
use Illuminate\Http\Response;

class FuncionesController extends Controller
{
    // Listar todas las funciones
    public function index()
    {
        try {
            $funciones = Funciones::all();
            return response()->json([
                'success' => true,
                'message' => 'Lista de funciones obtenida exitosamente.',
                'data' => FuncionesResource::collection($funciones),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de funciones.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Obtener una función por su ID
    public function show($id)
    {
        try {
            $funcion = Funciones::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Función obtenida exitosamente.',
                'data' => new FuncionesResource($funcion),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la función.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear una nueva función
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'funciones' => 'required|string|max:255',
        ]);

        try {
            $funcion = Funciones::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Función creada exitosamente.',
                'data' => new FuncionesResource($funcion),
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear la función.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar una función existente
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'funciones' => 'sometimes|string|max:255',
        ]);

        try {
            $funcion = Funciones::findOrFail($id);
            $funcion->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Función actualizada exitosamente.',
                'data' => new FuncionesResource($funcion),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar la función.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar una función
    public function destroy($id)
    {
        try {
            $funcion = Funciones::findOrFail($id);
            $funcion->delete();
            return response()->json([
                'success' => true,
                'message' => 'Función eliminada exitosamente.',
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar la función.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
