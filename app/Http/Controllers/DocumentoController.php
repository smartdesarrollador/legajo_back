<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Documento;   
use App\Http\Resources\DocumentoResource;
use Illuminate\Http\Response;

class DocumentoController extends Controller
{
   // Listar todos los documentos
    public function index()
    {
        try {
            $documentos = Documento::with('empleador')->get();
            return response()->json([
                'success' => true,
                'message' => 'Lista de documentos obtenida exitosamente.',
                'data' => DocumentoResource::collection($documentos),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de documentos.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Obtener un documento por su ID
    public function show($id)
    {
        try {
            $documento = Documento::with('empleador')->findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Documento obtenido exitosamente.',
                'data' => new DocumentoResource($documento),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el documento.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear un nuevo documento
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'documento' => 'required|string|max:255',
            'resumen' => 'nullable|string|max:255',
            'version' => 'required|string|max:50',
            'fecha_version' => 'required|date',
            'archivo' => 'required|string|max:255',
            'id_empleador' => 'required|exists:empleadores,id_empleador', // Verifica si el empleador existe
        ]);

        try {
            $documento = Documento::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Documento creado exitosamente.',
                'data' => new DocumentoResource($documento),
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el documento.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar un documento
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'documento' => 'sometimes|string|max:255',
            'resumen' => 'nullable|string|max:255',
            'version' => 'sometimes|string|max:50',
            'fecha_version' => 'sometimes|date',
            'archivo' => 'sometimes|string|max:255',
            'id_empleador' => 'sometimes|exists:empleadores,id_empleador', // Verifica si el empleador existe
        ]);

        try {
            $documento = Documento::findOrFail($id);
            $documento->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Documento actualizado exitosamente.',
                'data' => new DocumentoResource($documento),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el documento.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar un documento
    public function destroy($id)
    {
        try {
            $documento = Documento::findOrFail($id);
            $documento->delete();
            return response()->json([
                'success' => true,
                'message' => 'Documento eliminado exitosamente.',
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el documento.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
