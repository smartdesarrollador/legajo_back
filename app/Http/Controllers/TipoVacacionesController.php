<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TipoVacaciones;
use App\Http\Resources\TipoVacacionesResource;
use Illuminate\Http\Response;



class TipoVacacionesController extends Controller
{
    // Listar todos los tipos de vacaciones
    public function index()
    {
        try {
            $tiposVacaciones = TipoVacaciones::all();
            return response()->json([
                'success' => true,
                'message' => 'Lista de tipos de vacaciones obtenida exitosamente.',
                'data' => TipoVacacionesResource::collection($tiposVacaciones)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de tipos de vacaciones.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear un nuevo tipo de vacaciones
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tipo_vacaciones' => 'required|string|max:255',
        ]);

        try {
            $tipoVacaciones = TipoVacaciones::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Tipo de vacaciones creado exitosamente.',
                'data' => new TipoVacacionesResource($tipoVacaciones)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el tipo de vacaciones.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Mostrar un tipo de vacaciones específico
    public function show($id)
    {
        try {
            $tipoVacaciones = TipoVacaciones::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Tipo de vacaciones obtenido exitosamente.',
                'data' => new TipoVacacionesResource($tipoVacaciones)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el tipo de vacaciones.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar un tipo de vacaciones
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tipo_vacaciones' => 'required|string|max:255',
        ]);

        try {
            $tipoVacaciones = TipoVacaciones::findOrFail($id);
            $tipoVacaciones->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Tipo de vacaciones actualizado exitosamente.',
                'data' => new TipoVacacionesResource($tipoVacaciones)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el tipo de vacaciones.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar un tipo de vacaciones
    public function destroy($id)
    {
        try {
            $tipoVacaciones = TipoVacaciones::findOrFail($id);
            $tipoVacaciones->delete();
            return response()->json([
                'success' => true,
                'message' => 'Tipo de vacaciones eliminado exitosamente.'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el tipo de vacaciones.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
