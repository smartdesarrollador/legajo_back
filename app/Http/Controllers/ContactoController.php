<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contacto;
use App\Http\Resources\ContactoResource;
use Illuminate\Http\Response;

class ContactoController extends Controller
{
    // Listar todos los contactos
    public function index()
    {
        try {
            $contactos = Contacto::with('empleador', 'tipoContacto', 'area')->get();
            return response()->json([
                'success' => true,
                'message' => 'Lista de contactos obtenida exitosamente.',
                'data' => ContactoResource::collection($contactos)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de contactos.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Obtener un contacto por ID
    public function show($id)
    {
        try {
            $contacto = Contacto::with('empleador', 'tipoContacto', 'area')->findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Contacto obtenido exitosamente.',
                'data' => new ContactoResource($contacto)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el contacto.',
                'error' => $e->getMessage()
            ], Response::HTTP_NOT_FOUND);
        }
    }

    // Crear un nuevo contacto
    public function store(Request $request)
    {
        $request->validate([
            'contacto' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'celular' => 'nullable|string|max:20',
            'correo' => 'nullable|email',
            'id_empleador' => 'required|exists:empleadores,id_empleador',
            'id_tipo_contacto' => 'required|exists:tipos_contacto,id_tipo_contacto',
            'id_area' => 'required|exists:areas,id_area',
        ]);

        try {
            $contacto = Contacto::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Contacto creado exitosamente.',
                'data' => new ContactoResource($contacto)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el contacto.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar un contacto
    public function update(Request $request, $id)
    {
        $request->validate([
            'contacto' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'celular' => 'nullable|string|max:20',
            'correo' => 'nullable|email',
            'id_empleador' => 'required|exists:empleadores,id_empleador',
            'id_tipo_contacto' => 'required|exists:tipos_contacto,id_tipo_contacto',
            'id_area' => 'required|exists:areas,id_area',
        ]);

        try {
            $contacto = Contacto::findOrFail($id);
            $contacto->update($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Contacto actualizado exitosamente.',
                'data' => new ContactoResource($contacto)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el contacto.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar un contacto
    public function destroy($id)
    {
        try {
            $contacto = Contacto::findOrFail($id);
            $contacto->delete();

            return response()->json([
                'success' => true,
                'message' => 'Contacto eliminado exitosamente.',
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el contacto.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
