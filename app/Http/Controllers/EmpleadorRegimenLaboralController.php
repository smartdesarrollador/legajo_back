<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\EmpleadorRegimenLaboral;
use App\Http\Resources\EmpleadorRegimenLaboralResource;
use Illuminate\Http\Response;

class EmpleadorRegimenLaboralController extends Controller
{
    // Listar todos los empleador-regimen-laboral
    public function index()
    {
        try {
            $regimenes = EmpleadorRegimenLaboral::with(['empleador', 'regimenLaboral'])->get();
            return response()->json([
                'success' => true,
                'message' => 'Lista de empleador régimen laboral obtenida exitosamente.',
                'data' => EmpleadorRegimenLaboralResource::collection($regimenes),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de empleador régimen laboral.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Obtener un registro por su ID
    public function show($id)
    {
        try {
            $regimen = EmpleadorRegimenLaboral::with(['empleador', 'regimenLaboral'])->findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Empleador Régimen Laboral obtenido exitosamente.',
                'data' => new EmpleadorRegimenLaboralResource($regimen),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el empleador régimen laboral.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear un nuevo empleador régimen laboral
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'empleador_regimen_laboral' => 'required|string|max:255',
            'id_empleador' => 'required|exists:empleadores,id_empleador', // Validación de empleador
            'id_regimen_laboral' => 'required|exists:regimenes_laborales,id_regimen_laboral', // Validación de régimen laboral
        ]);

        try {
            $regimen = EmpleadorRegimenLaboral::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Empleador Régimen Laboral creado exitosamente.',
                'data' => new EmpleadorRegimenLaboralResource($regimen),
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el empleador régimen laboral.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar un empleador régimen laboral existente
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'empleador_regimen_laboral' => 'sometimes|string|max:255',
            'id_empleador' => 'sometimes|exists:empleadores,id_empleador', // Validación de empleador
            'id_regimen_laboral' => 'sometimes|exists:regimenes_laborales,id_regimen_laboral', // Validación de régimen laboral
        ]);

        try {
            $regimen = EmpleadorRegimenLaboral::findOrFail($id);
            $regimen->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Empleador Régimen Laboral actualizado exitosamente.',
                'data' => new EmpleadorRegimenLaboralResource($regimen),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el empleador régimen laboral.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar un empleador régimen laboral
    public function destroy($id)
    {
        try {
            $regimen = EmpleadorRegimenLaboral::findOrFail($id);
            $regimen->delete();
            return response()->json([
                'success' => true,
                'message' => 'Empleador Régimen Laboral eliminado exitosamente.',
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el empleador régimen laboral.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
