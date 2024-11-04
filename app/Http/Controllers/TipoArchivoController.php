<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TipoArchivo;
use App\Http\Resources\TipoArchivoResource;
use Illuminate\Http\Response;

class TipoArchivoController extends Controller
{
    // Listar todos los tipos de archivo
    public function index()
    {
        try {
            $tiposArchivo = TipoArchivo::all();
            return response()->json([
                'success' => true,
                'message' => 'Lista de tipos de archivo obtenida exitosamente.',
                'data' => TipoArchivoResource::collection($tiposArchivo)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de tipos de archivo.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear un nuevo tipo de archivo
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tipo_archivo' => 'required|string|max:255',
            'icono' => 'nullable|string|max:255',
        ]);

        try {
            $tipoArchivo = TipoArchivo::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Tipo de archivo creado exitosamente.',
                'data' => new TipoArchivoResource($tipoArchivo)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el tipo de archivo.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Mostrar un tipo de archivo específico
    public function show($id)
    {
        try {
            $tipoArchivo = TipoArchivo::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Tipo de archivo obtenido exitosamente.',
                'data' => new TipoArchivoResource($tipoArchivo)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el tipo de archivo.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar un tipo de archivo
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tipo_archivo' => 'required|string|max:255',
            'icono' => 'nullable|string|max:255',
        ]);

        try {
            $tipoArchivo = TipoArchivo::findOrFail($id);
            $tipoArchivo->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Tipo de archivo actualizado exitosamente.',
                'data' => new TipoArchivoResource($tipoArchivo)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el tipo de archivo.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar un tipo de archivo
    public function destroy($id)
    {
        try {
            $tipoArchivo = TipoArchivo::findOrFail($id);
            $tipoArchivo->delete();
            return response()->json([
                'success' => true,
                'message' => 'Tipo de archivo eliminado exitosamente.'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el tipo de archivo.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
