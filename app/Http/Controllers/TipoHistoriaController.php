<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TipoHistoria;
use App\Http\Resources\TipoHistoriaResource;
use Illuminate\Http\Response;

class TipoHistoriaController extends Controller
{
    // Listar todos los tipos de historia
    public function index()
    {
        try {
            $tiposHistoria = TipoHistoria::all();
            return response()->json([
                'success' => true,
                'message' => 'Lista de tipos de historia obtenida exitosamente.',
                'data' => TipoHistoriaResource::collection($tiposHistoria)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de tipos de historia.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear un nuevo tipo de historia
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tipo_historia' => 'required|string|max:255',
        ]);

        try {
            $tipoHistoria = TipoHistoria::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Tipo de historia creado exitosamente.',
                'data' => new TipoHistoriaResource($tipoHistoria)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el tipo de historia.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Mostrar un tipo de historia específico
    public function show($id)
    {
        try {
            $tipoHistoria = TipoHistoria::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Tipo de historia obtenido exitosamente.',
                'data' => new TipoHistoriaResource($tipoHistoria)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el tipo de historia.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar un tipo de historia
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tipo_historia' => 'required|string|max:255',
        ]);

        try {
            $tipoHistoria = TipoHistoria::findOrFail($id);
            $tipoHistoria->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Tipo de historia actualizado exitosamente.',
                'data' => new TipoHistoriaResource($tipoHistoria)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el tipo de historia.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar un tipo de historia
    public function destroy($id)
    {
        try {
            $tipoHistoria = TipoHistoria::findOrFail($id);
            $tipoHistoria->delete();
            return response()->json([
                'success' => true,
                'message' => 'Tipo de historia eliminado exitosamente.'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el tipo de historia.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
