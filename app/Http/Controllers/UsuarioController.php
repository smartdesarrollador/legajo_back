<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Usuario;
use App\Http\Resources\UsuarioResource;
use Illuminate\Http\Response;

class UsuarioController extends Controller
{
    // Listar todos los usuarios
    public function index()
    {
        try {
            $usuarios = Usuario::all();
            return response()->json([
                'success' => true,
                'message' => 'Lista de usuarios obtenida exitosamente.',
                'data' => UsuarioResource::collection($usuarios)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de usuarios.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear un nuevo usuario
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'usuario' => 'required|string|max:255',
        ]);

        try {
            $usuario = Usuario::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Usuario creado exitosamente.',
                'data' => new UsuarioResource($usuario)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el usuario.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Mostrar un usuario específico
    public function show($id)
    {
        try {
            $usuario = Usuario::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Usuario obtenido exitosamente.',
                'data' => new UsuarioResource($usuario)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el usuario.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar un usuario
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'usuario' => 'required|string|max:255',
        ]);

        try {
            $usuario = Usuario::findOrFail($id);
            $usuario->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Usuario actualizado exitosamente.',
                'data' => new UsuarioResource($usuario)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el usuario.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar un usuario
    public function destroy($id)
    {
        try {
            $usuario = Usuario::findOrFail($id);
            $usuario->delete();
            return response()->json([
                'success' => true,
                'message' => 'Usuario eliminado exitosamente.'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el usuario.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
