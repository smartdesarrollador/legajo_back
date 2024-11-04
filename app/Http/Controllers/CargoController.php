<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cargo;
use App\Http\Resources\CargoResource;
use Illuminate\Http\Response;

class CargoController extends Controller
{
   // Listar todos los cargos
    public function index()
    {
        try {
            $cargos = Cargo::all();
            return response()->json([
                'success' => true,
                'message' => 'Lista de cargos obtenida exitosamente.',
                'data' => CargoResource::collection($cargos)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de cargos.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Obtener un cargo por ID
    public function show($id)
    {
        try {
            $cargo = Cargo::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Cargo obtenido exitosamente.',
                'data' => new CargoResource($cargo)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el cargo.',
                'error' => $e->getMessage()
            ], Response::HTTP_NOT_FOUND);
        }
    }

    // Crear un nuevo cargo
    public function store(Request $request)
    {
        $request->validate([
            'cargo' => 'required|string|max:255',
        ]);

        try {
            $cargo = Cargo::create([
                'cargo' => $request->cargo,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Cargo creado exitosamente.',
                'data' => new CargoResource($cargo)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el cargo.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar un cargo
    public function update(Request $request, $id)
    {
        $request->validate([
            'cargo' => 'required|string|max:255',
        ]);

        try {
            $cargo = Cargo::findOrFail($id);
            $cargo->update([
                'cargo' => $request->cargo,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Cargo actualizado exitosamente.',
                'data' => new CargoResource($cargo)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el cargo.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar un cargo
    public function destroy($id)
    {
        try {
            $cargo = Cargo::findOrFail($id);
            $cargo->delete();

            return response()->json([
                'success' => true,
                'message' => 'Cargo eliminado exitosamente.',
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el cargo.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
