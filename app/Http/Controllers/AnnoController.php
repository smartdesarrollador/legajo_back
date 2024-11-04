<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Anno;
use App\Http\Resources\AnnoResource;
use Illuminate\Http\Response;

class AnnoController extends Controller
{
    // Obtener todos los años
    public function index()
    {
        $annos = Anno::all();
        return response()->json([
            'success' => true,
            'data' => AnnoResource::collection($annos),
        ], Response::HTTP_OK);
    }

    // Obtener un año específico
    public function show($id)
    {
        $anno = Anno::find($id);

        if (!$anno) {
            return response()->json([
                'success' => false,
                'message' => 'Año no encontrado.',
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'success' => true,
            'data' => new AnnoResource($anno),
        ], Response::HTTP_OK);
    }

    // Crear un nuevo año
    public function store(Request $request)
    {
        $request->validate([
            'anno' => 'required|string|max:255',
        ]);

        $anno = Anno::create([
            'anno' => $request->anno,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Año creado exitosamente.',
            'data' => new AnnoResource($anno),
        ], Response::HTTP_CREATED);
    }

    // Actualizar un año
    public function update(Request $request, $id)
    {
        $anno = Anno::find($id);

        if (!$anno) {
            return response()->json([
                'success' => false,
                'message' => 'Año no encontrado.',
            ], Response::HTTP_NOT_FOUND);
        }

        $request->validate([
            'anno' => 'required|string|max:255',
        ]);

        $anno->update([
            'anno' => $request->anno,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Año actualizado exitosamente.',
            'data' => new AnnoResource($anno),
        ], Response::HTTP_OK);
    }

    // Eliminar un año
    public function destroy($id)
    {
        $anno = Anno::find($id);

        if (!$anno) {
            return response()->json([
                'success' => false,
                'message' => 'Año no encontrado.',
            ], Response::HTTP_NOT_FOUND);
        }

        $anno->delete();

        return response()->json([
            'success' => true,
            'message' => 'Año eliminado exitosamente.',
        ], Response::HTTP_OK);
    }
}
