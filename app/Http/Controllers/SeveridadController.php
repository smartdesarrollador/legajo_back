<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Severidad;
use App\Http\Resources\SeveridadResource;
use Illuminate\Http\Response;

class SeveridadController extends Controller
{
    // Listar todas las severidades
    public function index()
    {
        try {
            $severidades = Severidad::all();
            return response()->json([
                'success' => true,
                'message' => 'Lista de severidades obtenida exitosamente.',
                'data' => SeveridadResource::collection($severidades)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de severidades.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear una nueva severidad
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'severidad' => 'required|string|max:255',
        ]);

        try {
            $severidad = Severidad::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Severidad creada exitosamente.',
                'data' => new SeveridadResource($severidad)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear la severidad.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Mostrar una severidad específica
    public function show($id)
    {
        try {
            $severidad = Severidad::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Severidad obtenida exitosamente.',
                'data' => new SeveridadResource($severidad)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la severidad.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar una severidad
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'severidad' => 'required|string|max:255',
        ]);

        try {
            $severidad = Severidad::findOrFail($id);
            $severidad->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Severidad actualizada exitosamente.',
                'data' => new SeveridadResource($severidad)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar la severidad.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar una severidad
    public function destroy($id)
    {
        try {
            $severidad = Severidad::findOrFail($id);
            $severidad->delete();
            return response()->json([
                'success' => true,
                'message' => 'Severidad eliminada exitosamente.'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar la severidad.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
