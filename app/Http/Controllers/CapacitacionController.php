<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Capacitacion;
use App\Http\Resources\CapacitacionResource;
use Illuminate\Http\Response;

class CapacitacionController extends Controller
{
    // Obtener todas las capacitaciones
    public function index()
    {
        $capacitaciones = Capacitacion::with('empleador', 'trabajador', 'curso', 'estadoEvaluacion', 'documento', 'instructor')->get();
        return response()->json([
            'success' => true,
            'data' => CapacitacionResource::collection($capacitaciones),
        ], Response::HTTP_OK);
    }

    // Obtener una capacitación específica
    public function show($id)
    {
        $capacitacion = Capacitacion::with('empleador', 'trabajador', 'curso', 'estadoEvaluacion', 'documento', 'instructor')->find($id);

        if (!$capacitacion) {
            return response()->json([
                'success' => false,
                'message' => 'Capacitación no encontrada.',
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'success' => true,
            'data' => new CapacitacionResource($capacitacion),
        ], Response::HTTP_OK);
    }

    // Crear una nueva capacitación
    public function store(Request $request)
    {
        $request->validate([
            'capacitacion' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'observacion' => 'nullable|string',
            'id_empleador' => 'required|exists:empleadores,id_empleador',
            'id_trabajador' => 'required|exists:trabajadores,id_trabajador',
            'id_curso' => 'required|exists:cursos,id_curso',
            'id_estado_evaluacion' => 'required|exists:estado_evaluacions,id_estado_evaluacion',
            'id_documento' => 'nullable|exists:documentos,id_documento',
            'id_instructor' => 'required|exists:instructores,id_instructor',
        ]);

        $capacitacion = Capacitacion::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Capacitación creada exitosamente.',
            'data' => new CapacitacionResource($capacitacion),
        ], Response::HTTP_CREATED);
    }

    // Actualizar una capacitación
    public function update(Request $request, $id)
    {
        $capacitacion = Capacitacion::find($id);

        if (!$capacitacion) {
            return response()->json([
                'success' => false,
                'message' => 'Capacitación no encontrada.',
            ], Response::HTTP_NOT_FOUND);
        }

        $request->validate([
            'capacitacion' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'observacion' => 'nullable|string',
            'id_empleador' => 'required|exists:empleadores,id_empleador',
            'id_trabajador' => 'required|exists:trabajadores,id_trabajador',
            'id_curso' => 'required|exists:cursos,id_curso',
            'id_estado_evaluacion' => 'required|exists:estado_evaluacions,id_estado_evaluacion',
            'id_documento' => 'nullable|exists:documentos,id_documento',
            'id_instructor' => 'required|exists:instructores,id_instructor',
        ]);

        $capacitacion->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Capacitación actualizada exitosamente.',
            'data' => new CapacitacionResource($capacitacion),
        ], Response::HTTP_OK);
    }

    // Eliminar una capacitación
    public function destroy($id)
    {
        $capacitacion = Capacitacion::find($id);

        if (!$capacitacion) {
            return response()->json([
                'success' => false,
                'message' => 'Capacitación no encontrada.',
            ], Response::HTTP_NOT_FOUND);
        }

        $capacitacion->delete();

        return response()->json([
            'success' => true,
            'message' => 'Capacitación eliminada exitosamente.',
        ], Response::HTTP_OK);
    }
}
