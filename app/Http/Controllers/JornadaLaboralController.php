<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\JornadaLaboral;
use App\Http\Resources\JornadaLaboralResource;
use Illuminate\Http\Response;


class JornadaLaboralController extends Controller
{
    // Listar todas las jornadas laborales
    public function index()
    {
        try {
            $jornadasLaborales = JornadaLaboral::all();
            return response()->json([
                'success' => true,
                'message' => 'Lista de jornadas laborales obtenida exitosamente.',
                'data' => JornadaLaboralResource::collection($jornadasLaborales)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de jornadas laborales.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear una nueva jornada laboral
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jornada_laboral' => 'required|string|max:255',
        ]);

        try {
            $jornadaLaboral = JornadaLaboral::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Jornada laboral creada exitosamente.',
                'data' => new JornadaLaboralResource($jornadaLaboral)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear la jornada laboral.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Mostrar una jornada laboral específica
    public function show($id)
    {
        try {
            $jornadaLaboral = JornadaLaboral::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Jornada laboral obtenida exitosamente.',
                'data' => new JornadaLaboralResource($jornadaLaboral)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la jornada laboral.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar una jornada laboral
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'jornada_laboral' => 'required|string|max:255',
        ]);

        try {
            $jornadaLaboral = JornadaLaboral::findOrFail($id);
            $jornadaLaboral->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Jornada laboral actualizada exitosamente.',
                'data' => new JornadaLaboralResource($jornadaLaboral)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar la jornada laboral.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar una jornada laboral
    public function destroy($id)
    {
        try {
            $jornadaLaboral = JornadaLaboral::findOrFail($id);
            $jornadaLaboral->delete();
            return response()->json([
                'success' => true,
                'message' => 'Jornada laboral eliminada exitosamente.'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar la jornada laboral.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
