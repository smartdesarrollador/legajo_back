<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TipoDocumento;
use App\Http\Resources\TipoDocumentoResource;
use Illuminate\Http\Response;

class TipoDocumentoController extends Controller
{
    // Listar todos los tipos de documentos
    public function index()
    {
        try {
            $tiposDocumento = TipoDocumento::all();
            return response()->json([
                'success' => true,
                'message' => 'Lista de tipos de documento obtenida exitosamente.',
                'data' => TipoDocumentoResource::collection($tiposDocumento)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de tipos de documento.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear un nuevo tipo de documento
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tipo_documento' => 'required|string|max:255',
        ]);

        try {
            $tipoDocumento = TipoDocumento::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Tipo de documento creado exitosamente.',
                'data' => new TipoDocumentoResource($tipoDocumento)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el tipo de documento.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Mostrar un tipo de documento específico
    public function show($id)
    {
        try {
            $tipoDocumento = TipoDocumento::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Tipo de documento obtenido exitosamente.',
                'data' => new TipoDocumentoResource($tipoDocumento)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el tipo de documento.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar un tipo de documento
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tipo_documento' => 'required|string|max:255',
        ]);

        try {
            $tipoDocumento = TipoDocumento::findOrFail($id);
            $tipoDocumento->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Tipo de documento actualizado exitosamente.',
                'data' => new TipoDocumentoResource($tipoDocumento)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el tipo de documento.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar un tipo de documento
    public function destroy($id)
    {
        try {
            $tipoDocumento = TipoDocumento::findOrFail($id);
            $tipoDocumento->delete();
            return response()->json([
                'success' => true,
                'message' => 'Tipo de documento eliminado exitosamente.'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el tipo de documento.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
