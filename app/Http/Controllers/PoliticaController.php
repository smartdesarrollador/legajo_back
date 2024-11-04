<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Politica;
use App\Http\Resources\PoliticaResource;
use Illuminate\Http\Response;

class PoliticaController extends Controller
{
    // Listar todas las políticas
    public function index()
    {
        try {
            $politicas = Politica::with('tipoPolitica', 'empleador')->get();
            return response()->json([
                'success' => true,
                'message' => 'Lista de políticas obtenida exitosamente.',
                'data' => PoliticaResource::collection($politicas)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de políticas.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear una nueva política
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'politica' => 'required|string|max:255',
            'resumen' => 'required|string|max:255',
            'id_tipo_politica' => 'required|exists:tipos_politica,id_tipo_politica',
            'id_empleador' => 'required|exists:empleadores,id_empleador',
        ]);

        try {
            $politica = Politica::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Política creada exitosamente.',
                'data' => new PoliticaResource($politica)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear la política.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Mostrar una política específica
    public function show($id)
    {
        try {
            $politica = Politica::with('tipoPolitica', 'empleador')->findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Política obtenida exitosamente.',
                'data' => new PoliticaResource($politica)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la política.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar una política
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'politica' => 'required|string|max:255',
            'resumen' => 'required|string|max:255',
            'id_tipo_politica' => 'required|exists:tipos_politica,id_tipo_politica',
            'id_empleador' => 'required|exists:empleadores,id_empleador',
        ]);

        try {
            $politica = Politica::findOrFail($id);
            $politica->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Política actualizada exitosamente.',
                'data' => new PoliticaResource($politica)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar la política.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar una política
    public function destroy($id)
    {
        try {
            $politica = Politica::findOrFail($id);
            $politica->delete();
            return response()->json([
                'success' => true,
                'message' => 'Política eliminada exitosamente.'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar la política.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
