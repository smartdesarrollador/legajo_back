<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TipoContacto;
use App\Http\Resources\TipoContactoResource;
use Illuminate\Http\Response;

class TipoContactoController extends Controller
{
    // Listar todos los tipos de contacto
    public function index()
    {
        try {
            $tiposContacto = TipoContacto::all();
            return response()->json([
                'success' => true,
                'message' => 'Lista de tipos de contacto obtenida exitosamente.',
                'data' => TipoContactoResource::collection($tiposContacto)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de tipos de contacto.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear un nuevo tipo de contacto
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tipo_contacto' => 'required|string|max:255',
        ]);

        try {
            $tipoContacto = TipoContacto::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Tipo de contacto creado exitosamente.',
                'data' => new TipoContactoResource($tipoContacto)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el tipo de contacto.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Mostrar un tipo de contacto específico
    public function show($id)
    {
        try {
            $tipoContacto = TipoContacto::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Tipo de contacto obtenido exitosamente.',
                'data' => new TipoContactoResource($tipoContacto)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el tipo de contacto.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar un tipo de contacto
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tipo_contacto' => 'required|string|max:255',
        ]);

        try {
            $tipoContacto = TipoContacto::findOrFail($id);
            $tipoContacto->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Tipo de contacto actualizado exitosamente.',
                'data' => new TipoContactoResource($tipoContacto)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el tipo de contacto.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar un tipo de contacto
    public function destroy($id)
    {
        try {
            $tipoContacto = TipoContacto::findOrFail($id);
            $tipoContacto->delete();
            return response()->json([
                'success' => true,
                'message' => 'Tipo de contacto eliminado exitosamente.'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el tipo de contacto.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
