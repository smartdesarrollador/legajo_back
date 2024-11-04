<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Evento;
use App\Http\Resources\EventoResource;
use Illuminate\Http\Response;

class EventoController extends Controller
{
    // Listar todos los eventos
    public function index()
    {
        try {
            $eventos = Evento::all();
            return response()->json([
                'success' => true,
                'message' => 'Lista de eventos obtenida exitosamente.',
                'data' => EventoResource::collection($eventos),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de eventos.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Obtener un evento por su ID
    public function show($id)
    {
        try {
            $evento = Evento::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Evento obtenido exitosamente.',
                'data' => new EventoResource($evento),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el evento.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear un nuevo evento
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'evento' => 'required|string|max:255',
        ]);

        try {
            $evento = Evento::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Evento creado exitosamente.',
                'data' => new EventoResource($evento),
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el evento.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar un evento existente
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'evento' => 'sometimes|string|max:255',
        ]);

        try {
            $evento = Evento::findOrFail($id);
            $evento->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Evento actualizado exitosamente.',
                'data' => new EventoResource($evento),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el evento.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar un evento
    public function destroy($id)
    {
        try {
            $evento = Evento::findOrFail($id);
            $evento->delete();
            return response()->json([
                'success' => true,
                'message' => 'Evento eliminado exitosamente.',
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el evento.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
