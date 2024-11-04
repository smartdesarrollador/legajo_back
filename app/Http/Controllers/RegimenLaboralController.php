<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RegimenLaboral;
use App\Http\Resources\RegimenLaboralResource;
use Illuminate\Http\Response;

class RegimenLaboralController extends Controller
{
    // Listar todos los regímenes laborales
    public function index()
    {
        try {
            $regimenes = RegimenLaboral::all();
            return response()->json([
                'success' => true,
                'message' => 'Lista de regímenes laborales obtenida exitosamente.',
                'data' => RegimenLaboralResource::collection($regimenes)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de regímenes laborales.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear un nuevo régimen laboral
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'regimen_laboral' => 'required|string|max:255',
        ]);

        try {
            $regimen = RegimenLaboral::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Régimen laboral creado exitosamente.',
                'data' => new RegimenLaboralResource($regimen)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el régimen laboral.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Mostrar un régimen laboral específico
    public function show($id)
    {
        try {
            $regimen = RegimenLaboral::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Régimen laboral obtenido exitosamente.',
                'data' => new RegimenLaboralResource($regimen)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el régimen laboral.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar un régimen laboral
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'regimen_laboral' => 'required|string|max:255',
        ]);

        try {
            $regimen = RegimenLaboral::findOrFail($id);
            $regimen->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Régimen laboral actualizado exitosamente.',
                'data' => new RegimenLaboralResource($regimen)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el régimen laboral.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar un régimen laboral
    public function destroy($id)
    {
        try {
            $regimen = RegimenLaboral::findOrFail($id);
            $regimen->delete();
            return response()->json([
                'success' => true,
                'message' => 'Régimen laboral eliminado exitosamente.'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el régimen laboral.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
