<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\TipoMovimiento;
use App\Http\Resources\TipoMovimientoResource;
use Illuminate\Http\Response;

class TipoMovimientoController extends Controller
{
    // Listar todos los tipos de movimiento
    public function index()
    {
        try {
            $tiposMovimiento = TipoMovimiento::all();
            return response()->json([
                'success' => true,
                'message' => 'Lista de tipos de movimiento obtenida exitosamente.',
                'data' => TipoMovimientoResource::collection($tiposMovimiento)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de tipos de movimiento.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear un nuevo tipo de movimiento
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tipo_movimiento' => 'required|string|max:255',
        ]);

        try {
            $tipoMovimiento = TipoMovimiento::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Tipo de movimiento creado exitosamente.',
                'data' => new TipoMovimientoResource($tipoMovimiento)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el tipo de movimiento.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Mostrar un tipo de movimiento específico
    public function show($id)
    {
        try {
            $tipoMovimiento = TipoMovimiento::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Tipo de movimiento obtenido exitosamente.',
                'data' => new TipoMovimientoResource($tipoMovimiento)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el tipo de movimiento.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar un tipo de movimiento
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tipo_movimiento' => 'required|string|max:255',
        ]);

        try {
            $tipoMovimiento = TipoMovimiento::findOrFail($id);
            $tipoMovimiento->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Tipo de movimiento actualizado exitosamente.',
                'data' => new TipoMovimientoResource($tipoMovimiento)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el tipo de movimiento.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar un tipo de movimiento
    public function destroy($id)
    {
        try {
            $tipoMovimiento = TipoMovimiento::findOrFail($id);
            $tipoMovimiento->delete();
            return response()->json([
                'success' => true,
                'message' => 'Tipo de movimiento eliminado exitosamente.'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el tipo de movimiento.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
