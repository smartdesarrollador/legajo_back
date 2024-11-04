<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\EstadoContrato;
use App\Http\Resources\EstadoContratoResource;
use Illuminate\Http\Response;

class EstadoContratoController extends Controller
{
    // Listar todos los estados de contrato
    public function index()
    {
        try {
            $estados = EstadoContrato::all();
            return response()->json([
                'success' => true,
                'message' => 'Lista de estados de contrato obtenida exitosamente.',
                'data' => EstadoContratoResource::collection($estados),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de estados de contrato.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Obtener un estado de contrato por su ID
    public function show($id)
    {
        try {
            $estado = EstadoContrato::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Estado de contrato obtenido exitosamente.',
                'data' => new EstadoContratoResource($estado),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el estado de contrato.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear un nuevo estado de contrato
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'estado_contrato' => 'required|string|max:255',
        ]);

        try {
            $estado = EstadoContrato::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Estado de contrato creado exitosamente.',
                'data' => new EstadoContratoResource($estado),
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el estado de contrato.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar un estado de contrato existente
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'estado_contrato' => 'sometimes|string|max:255',
        ]);

        try {
            $estado = EstadoContrato::findOrFail($id);
            $estado->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Estado de contrato actualizado exitosamente.',
                'data' => new EstadoContratoResource($estado),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el estado de contrato.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar un estado de contrato
    public function destroy($id)
    {
        try {
            $estado = EstadoContrato::findOrFail($id);
            $estado->delete();
            return response()->json([
                'success' => true,
                'message' => 'Estado de contrato eliminado exitosamente.',
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el estado de contrato.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
