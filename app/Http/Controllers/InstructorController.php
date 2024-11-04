<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Instructor;
use App\Http\Resources\InstructorResource;
use Illuminate\Http\Response;

class InstructorController extends Controller
{
    // Listar todos los instructores
    public function index()
    {
        try {
            $instructores = Instructor::all();
            return response()->json([
                'success' => true,
                'message' => 'Lista de instructores obtenida exitosamente.',
                'data' => InstructorResource::collection($instructores)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de instructores.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear un nuevo instructor
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'instructor' => 'required|string|max:255',
        ]);

        try {
            $instructor = Instructor::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Instructor creado exitosamente.',
                'data' => new InstructorResource($instructor)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el instructor.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Mostrar un instructor específico
    public function show($id)
    {
        try {
            $instructor = Instructor::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Instructor obtenido exitosamente.',
                'data' => new InstructorResource($instructor)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el instructor.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar un instructor
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'instructor' => 'required|string|max:255',
        ]);

        try {
            $instructor = Instructor::findOrFail($id);
            $instructor->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Instructor actualizado exitosamente.',
                'data' => new InstructorResource($instructor)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el instructor.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar un instructor
    public function destroy($id)
    {
        try {
            $instructor = Instructor::findOrFail($id);
            $instructor->delete();
            return response()->json([
                'success' => true,
                'message' => 'Instructor eliminado exitosamente.'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el instructor.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
