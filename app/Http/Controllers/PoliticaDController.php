<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PoliticaD;
use App\Http\Resources\PoliticaDResource;
use Illuminate\Http\Response;

class PoliticaDController extends Controller
{
    // Listar todas las políticas detalle
    public function index()
    {
        try {
            $politicasD = PoliticaD::with('politica', 'documento', 'actividadDenuncia')->get();
            return response()->json([
                'success' => true,
                'message' => 'Lista de políticas detalle obtenida exitosamente.',
                'data' => PoliticaDResource::collection($politicasD)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de políticas detalle.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear una nueva política detalle
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'secuencia' => 'required|integer',
            'resumen' => 'required|string|max:255',
            'enviar_correo' => 'required|boolean',
            'requiere_cargo' => 'required|boolean',
            'id_politica' => 'required|exists:politicas,id_politica',
            'id_documento' => 'nullable|exists:documentos,id_documento',
            'id_actividad_denuncia' => 'nullable|exists:actividades_denuncia,id_actividad_denuncia',
        ]);

        try {
            $politicaD = PoliticaD::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Política detalle creada exitosamente.',
                'data' => new PoliticaDResource($politicaD)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear la política detalle.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Mostrar una política detalle específica
    public function show($id)
    {
        try {
            $politicaD = PoliticaD::with('politica', 'documento', 'actividadDenuncia')->findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Política detalle obtenida exitosamente.',
                'data' => new PoliticaDResource($politicaD)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la política detalle.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar una política detalle
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'secuencia' => 'required|integer',
            'resumen' => 'required|string|max:255',
            'enviar_correo' => 'required|boolean',
            'requiere_cargo' => 'required|boolean',
            'id_politica' => 'required|exists:politicas,id_politica',
            'id_documento' => 'nullable|exists:documentos,id_documento',
            'id_actividad_denuncia' => 'nullable|exists:actividades_denuncia,id_actividad_denuncia',
        ]);

        try {
            $politicaD = PoliticaD::findOrFail($id);
            $politicaD->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Política detalle actualizada exitosamente.',
                'data' => new PoliticaDResource($politicaD)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar la política detalle.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar una política detalle
    public function destroy($id)
    {
        try {
            $politicaD = PoliticaD::findOrFail($id);
            $politicaD->delete();
            return response()->json([
                'success' => true,
                'message' => 'Política detalle eliminada exitosamente.'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar la política detalle.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
