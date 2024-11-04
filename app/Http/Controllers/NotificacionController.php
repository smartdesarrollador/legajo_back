<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Notificacion;
use App\Http\Resources\NotificacionResource;
use Illuminate\Http\Response;

class NotificacionController extends Controller
{
    // Listar todas las notificaciones
    public function index()
    {
        try {
            $notificaciones = Notificacion::all();
            return response()->json([
                'success' => true,
                'message' => 'Lista de notificaciones obtenida exitosamente.',
                'data' => NotificacionResource::collection($notificaciones)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de notificaciones.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear una nueva notificación
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'notificacion' => 'required|string|max:255',
        ]);

        try {
            $notificacion = Notificacion::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Notificación creada exitosamente.',
                'data' => new NotificacionResource($notificacion)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear la notificación.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Mostrar una notificación específica
    public function show($id)
    {
        try {
            $notificacion = Notificacion::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Notificación obtenida exitosamente.',
                'data' => new NotificacionResource($notificacion)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la notificación.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar una notificación
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'notificacion' => 'required|string|max:255',
        ]);

        try {
            $notificacion = Notificacion::findOrFail($id);
            $notificacion->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Notificación actualizada exitosamente.',
                'data' => new NotificacionResource($notificacion)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar la notificación.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar una notificación
    public function destroy($id)
    {
        try {
            $notificacion = Notificacion::findOrFail($id);
            $notificacion->delete();
            return response()->json([
                'success' => true,
                'message' => 'Notificación eliminada exitosamente.'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar la notificación.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
