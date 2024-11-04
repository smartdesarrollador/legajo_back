<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\EstadoDenuncia;
use App\Http\Resources\EstadoDenunciaResource;
use Illuminate\Http\Response;

class EstadoDenunciaController extends Controller
{
    // Listar todos los estados de denuncia
    public function index()
    {
        try {
            $estados = EstadoDenuncia::all();
            return response()->json([
                'success' => true,
                'message' => 'Lista de estados de denuncia obtenida exitosamente.',
                'data' => EstadoDenunciaResource::collection($estados),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de estados de denuncia.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Obtener un estado de denuncia por su ID
    public function show($id)
    {
        try {
            $estado = EstadoDenuncia::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Estado de denuncia obtenido exitosamente.',
                'data' => new EstadoDenunciaResource($estado),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el estado de denuncia.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear un nuevo estado de denuncia
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'estado_denuncia' => 'required|string|max:255',
        ]);

        try {
            $estado = EstadoDenuncia::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Estado de denuncia creado exitosamente.',
                'data' => new EstadoDenunciaResource($estado),
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el estado de denuncia.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar un estado de denuncia existente
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'estado_denuncia' => 'sometimes|string|max:255',
        ]);

        try {
            $estado = EstadoDenuncia::findOrFail($id);
            $estado->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Estado de denuncia actualizado exitosamente.',
                'data' => new EstadoDenunciaResource($estado),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el estado de denuncia.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar un estado de denuncia
    public function destroy($id)
    {
        try {
            $estado = EstadoDenuncia::findOrFail($id);
            $estado->delete();
            return response()->json([
                'success' => true,
                'message' => 'Estado de denuncia eliminado exitosamente.',
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el estado de denuncia.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
