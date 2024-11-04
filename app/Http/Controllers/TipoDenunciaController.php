<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TipoDenuncia;
use App\Http\Resources\TipoDenunciaResource;
use Illuminate\Http\Response;

class TipoDenunciaController extends Controller
{
    // Listar todos los tipos de denuncia
    public function index()
    {
        try {
            $tiposDenuncia = TipoDenuncia::all();
            return response()->json([
                'success' => true,
                'message' => 'Lista de tipos de denuncia obtenida exitosamente.',
                'data' => TipoDenunciaResource::collection($tiposDenuncia)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de tipos de denuncia.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear un nuevo tipo de denuncia
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tipo_denuncia' => 'required|string|max:255',
        ]);

        try {
            $tipoDenuncia = TipoDenuncia::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Tipo de denuncia creado exitosamente.',
                'data' => new TipoDenunciaResource($tipoDenuncia)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el tipo de denuncia.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Mostrar un tipo de denuncia específico
    public function show($id)
    {
        try {
            $tipoDenuncia = TipoDenuncia::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Tipo de denuncia obtenido exitosamente.',
                'data' => new TipoDenunciaResource($tipoDenuncia)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el tipo de denuncia.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar un tipo de denuncia
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tipo_denuncia' => 'required|string|max:255',
        ]);

        try {
            $tipoDenuncia = TipoDenuncia::findOrFail($id);
            $tipoDenuncia->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Tipo de denuncia actualizado exitosamente.',
                'data' => new TipoDenunciaResource($tipoDenuncia)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el tipo de denuncia.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar un tipo de denuncia
    public function destroy($id)
    {
        try {
            $tipoDenuncia = TipoDenuncia::findOrFail($id);
            $tipoDenuncia->delete();
            return response()->json([
                'success' => true,
                'message' => 'Tipo de denuncia eliminado exitosamente.'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el tipo de denuncia.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
