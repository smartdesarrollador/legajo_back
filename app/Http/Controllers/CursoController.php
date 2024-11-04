<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Curso;
use App\Http\Resources\CursoResource;
use Illuminate\Http\Response;

class CursoController extends Controller
{
    // Listar todos los cursos
    public function index()
    {
        try {
            $cursos = Curso::all();
            return response()->json([
                'success' => true,
                'message' => 'Lista de cursos obtenida exitosamente.',
                'data' => CursoResource::collection($cursos)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de cursos.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Obtener un curso específico
    public function show($id)
    {
        try {
            $curso = Curso::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Curso obtenido exitosamente.',
                'data' => new CursoResource($curso)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el curso.',
                'error' => $e->getMessage()
            ], Response::HTTP_NOT_FOUND);
        }
    }

    // Crear un nuevo curso
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'curso' => 'required|string|max:255',
        ]);

        try {
            $curso = Curso::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Curso creado exitosamente.',
                'data' => new CursoResource($curso)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el curso.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar un curso existente
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'curso' => 'required|string|max:255',
        ]);

        try {
            $curso = Curso::findOrFail($id);
            $curso->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Curso actualizado exitosamente.',
                'data' => new CursoResource($curso)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el curso.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar un curso
    public function destroy($id)
    {
        try {
            $curso = Curso::findOrFail($id);
            $curso->delete();
            return response()->json([
                'success' => true,
                'message' => 'Curso eliminado exitosamente.'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el curso.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
