<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoriaD;
use App\Http\Resources\HistoriaDResource;
use Illuminate\Http\Response;

class HistoriaDController extends Controller
{
    // Función para obtener todos los registros
    public function index()
    {
        try {
            $historiasD = HistoriaD::with(['historia', 'documento', 'situacion'])->get();
            return response()->json([
                'success' => true,
                'data' => HistoriaDResource::collection($historiasD)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener las historias de detalle.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Función para obtener un registro por su ID
    public function show($id)
    {
        try {
            $historiaD = HistoriaD::with(['historia', 'documento', 'situacion'])->findOrFail($id);
            return response()->json([
                'success' => true,
                'data' => new HistoriaDResource($historiaD)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Historia de detalle no encontrada.',
                'error' => $e->getMessage()
            ], Response::HTTP_NOT_FOUND);
        }
    }

    // Función para crear un nuevo registro
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'comentario' => 'required|string',
                'id_historia' => 'required|exists:historias,id',
                'id_documento' => 'nullable|exists:documentos,id',
                'id_situacion' => 'nullable|exists:situaciones,id',
            ]);

            $historiaD = HistoriaD::create($validatedData);

            return response()->json([
                'success' => true,
                'message' => 'Historia de detalle creada exitosamente.',
                'data' => new HistoriaDResource($historiaD)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear la historia de detalle.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Función para actualizar un registro existente
    public function update(Request $request, $id)
    {
        try {
            $historiaD = HistoriaD::findOrFail($id);

            $validatedData = $request->validate([
                'comentario' => 'sometimes|string',
                'id_historia' => 'sometimes|exists:historias,id',
                'id_documento' => 'nullable|exists:documentos,id',
                'id_situacion' => 'nullable|exists:situaciones,id',
            ]);

            $historiaD->update($validatedData);

            return response()->json([
                'success' => true,
                'message' => 'Historia de detalle actualizada exitosamente.',
                'data' => new HistoriaDResource($historiaD)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar la historia de detalle.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Función para eliminar un registro
    public function destroy($id)
    {
        try {
            $historiaD = HistoriaD::findOrFail($id);
            $historiaD->delete();

            return response()->json([
                'success' => true,
                'message' => 'Historia de detalle eliminada exitosamente.',
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar la historia de detalle.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
