<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Gestion;
use App\Http\Resources\GestionResource;
use Illuminate\Http\Response;

class GestionController extends Controller
{
    // Listar todas las gestiones
    public function index()
    {
        try {
            $gestiones = Gestion::with('periodo', 'documento', 'trabajador', 'empleador', 'claseDocumento')->get();
            return response()->json([
                'success' => true,
                'message' => 'Lista de gestiones obtenida exitosamente.',
                'data' => GestionResource::collection($gestiones),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de gestiones.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Obtener una gestión por su ID
    public function show($id)
    {
        try {
            $gestion = Gestion::with('periodo', 'documento', 'trabajador', 'empleador', 'claseDocumento')->findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Gestión obtenida exitosamente.',
                'data' => new GestionResource($gestion),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la gestión.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear una nueva gestión
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'gestion' => 'required|string|max:255',
            'fecha' => 'required|date',
            'id_periodo' => 'required|exists:periodos,id_periodo',
            'id_documento' => 'required|exists:documentos,id_documento',
            'id_trabajador' => 'required|exists:trabajadores,id_trabajador',
            'id_empleador' => 'required|exists:empleadores,id_empleador',
            'id_clase_documento' => 'required|exists:clase_documentos,id_clase_documento',
        ]);

        try {
            $gestion = Gestion::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Gestión creada exitosamente.',
                'data' => new GestionResource($gestion),
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear la gestión.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar una gestión existente
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'gestion' => 'sometimes|string|max:255',
            'fecha' => 'sometimes|date',
            'id_periodo' => 'sometimes|exists:periodos,id_periodo',
            'id_documento' => 'sometimes|exists:documentos,id_documento',
            'id_trabajador' => 'sometimes|exists:trabajadores,id_trabajador',
            'id_empleador' => 'sometimes|exists:empleadores,id_empleador',
            'id_clase_documento' => 'sometimes|exists:clase_documentos,id_clase_documento',
        ]);

        try {
            $gestion = Gestion::findOrFail($id);
            $gestion->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Gestión actualizada exitosamente.',
                'data' => new GestionResource($gestion),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar la gestión.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar una gestión
    public function destroy($id)
    {
        try {
            $gestion = Gestion::findOrFail($id);
            $gestion->delete();
            return response()->json([
                'success' => true,
                'message' => 'Gestión eliminada exitosamente.',
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar la gestión.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
