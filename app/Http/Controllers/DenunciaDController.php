<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DenunciaD;
use App\Http\Resources\DenunciaDResource;
use Illuminate\Http\Response;

class DenunciaDController extends Controller
{
    // Obtener la lista completa de DenunciasD
    public function index()
    {
        try {
            $denunciasD = DenunciaD::with(['denuncia', 'actividadDenuncia', 'documento'])->get();
            return response()->json([
                'success' => true,
                'message' => 'Lista de denuncias detalle obtenida exitosamente.',
                'data' => DenunciaDResource::collection($denunciasD)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de denuncias detalle.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear una nueva DenunciaD
    public function store(Request $request)
    {
        try {
            $denunciaD = DenunciaD::create($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Denuncia detalle creada exitosamente.',
                'data' => new DenunciaDResource($denunciaD)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear la denuncia detalle.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Mostrar una DenunciaD específica
    public function show($id)
    {
        try {
            $denunciaD = DenunciaD::with(['denuncia', 'actividadDenuncia', 'documento'])->findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Denuncia detalle obtenida exitosamente.',
                'data' => new DenunciaDResource($denunciaD)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la denuncia detalle.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar una DenunciaD
    public function update(Request $request, $id)
    {
        try {
            $denunciaD = DenunciaD::findOrFail($id);
            $denunciaD->update($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Denuncia detalle actualizada exitosamente.',
                'data' => new DenunciaDResource($denunciaD)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar la denuncia detalle.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar una DenunciaD
    public function destroy($id)
    {
        try {
            $denunciaD = DenunciaD::findOrFail($id);
            $denunciaD->delete();
            return response()->json([
                'success' => true,
                'message' => 'Denuncia detalle eliminada exitosamente.',
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar la denuncia detalle.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
