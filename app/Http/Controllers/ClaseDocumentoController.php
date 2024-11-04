<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ClaseDocumento;
use App\Http\Resources\ClaseDocumentoResource;
use Illuminate\Http\Response;

class ClaseDocumentoController extends Controller
{
    // Listar todas las clases de documentos
    public function index()
    {
        try {
            $claseDocumentos = ClaseDocumento::all();
            return response()->json([
                'success' => true,
                'message' => 'Lista de clases de documentos obtenida exitosamente.',
                'data' => ClaseDocumentoResource::collection($claseDocumentos)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de clases de documentos.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Obtener una clase de documento por ID
    public function show($id)
    {
        try {
            $claseDocumento = ClaseDocumento::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Clase de documento obtenida exitosamente.',
                'data' => new ClaseDocumentoResource($claseDocumento)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la clase de documento.',
                'error' => $e->getMessage()
            ], Response::HTTP_NOT_FOUND);
        }
    }

    // Crear una nueva clase de documento
    public function store(Request $request)
    {
        $request->validate([
            'clase_documento' => 'required|string|max:255',
        ]);

        try {
            $claseDocumento = ClaseDocumento::create([
                'clase_documento' => $request->clase_documento,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Clase de documento creada exitosamente.',
                'data' => new ClaseDocumentoResource($claseDocumento)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear la clase de documento.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar una clase de documento
    public function update(Request $request, $id)
    {
        $request->validate([
            'clase_documento' => 'required|string|max:255',
        ]);

        try {
            $claseDocumento = ClaseDocumento::findOrFail($id);
            $claseDocumento->update([
                'clase_documento' => $request->clase_documento,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Clase de documento actualizada exitosamente.',
                'data' => new ClaseDocumentoResource($claseDocumento)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar la clase de documento.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar una clase de documento
    public function destroy($id)
    {
        try {
            $claseDocumento = ClaseDocumento::findOrFail($id);
            $claseDocumento->delete();

            return response()->json([
                'success' => true,
                'message' => 'Clase de documento eliminada exitosamente.',
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar la clase de documento.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
