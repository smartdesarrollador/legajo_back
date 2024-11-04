<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Sector;
use App\Http\Resources\SectorResource;
use Illuminate\Http\Response;

class SectorController extends Controller
{
    // Listar todos los sectores
    public function index()
    {
        try {
            $sectores = Sector::all();
            return response()->json([
                'success' => true,
                'message' => 'Lista de sectores obtenida exitosamente.',
                'data' => SectorResource::collection($sectores)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de sectores.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear un nuevo sector
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'sector' => 'required|string|max:255',
        ]);

        try {
            $sector = Sector::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Sector creado exitosamente.',
                'data' => new SectorResource($sector)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el sector.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Mostrar un sector específico
    public function show($id)
    {
        try {
            $sector = Sector::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Sector obtenido exitosamente.',
                'data' => new SectorResource($sector)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el sector.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar un sector
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'sector' => 'required|string|max:255',
        ]);

        try {
            $sector = Sector::findOrFail($id);
            $sector->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Sector actualizado exitosamente.',
                'data' => new SectorResource($sector)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el sector.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar un sector
    public function destroy($id)
    {
        try {
            $sector = Sector::findOrFail($id);
            $sector->delete();
            return response()->json([
                'success' => true,
                'message' => 'Sector eliminado exitosamente.'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el sector.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
