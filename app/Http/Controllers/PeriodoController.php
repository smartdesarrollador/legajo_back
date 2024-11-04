<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Periodo;
use App\Http\Resources\PeriodoResource;
use Illuminate\Http\Response;

class PeriodoController extends Controller
{
    // Listar todos los periodos
    public function index()
    {
        try {
            $periodos = Periodo::all();
            return response()->json([
                'success' => true,
                'message' => 'Lista de periodos obtenida exitosamente.',
                'data' => PeriodoResource::collection($periodos)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de periodos.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear un nuevo periodo
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'periodo' => 'required|string|max:255',
            'corto' => 'required|string|max:10',
        ]);

        try {
            $periodo = Periodo::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Periodo creado exitosamente.',
                'data' => new PeriodoResource($periodo)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el periodo.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Mostrar un periodo específico
    public function show($id)
    {
        try {
            $periodo = Periodo::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Periodo obtenido exitosamente.',
                'data' => new PeriodoResource($periodo)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el periodo.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar un periodo
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'periodo' => 'required|string|max:255',
            'corto' => 'required|string|max:10',
        ]);

        try {
            $periodo = Periodo::findOrFail($id);
            $periodo->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Periodo actualizado exitosamente.',
                'data' => new PeriodoResource($periodo)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el periodo.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar un periodo
    public function destroy($id)
    {
        try {
            $periodo = Periodo::findOrFail($id);
            $periodo->delete();
            return response()->json([
                'success' => true,
                'message' => 'Periodo eliminado exitosamente.'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el periodo.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
