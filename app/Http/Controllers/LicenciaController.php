<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Licencia;
use App\Http\Resources\LicenciaResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Exception;
use Illuminate\Support\Facades\Log;

class LicenciaController extends Controller
{
    // Listar todas las licencias
    public function index()
    {
        try {
            $licencias = Licencia::with('area', 'trabajador', 'estadoPermiso')->get();
            return response()->json([
                'success' => true,
                'message' => 'Lista de licencias obtenida exitosamente.',
                'data' => LicenciaResource::collection($licencias)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de licencias.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

   public function consulta_licencia(Request $request)
{
    try {
        // Validar solo el id_user como requerido
        $request->validate([
            'id_user' => 'required|integer',
            'fecha_desde' => 'nullable|date',
            'fecha_hasta' => 'nullable|date'
        ]);

        // Obtener el trabajador usando el id_user
        $trabajador = DB::table('trabajador')
            ->where('id_user', $request->id_user)
            ->first();

        if (!$trabajador) {
            return response()->json([], 404);
        }

        // Consulta principal con joins
        $query = DB::table('licencia')
            ->join('estado_permiso', 'licencia.id_estado_permiso', '=', 'estado_permiso.id_estado_permiso')
            ->where('licencia.id_trabajador', $trabajador->id_trabajador);

        // Aplicar filtros de fecha solo si están presentes
        if ($request->fecha_desde && $request->fecha_hasta) {
            $query->whereBetween('licencia.fecha_inicio', [$request->fecha_desde, $request->fecha_hasta]);
        }

        $licencias = $query->select([
                'licencia.id_licencia',
                'licencia.motivo',
                'licencia.fecha_inicio',
                'licencia.fecha_fin',
                DB::raw('DATEDIFF(licencia.fecha_fin, licencia.fecha_inicio) + 1 as dias'),
                'estado_permiso.estado_permiso as estado'
            ])
            ->get()
            ->map(function ($licencia) {
                return [
                    'id' => $licencia->id_licencia,
                    'motivo' => $licencia->motivo,
                    'fecha_inicio' => date('d/m/Y', strtotime($licencia->fecha_inicio)),
                    'fecha_fin' => date('d/m/Y', strtotime($licencia->fecha_fin)),
                    'dias' => $licencia->dias,
                    'estado' => $licencia->estado,
                    'ver_acuerdo' => url('/api/licencias/' . $licencia->id_licencia)
                ];
            });

        return response()->json($licencias, 200);

    } catch (ValidationException $e) {
        return response()->json([], 422);
    } catch (Exception $e) {
        return response()->json([], 500);
    }
}

public function consulta_licencias_trabajadores(Request $request)
{
    try {
        // Validar los parámetros del request
        $request->validate([
            'id_user' => 'required|integer',
            'fecha_desde' => 'nullable|date',
            'fecha_hasta' => 'nullable|date',
            'id_area' => 'nullable|integer',
            'id_trabajador' => 'nullable|integer'
        ]);

        // Obtener el empleador usando el id_user
        $empleador = DB::table('empleador')
            ->where('id_user', $request->id_user)
            ->first();

        if (!$empleador) {
            return response()->json([
                'success' => false,
                'message' => 'Empleador no encontrado'
            ], 404);
        }

        // Iniciar la consulta base
        $query = DB::table('licencia')
            ->join('trabajador', 'licencia.id_trabajador', '=', 'trabajador.id_trabajador')
            ->join('estado_permiso', 'licencia.id_estado_permiso', '=', 'estado_permiso.id_estado_permiso')
            ->join('area', 'licencia.id_area', '=', 'area.id_area')
            ->where('trabajador.id_empleador', $empleador->id_empleador);

        // Aplicar filtros si existen
        if ($request->fecha_desde && $request->fecha_hasta) {
            $query->whereBetween('licencia.fecha_inicio', [$request->fecha_desde, $request->fecha_hasta]);
        }

        if ($request->id_area) {
            $query->where('licencia.id_area', $request->id_area);
        }

        if ($request->id_trabajador) {
            $query->where('licencia.id_trabajador', $request->id_trabajador);
        }

        // Seleccionar los campos necesarios
        $licencias = $query->select([
            'licencia.id_licencia',
            'licencia.motivo',
            'licencia.fecha_inicio',
            'licencia.fecha_fin',
            DB::raw('DATEDIFF(licencia.fecha_fin, licencia.fecha_inicio) + 1 as dias'),
            'estado_permiso.estado_permiso as estado',
            'trabajador.paterno',
            'trabajador.materno',
            'trabajador.primer',
            'trabajador.segundo',
            'area.area'
        ])
        ->get()
        ->map(function ($licencia) {
            return [
                'id' => $licencia->id_licencia,
                'trabajador' => trim($licencia->paterno . ' ' . $licencia->materno . ' ' . 
                               $licencia->primer . ' ' . $licencia->segundo),
                'area' => $licencia->area,
                'motivo' => $licencia->motivo,
                'fecha_inicio' => date('d/m/Y', strtotime($licencia->fecha_inicio)),
                'fecha_fin' => date('d/m/Y', strtotime($licencia->fecha_fin)),
                'dias' => $licencia->dias,
                'estado' => $licencia->estado,
                'ver_acuerdo' => url('/api/licencias/' . $licencia->id_licencia)
            ];
        });

        return response()->json($licencias, 200);

    } catch (ValidationException $e) {
        return response()->json($e->errors(), 422);
    } catch (Exception $e) {
        Log::error($e->getMessage());
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

/**
 * Obtener trabajadores por empleador
 */
public function obtener_trabajadores(Request $request)
{
    try {
        $request->validate([
            'id_user' => 'required|integer'
        ]);

        // Obtener el empleador
        $empleador = DB::table('empleador')
            ->where('id_user', $request->id_user)
            ->first();

        if (!$empleador) {
            return response()->json([], 404);
        }

        // Obtener trabajadores del empleador
        $trabajadores = DB::table('trabajador')
            ->where('id_empleador', $empleador->id_empleador)
            ->select([
                'id_trabajador as value',
                DB::raw("CONCAT(paterno, ' ', materno, ' ', primer, ' ', segundo) as label")
            ])
            ->get();

        return response()->json($trabajadores);

    } catch (Exception $e) {
        Log::error($e->getMessage());
        return response()->json([], 500);
    }
}

/**
 * Obtener áreas por empleador
 */
public function obtener_areas(Request $request)
{
    try {
        $request->validate([
            'id_user' => 'required|integer'
        ]);

        // Obtener el empleador
        $empleador = DB::table('empleador')
            ->where('id_user', $request->id_user)
            ->first();

        if (!$empleador) {
            return response()->json([], 404);
        }

        // Obtener áreas asociadas a los trabajadores del empleador
        $areas = DB::table('area')
            ->join('trabajador', 'area.id_area', '=', 'trabajador.id_area')
            ->where('trabajador.id_empleador', $empleador->id_empleador)
            ->select([
                'area.id_area as value',
                'area.area as label'
            ])
            ->distinct()
            ->get();

        return response()->json($areas);

    } catch (Exception $e) {
        Log::error($e->getMessage());
        return response()->json([], 500);
    }
}

public function crear_licencia(Request $request)
{
    try {
        // Validar los datos de entrada
        $request->validate([
            'fecha_emision' => 'required|date',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'jefe_vacaciones' => 'required|string|max:200',
            'motivo' => 'required|string|max:500',
            'id_area' => 'required|exists:area,id_area',
            'id_trabajador' => 'required|exists:trabajador,id_trabajador',
        ]);

        // Crear la nueva licencia
        $licencia = new Licencia();
        $licencia->fecha_emision = $request->fecha_emision;
        $licencia->fecha_inicio = $request->fecha_inicio;
        $licencia->fecha_fin = $request->fecha_fin;
        $licencia->jefe_vacaciones = $request->jefe_vacaciones;
        $licencia->motivo = $request->motivo;
        $licencia->id_area = $request->id_area;
        $licencia->id_trabajador = $request->id_trabajador;
        // Por defecto, asignamos un estado inicial (por ejemplo, 1 para 'Pendiente')
        $licencia->id_estado_permiso = 1;

        $licencia->save();

        return response()->json([
            'success' => true,
            'message' => 'Licencia creada exitosamente',
            'data' => new LicenciaResource($licencia)
        ], Response::HTTP_CREATED);

    } catch (ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error de validación',
            'errors' => $e->errors()
        ], Response::HTTP_UNPROCESSABLE_ENTITY);

    } catch (\Exception $e) {
        Log::error($e->getMessage());
        return response()->json([
            'success' => false,
            'message' => 'Error al crear la licencia',
            'error' => $e->getMessage()
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}

public function editar_licencia(Request $request, $id)
{
    try {
        // Validar los datos de entrada
        $request->validate([
            'fecha_emision' => 'required|date',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'jefe_vacaciones' => 'required|string|max:200',
            'motivo' => 'required|string|max:500',
            'id_area' => 'required|exists:area,id_area',
            'id_trabajador' => 'required|exists:trabajador,id_trabajador',
            'id_estado_permiso' => 'required|exists:estado_permiso,id_estado_permiso'
        ]);

        // Buscar la licencia
        $licencia = Licencia::find($id);

        if (!$licencia) {
            return response()->json([
                'success' => false,
                'message' => 'Licencia no encontrada'
            ], Response::HTTP_NOT_FOUND);
        }

        // Verificar que el trabajador pertenece al empleador correcto
        $trabajador = DB::table('trabajador')
            ->where('id_trabajador', $request->id_trabajador)
            ->first();

        if (!$trabajador) {
            return response()->json([
                'success' => false,
                'message' => 'Trabajador no encontrado'
            ], Response::HTTP_NOT_FOUND);
        }

        // Actualizar la licencia
        $licencia->fecha_emision = $request->fecha_emision;
        $licencia->fecha_inicio = $request->fecha_inicio;
        $licencia->fecha_fin = $request->fecha_fin;
        $licencia->jefe_vacaciones = $request->jefe_vacaciones;
        $licencia->motivo = $request->motivo;
        $licencia->id_area = $request->id_area;
        $licencia->id_trabajador = $request->id_trabajador;
        $licencia->id_estado_permiso = $request->id_estado_permiso;

        $licencia->save();

        return response()->json([
            'success' => true,
            'message' => 'Licencia actualizada exitosamente',
            'data' => new LicenciaResource($licencia)
        ], Response::HTTP_OK);

    } catch (ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error de validación',
            'errors' => $e->errors()
        ], Response::HTTP_UNPROCESSABLE_ENTITY);

    } catch (\Exception $e) {
        Log::error($e->getMessage());
        return response()->json([
            'success' => false,
            'message' => 'Error al actualizar la licencia',
            'error' => $e->getMessage()
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}

public function obtenerLicencia($id)
{
    try {
        $licencia = Licencia::with(['area', 'trabajador', 'estadoPermiso'])
            ->where('id_licencia', $id)
            ->first();

        if (!$licencia) {
            return response()->json([
                'success' => false,
                'message' => 'Licencia no encontrada'
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'success' => true,
            'data' => $licencia
        ], Response::HTTP_OK);

    } catch (\Exception $e) {
        Log::error($e->getMessage());
        return response()->json([
            'success' => false,
            'message' => 'Error al obtener la licencia',
            'error' => $e->getMessage()
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
}
