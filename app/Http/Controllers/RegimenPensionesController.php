<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RegimenPensiones;
use App\Http\Resources\RegimenPensionesResource;
use Illuminate\Http\Response;

class RegimenPensionesController extends Controller
{
    // Listar todos los regímenes de pensiones
    public function index()
    {
        try {
            $regimenes = RegimenPensiones::all();
            return response()->json([
                'success' => true,
                'message' => 'Lista de regímenes de pensiones obtenida exitosamente.',
                'data' => RegimenPensionesResource::collection($regimenes)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de regímenes de pensiones.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear un nuevo régimen de pensiones
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'regimen_pensiones' => 'required|string|max:255',
        ]);

        try {
            $regimen = RegimenPensiones::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Régimen de pensiones creado exitosamente.',
                'data' => new RegimenPensionesResource($regimen)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el régimen de pensiones.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Mostrar un régimen de pensiones específico
    public function show($id)
    {
        try {
            $regimen = RegimenPensiones::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Régimen de pensiones obtenido exitosamente.',
                'data' => new RegimenPensionesResource($regimen)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el régimen de pensiones.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar un régimen de pensiones
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'regimen_pensiones' => 'required|string|max:255',
        ]);

        try {
            $regimen = RegimenPensiones::findOrFail($id);
            $regimen->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Régimen de pensiones actualizado exitosamente.',
                'data' => new RegimenPensionesResource($regimen)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el régimen de pensiones.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar un régimen de pensiones
    public function destroy($id)
    {
        try {
            $regimen = RegimenPensiones::findOrFail($id);
            $regimen->delete();
            return response()->json([
                'success' => true,
                'message' => 'Régimen de pensiones eliminado exitosamente.'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el régimen de pensiones.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
