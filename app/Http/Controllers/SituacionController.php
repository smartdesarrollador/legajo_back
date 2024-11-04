<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Situacion;
use App\Http\Resources\SituacionResource;
use Illuminate\Http\Response;

class SituacionController extends Controller
{
    // Listar todas las situaciones
    public function index()
    {
        try {
            $situaciones = Situacion::all();
            return response()->json([
                'success' => true,
                'message' => 'Lista de situaciones obtenida exitosamente.',
                'data' => SituacionResource::collection($situaciones)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de situaciones.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear una nueva situación
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'situacion' => 'required|string|max:255',
        ]);

        try {
            $situacion = Situacion::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Situación creada exitosamente.',
                'data' => new SituacionResource($situacion)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear la situación.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Mostrar una situación específica
    public function show($id)
    {
        try {
            $situacion = Situacion::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Situación obtenida exitosamente.',
                'data' => new SituacionResource($situacion)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la situación.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar una situación
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'situacion' => 'required|string|max:255',
        ]);

        try {
            $situacion = Situacion::findOrFail($id);
            $situacion->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Situación actualizada exitosamente.',
                'data' => new SituacionResource($situacion)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar la situación.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar una situación
    public function destroy($id)
    {
        try {
            $situacion = Situacion::findOrFail($id);
            $situacion->delete();
            return response()->json([
                'success' => true,
                'message' => 'Situación eliminada exitosamente.'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar la situación.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
