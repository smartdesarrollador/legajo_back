<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Historia;
use App\Http\Resources\HistoriaResource;
use Illuminate\Http\Response;

class HistoriaController extends Controller
{
    // Listar todas las historias
    public function index()
    {
        try {
            $historias = Historia::with(['empleador', 'trabajador', 'tipoHistoria', 'evento', 'accion', 'severidad'])->get();
            return response()->json([
                'success' => true,
                'data' => HistoriaResource::collection($historias)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de historias.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear una nueva historia
    public function store(Request $request)
    {
        try {
            $historia = Historia::create($request->all());
            return response()->json([
                'success' => true,
                'data' => new HistoriaResource($historia),
                'message' => 'Historia creada exitosamente.'
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear la historia.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Mostrar una historia específica
    public function show($id)
    {
        try {
            $historia = Historia::with(['empleador', 'trabajador', 'tipoHistoria', 'evento', 'accion', 'severidad'])->findOrFail($id);
            return response()->json([
                'success' => true,
                'data' => new HistoriaResource($historia)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Historia no encontrada.',
                'error' => $e->getMessage()
            ], Response::HTTP_NOT_FOUND);
        }
    }

    // Actualizar una historia
    public function update(Request $request, $id)
    {
        try {
            $historia = Historia::findOrFail($id);
            $historia->update($request->all());
            return response()->json([
                'success' => true,
                'data' => new HistoriaResource($historia),
                'message' => 'Historia actualizada exitosamente.'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar la historia.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar una historia
    public function destroy($id)
    {
        try {
            $historia = Historia::findOrFail($id);
            $historia->delete();
            return response()->json([
                'success' => true,
                'message' => 'Historia eliminada exitosamente.'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar la historia.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
