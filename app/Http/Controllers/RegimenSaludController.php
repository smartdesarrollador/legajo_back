<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RegimenSalud;
use App\Http\Resources\RegimenSaludResource;
use Illuminate\Http\Response;

class RegimenSaludController extends Controller
{
   // Listar todos los regímenes de salud
    public function index()
    {
        try {
            $regimenes = RegimenSalud::all();
            return response()->json([
                'success' => true,
                'message' => 'Lista de regímenes de salud obtenida exitosamente.',
                'data' => RegimenSaludResource::collection($regimenes)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de regímenes de salud.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear un nuevo régimen de salud
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'regimen_salud' => 'required|string|max:255',
        ]);

        try {
            $regimen = RegimenSalud::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Régimen de salud creado exitosamente.',
                'data' => new RegimenSaludResource($regimen)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el régimen de salud.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Mostrar un régimen de salud específico
    public function show($id)
    {
        try {
            $regimen = RegimenSalud::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Régimen de salud obtenido exitosamente.',
                'data' => new RegimenSaludResource($regimen)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el régimen de salud.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar un régimen de salud
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'regimen_salud' => 'required|string|max:255',
        ]);

        try {
            $regimen = RegimenSalud::findOrFail($id);
            $regimen->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Régimen de salud actualizado exitosamente.',
                'data' => new RegimenSaludResource($regimen)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el régimen de salud.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar un régimen de salud
    public function destroy($id)
    {
        try {
            $regimen = RegimenSalud::findOrFail($id);
            $regimen->delete();
            return response()->json([
                'success' => true,
                'message' => 'Régimen de salud eliminado exitosamente.'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el régimen de salud.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
