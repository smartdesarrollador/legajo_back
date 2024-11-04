<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Delivery;
use App\Http\Resources\DeliveryResource;
use Illuminate\Http\Response;

class DeliveryController extends Controller
{
    // Listar todos los registros de delivery
    public function index()
    {
        try {
            $deliveries = Delivery::with(['empleador', 'trabajador', 'documento', 'notificacion'])->get();
            return response()->json([
                'success' => true,
                'message' => 'Lista de deliveries obtenida exitosamente.',
                'data' => DeliveryResource::collection($deliveries)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de deliveries.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Obtener un registro de delivery específico
    public function show($id)
    {
        try {
            $delivery = Delivery::with(['empleador', 'trabajador', 'documento', 'notificacion'])->findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Registro de delivery obtenido exitosamente.',
                'data' => new DeliveryResource($delivery)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el registro de delivery.',
                'error' => $e->getMessage()
            ], Response::HTTP_NOT_FOUND);
        }
    }

    // Crear un nuevo registro de delivery
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fecha_confirmacion' => 'required|date',
            'confirmacion' => 'required|boolean',
            'id_empleador' => 'required|exists:empleadores,id_empleador',
            'id_trabajador' => 'required|exists:trabajadores,id_trabajador',
            'id_documento' => 'required|exists:documentos,id_documento',
            'id_notificacion' => 'required|exists:notificaciones,id_notificacion',
        ]);

        try {
            $delivery = Delivery::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Registro de delivery creado exitosamente.',
                'data' => new DeliveryResource($delivery)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el registro de delivery.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar un registro de delivery existente
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'fecha_confirmacion' => 'required|date',
            'confirmacion' => 'required|boolean',
            'id_empleador' => 'required|exists:empleadores,id_empleador',
            'id_trabajador' => 'required|exists:trabajadores,id_trabajador',
            'id_documento' => 'required|exists:documentos,id_documento',
            'id_notificacion' => 'required|exists:notificaciones,id_notificacion',
        ]);

        try {
            $delivery = Delivery::findOrFail($id);
            $delivery->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Registro de delivery actualizado exitosamente.',
                'data' => new DeliveryResource($delivery)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el registro de delivery.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar un registro de delivery
    public function destroy($id)
    {
        try {
            $delivery = Delivery::findOrFail($id);
            $delivery->delete();
            return response()->json([
                'success' => true,
                'message' => 'Registro de delivery eliminado exitosamente.'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el registro de delivery.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
