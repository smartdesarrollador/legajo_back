<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ubigeo;
use App\Http\Resources\UbigeoResource;
use Illuminate\Http\Response;

class UbigeoController extends Controller
{
    // Listar todos los ubigeos
    public function index()
    {
        try {
            $ubigeos = Ubigeo::all();
            return response()->json([
                'success' => true,
                'message' => 'Lista de ubigeos obtenida exitosamente.',
                'data' => UbigeoResource::collection($ubigeos)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de ubigeos.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear un nuevo ubigeo
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ubigeo' => 'required|string|max:6',
            'departamento' => 'required|string|max:100',
            'provincia' => 'required|string|max:100',
            'distrito' => 'required|string|max:100',
        ]);

        try {
            $ubigeo = Ubigeo::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Ubigeo creado exitosamente.',
                'data' => new UbigeoResource($ubigeo)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el ubigeo.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Mostrar un ubigeo específico
    public function show($id)
    {
        try {
            $ubigeo = Ubigeo::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Ubigeo obtenido exitosamente.',
                'data' => new UbigeoResource($ubigeo)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el ubigeo.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar un ubigeo
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'ubigeo' => 'required|string|max:6',
            'departamento' => 'required|string|max:100',
            'provincia' => 'required|string|max:100',
            'distrito' => 'required|string|max:100',
        ]);

        try {
            $ubigeo = Ubigeo::findOrFail($id);
            $ubigeo->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Ubigeo actualizado exitosamente.',
                'data' => new UbigeoResource($ubigeo)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el ubigeo.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar un ubigeo
    public function destroy($id)
    {
        try {
            $ubigeo = Ubigeo::findOrFail($id);
            $ubigeo->delete();
            return response()->json([
                'success' => true,
                'message' => 'Ubigeo eliminado exitosamente.'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el ubigeo.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
