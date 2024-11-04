<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MotivoBaja;
use App\Http\Resources\MotivoBajaResource;
use Illuminate\Http\Response;

class MotivoBajaController extends Controller
{
    // Listar todos los motivos de baja
    public function index()
    {
        try {
            $motivosBaja = MotivoBaja::all();
            return response()->json([
                'success' => true,
                'message' => 'Lista de motivos de baja obtenida exitosamente.',
                'data' => MotivoBajaResource::collection($motivosBaja)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de motivos de baja.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear un nuevo motivo de baja
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'motivo_baja' => 'required|string|max:255',
        ]);

        try {
            $motivoBaja = MotivoBaja::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Motivo de baja creado exitosamente.',
                'data' => new MotivoBajaResource($motivoBaja)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el motivo de baja.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Mostrar un motivo de baja específico
    public function show($id)
    {
        try {
            $motivoBaja = MotivoBaja::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Motivo de baja obtenido exitosamente.',
                'data' => new MotivoBajaResource($motivoBaja)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el motivo de baja.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar un motivo de baja
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'motivo_baja' => 'required|string|max:255',
        ]);

        try {
            $motivoBaja = MotivoBaja::findOrFail($id);
            $motivoBaja->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Motivo de baja actualizado exitosamente.',
                'data' => new MotivoBajaResource($motivoBaja)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el motivo de baja.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar un motivo de baja
    public function destroy($id)
    {
        try {
            $motivoBaja = MotivoBaja::findOrFail($id);
            $motivoBaja->delete();
            return response()->json([
                'success' => true,
                'message' => 'Motivo de baja eliminado exitosamente.'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el motivo de baja.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
