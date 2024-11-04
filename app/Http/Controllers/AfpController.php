<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Afp;
use App\Http\Resources\AfpResource;
use Illuminate\Http\Response;

class AfpController extends Controller
{
    // Obtener todas las AFPs
    public function index()
    {
        $afps = Afp::all();
        return response()->json([
            'success' => true,
            'data' => AfpResource::collection($afps),
        ], Response::HTTP_OK);
    }

    // Obtener una AFP específica
    public function show($id)
    {
        $afp = Afp::find($id);

        if (!$afp) {
            return response()->json([
                'success' => false,
                'message' => 'AFP no encontrada.',
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'success' => true,
            'data' => new AfpResource($afp),
        ], Response::HTTP_OK);
    }

    // Crear una nueva AFP
    public function store(Request $request)
    {
        $request->validate([
            'afp' => 'required|string|max:255',
        ]);

        $afp = Afp::create([
            'afp' => $request->afp,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'AFP creada exitosamente.',
            'data' => new AfpResource($afp),
        ], Response::HTTP_CREATED);
    }

    // Actualizar una AFP
    public function update(Request $request, $id)
    {
        $afp = Afp::find($id);

        if (!$afp) {
            return response()->json([
                'success' => false,
                'message' => 'AFP no encontrada.',
            ], Response::HTTP_NOT_FOUND);
        }

        $request->validate([
            'afp' => 'required|string|max:255',
        ]);

        $afp->update([
            'afp' => $request->afp,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'AFP actualizada exitosamente.',
            'data' => new AfpResource($afp),
        ], Response::HTTP_OK);
    }

    // Eliminar una AFP
    public function destroy($id)
    {
        $afp = Afp::find($id);

        if (!$afp) {
            return response()->json([
                'success' => false,
                'message' => 'AFP no encontrada.',
            ], Response::HTTP_NOT_FOUND);
        }

        $afp->delete();

        return response()->json([
            'success' => true,
            'message' => 'AFP eliminada exitosamente.',
        ], Response::HTTP_OK);
    }
}
