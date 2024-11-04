<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TipoPolitica;
use App\Http\Resources\TipoPoliticaResource;
use Illuminate\Http\Response;

class TipoPoliticaController extends Controller
{
    // Listar todos los tipos de política
    public function index()
    {
        try {
            $tiposPolitica = TipoPolitica::all();
            return response()->json([
                'success' => true,
                'message' => 'Lista de tipos de política obtenida exitosamente.',
                'data' => TipoPoliticaResource::collection($tiposPolitica)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de tipos de política.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear un nuevo tipo de política
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tipo_politica' => 'required|string|max:255',
        ]);

        try {
            $tipoPolitica = TipoPolitica::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Tipo de política creado exitosamente.',
                'data' => new TipoPoliticaResource($tipoPolitica)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el tipo de política.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Mostrar un tipo de política específico
    public function show($id)
    {
        try {
            $tipoPolitica = TipoPolitica::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Tipo de política obtenido exitosamente.',
                'data' => new TipoPoliticaResource($tipoPolitica)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el tipo de política.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar un tipo de política
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tipo_politica' => 'required|string|max:255',
        ]);

        try {
            $tipoPolitica = TipoPolitica::findOrFail($id);
            $tipoPolitica->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Tipo de política actualizado exitosamente.',
                'data' => new TipoPoliticaResource($tipoPolitica)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el tipo de política.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar un tipo de política
    public function destroy($id)
    {
        try {
            $tipoPolitica = TipoPolitica::findOrFail($id);
            $tipoPolitica->delete();
            return response()->json([
                'success' => true,
                'message' => 'Tipo de política eliminado exitosamente.'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el tipo de política.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
