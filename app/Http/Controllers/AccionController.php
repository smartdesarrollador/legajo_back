<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Accion;
use App\Http\Resources\AccionResource;
use Illuminate\Http\Response;

class AccionController extends Controller
{
    // Obtener todas las acciones
    public function index()
    {
        $acciones = Accion::all();
        return response()->json([
            'success' => true,
            'data' => AccionResource::collection($acciones),
        ], Response::HTTP_OK);
    }

    // Obtener una acción específica
    public function show($id)
    {
        $accion = Accion::find($id);

        if (!$accion) {
            return response()->json([
                'success' => false,
                'message' => 'Acción no encontrada.',
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'success' => true,
            'data' => new AccionResource($accion),
        ], Response::HTTP_OK);
    }

    // Crear una nueva acción
    public function store(Request $request)
    {
        $request->validate([
            'accion' => 'required|string|max:255',
        ]);

        $accion = Accion::create([
            'accion' => $request->accion,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Acción creada exitosamente.',
            'data' => new AccionResource($accion),
        ], Response::HTTP_CREATED);
    }

    // Actualizar una acción
    public function update(Request $request, $id)
    {
        $accion = Accion::find($id);

        if (!$accion) {
            return response()->json([
                'success' => false,
                'message' => 'Acción no encontrada.',
            ], Response::HTTP_NOT_FOUND);
        }

        $request->validate([
            'accion' => 'required|string|max:255',
        ]);

        $accion->update([
            'accion' => $request->accion,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Acción actualizada exitosamente.',
            'data' => new AccionResource($accion),
        ], Response::HTTP_OK);
    }

    // Eliminar una acción
    public function destroy($id)
    {
        $accion = Accion::find($id);

        if (!$accion) {
            return response()->json([
                'success' => false,
                'message' => 'Acción no encontrada.',
            ], Response::HTTP_NOT_FOUND);
        }

        $accion->delete();

        return response()->json([
            'success' => true,
            'message' => 'Acción eliminada exitosamente.',
        ], Response::HTTP_OK);
    }
}
