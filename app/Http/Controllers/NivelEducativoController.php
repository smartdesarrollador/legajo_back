<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\NivelEducativo;
use App\Http\Resources\NivelEducativoResource;
use Illuminate\Http\Response;

class NivelEducativoController extends Controller
{
    // Listar todos los niveles educativos
    public function index()
    {
        try {
            $nivelesEducativos = NivelEducativo::all();
            return response()->json([
                'success' => true,
                'message' => 'Lista de niveles educativos obtenida exitosamente.',
                'data' => NivelEducativoResource::collection($nivelesEducativos)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de niveles educativos.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear un nuevo nivel educativo
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nivel_educativo' => 'required|string|max:255',
        ]);

        try {
            $nivelEducativo = NivelEducativo::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Nivel educativo creado exitosamente.',
                'data' => new NivelEducativoResource($nivelEducativo)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el nivel educativo.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Mostrar un nivel educativo específico
    public function show($id)
    {
        try {
            $nivelEducativo = NivelEducativo::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Nivel educativo obtenido exitosamente.',
                'data' => new NivelEducativoResource($nivelEducativo)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el nivel educativo.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar un nivel educativo
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nivel_educativo' => 'required|string|max:255',
        ]);

        try {
            $nivelEducativo = NivelEducativo::findOrFail($id);
            $nivelEducativo->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Nivel educativo actualizado exitosamente.',
                'data' => new NivelEducativoResource($nivelEducativo)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el nivel educativo.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar un nivel educativo
    public function destroy($id)
    {
        try {
            $nivelEducativo = NivelEducativo::findOrFail($id);
            $nivelEducativo->delete();
            return response()->json([
                'success' => true,
                'message' => 'Nivel educativo eliminado exitosamente.'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el nivel educativo.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
