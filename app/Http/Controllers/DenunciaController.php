<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Denuncia;
use App\Http\Resources\DenunciaResource;
use Illuminate\Http\Response;

class DenunciaController extends Controller
{
    // Obtener la lista completa de denuncias
    public function index()
    {
        try {
            $denuncias = Denuncia::with(['tipoDenuncia', 'empleador', 'trabajador', 'estadoDenuncia'])->get();
            return response()->json([
                'success' => true,
                'message' => 'Lista de denuncias obtenida exitosamente.',
                'data' => DenunciaResource::collection($denuncias)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de denuncias.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear una nueva denuncia
    public function store(Request $request)
    {
        try {
            $denuncia = Denuncia::create($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Denuncia creada exitosamente.',
                'data' => new DenunciaResource($denuncia)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear la denuncia.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Mostrar una denuncia específica
    public function show($id)
    {
        try {
            $denuncia = Denuncia::with(['tipoDenuncia', 'empleador', 'trabajador', 'estadoDenuncia'])->findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Denuncia obtenida exitosamente.',
                'data' => new DenunciaResource($denuncia)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la denuncia.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar una denuncia
    public function update(Request $request, $id)
    {
        try {
            $denuncia = Denuncia::findOrFail($id);
            $denuncia->update($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Denuncia actualizada exitosamente.',
                'data' => new DenunciaResource($denuncia)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar la denuncia.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar una denuncia
    public function destroy($id)
    {
        try {
            $denuncia = Denuncia::findOrFail($id);
            $denuncia->delete();
            return response()->json([
                'success' => true,
                'message' => 'Denuncia eliminada exitosamente.',
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar la denuncia.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
