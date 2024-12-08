<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Vacaciones;
use App\Models\TipoVacaciones;
use App\Models\Trabajador;
use App\Http\Resources\VacacionesResource;
use Illuminate\Http\Response;


class VacacionesController extends Controller
{
    // Listar todas las vacaciones
    public function index()
    {
        try {
            $vacaciones = Vacaciones::with('tipoVacaciones', 'trabajador')->get();
            return response()->json([
                'success' => true,
                'message' => 'Lista de vacaciones obtenida exitosamente.',
                'data' => VacacionesResource::collection($vacaciones)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de vacaciones.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear una nueva solicitud de vacaciones
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fecha_solicitud' => 'required|date',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'dias' => 'required|integer',
            'id_tipo_vacaciones' => 'required|exists:tipo_vacaciones,id_tipo_vacaciones',
            'id_trabajador' => 'required|exists:trabajadores,id_trabajador',
        ]);

        try {
            $vacaciones = Vacaciones::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Vacaciones creadas exitosamente.',
                'data' => new VacacionesResource($vacaciones)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear las vacaciones.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Mostrar una solicitud de vacaciones específica
    public function show($id)
    {
        try {
            $vacaciones = Vacaciones::with('tipoVacaciones', 'trabajador')->findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Vacaciones obtenidas exitosamente.',
                'data' => new VacacionesResource($vacaciones)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener las vacaciones.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar una solicitud de vacaciones
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'fecha_solicitud' => 'required|date',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'dias' => 'required|integer',
            'id_tipo_vacaciones' => 'required|exists:tipo_vacaciones,id_tipo_vacaciones',
            'id_trabajador' => 'required|exists:trabajadores,id_trabajador',
        ]);

        try {
            $vacaciones = Vacaciones::findOrFail($id);
            $vacaciones->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Vacaciones actualizadas exitosamente.',
                'data' => new VacacionesResource($vacaciones)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar las vacaciones.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar una solicitud de vacaciones
    public function destroy($id)
    {
        try {
            $vacaciones = Vacaciones::findOrFail($id);
            $vacaciones->delete();
            return response()->json([
                'success' => true,
                'message' => 'Vacaciones eliminadas exitosamente.'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar las vacaciones.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    

    // Consulta de vacaciones trabajador
    public function consulta_vacaciones(Request $request)
    {
        try {
            // Validar los parámetros de entrada
            $validatedData = $request->validate([
                'fecha_desde' => 'nullable|date',
                'fecha_hasta' => 'nullable|date',
                'id_tipo_vacaciones' => 'nullable|exists:tipo_vacaciones,id_tipo_vacaciones',
                'id_user' => 'required|exists:users,id'
            ]);

            // Obtener el trabajador asociado al usuario
            $query = Vacaciones::with(['tipoVacaciones', 'trabajador', 'estadoAprobacion'])
                ->whereHas('trabajador', function($q) use ($validatedData) {
                    $q->where('id_user', $validatedData['id_user']);
                });

            // Aplicar filtros solo si están presentes
            if ($request->filled('fecha_desde')) {
                $query->where('fecha_inicio', '>=', $validatedData['fecha_desde']);
            }

            if ($request->filled('fecha_hasta')) {
                $query->where('fecha_fin', '<=', $validatedData['fecha_hasta']);
            }

            if ($request->filled('id_tipo_vacaciones')) {
                $query->where('id_tipo_vacaciones', $validatedData['id_tipo_vacaciones']);
            }

            // Obtener los resultados
            $vacaciones = $query->get()->map(function ($vacacion) {
                return [
                    'id_vacaciones' => $vacacion->id_vacaciones,
                    'fecha_solicitud' => $vacacion->fecha_solicitud,
                    'fecha_inicio' => $vacacion->fecha_inicio,
                    'fecha_fin' => $vacacion->fecha_fin,
                    'dias' => $vacacion->dias,
                    'tipo_vacaciones' => $vacacion->tipoVacaciones->tipo_vacaciones,
                    'trabajador' => [
                        'nombre_completo' => $vacacion->trabajador->primer . ' ' . 
                                           $vacacion->trabajador->segundo . ' ' . 
                                           $vacacion->trabajador->paterno . ' ' . 
                                           $vacacion->trabajador->materno,
                        'numero_documento' => $vacacion->trabajador->numero_documento
                    ],
                    'estado' => $vacacion->estadoAprobacion ? [
                        'estado' => $vacacion->estadoAprobacion->estado_aprobacion,
                        'fecha_aprobacion' => $vacacion->estadoAprobacion->fecha_aprobacion,
                        'aprobado_por' => $vacacion->estadoAprobacion->aprobado_por,
                        'comentario' => $vacacion->estadoAprobacion->comentario
                    ] : null
                ];
            });

            return response()->json($vacaciones, Response::HTTP_OK);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function consulta_vacaciones_trabajadores(Request $request)
    {
        try {
            // Validar los parámetros de entrada
            $validatedData = $request->validate([
                'fecha_desde' => 'nullable|date',
                'fecha_hasta' => 'nullable|date',
                'id_tipo_vacaciones' => 'nullable|exists:tipo_vacaciones,id_tipo_vacaciones',
                'id_trabajador' => 'nullable|exists:trabajador,id_trabajador',
                'id_user' => 'required|exists:users,id'
            ]);

            // Primero obtenemos el id_empleador basado en el id_user
            $empleador = DB::table('empleador')->where('id_user', $validatedData['id_user'])->first();
            
            if (!$empleador) {
                return response()->json(['error' => 'Empleador no encontrado'], Response::HTTP_NOT_FOUND);
            }

            // Construir la consulta base incluyendo la relación con empleador
            $query = Vacaciones::with(['tipoVacaciones', 'trabajador', 'estadoAprobacion'])
                ->whereHas('trabajador', function($q) use ($empleador) {
                    $q->where('id_empleador', $empleador->id_empleador);
                });

            // Aplicar filtros si se proporcionaron
            if ($request->filled('fecha_desde')) {
                $query->where('fecha_inicio', '>=', $validatedData['fecha_desde']);
            }

            if ($request->filled('fecha_hasta')) {
                $query->where('fecha_fin', '<=', $validatedData['fecha_hasta']);
            }

            if ($request->filled('id_tipo_vacaciones')) {
                $query->where('id_tipo_vacaciones', $validatedData['id_tipo_vacaciones']);
            }

            if ($request->filled('id_trabajador')) {
                $query->where('id_trabajador', $validatedData['id_trabajador']);
            }

            // Obtener los resultados y mapearlos
            $vacaciones = $query->get()->map(function ($vacacion) {
                return [
                    'id_vacaciones' => $vacacion->id_vacaciones,
                    'fecha_solicitud' => $vacacion->fecha_solicitud,
                    'fecha_inicio' => $vacacion->fecha_inicio,
                    'fecha_fin' => $vacacion->fecha_fin,
                    'dias' => $vacacion->dias,
                    'tipo_vacaciones' => [
                        'id' => $vacacion->tipoVacaciones->id_tipo_vacaciones,
                        'nombre' => $vacacion->tipoVacaciones->tipo_vacaciones
                    ],
                    'trabajador' => [
                        'id' => $vacacion->trabajador->id_trabajador,
                        'nombre_completo' => trim($vacacion->trabajador->primer . ' ' . 
                                          $vacacion->trabajador->segundo . ' ' . 
                                          $vacacion->trabajador->paterno . ' ' . 
                                          $vacacion->trabajador->materno),
                        'numero_documento' => $vacacion->trabajador->numero_documento
                    ],
                    'estado_aprobacion' => $vacacion->estadoAprobacion ? [
                        'estado' => $vacacion->estadoAprobacion->estado_aprobacion,
                        'fecha_aprobacion' => $vacacion->estadoAprobacion->fecha_aprobacion,
                        'aprobado_por' => $vacacion->estadoAprobacion->aprobado_por,
                        'cargo' => $vacacion->estadoAprobacion->cargo,
                        'comentario' => $vacacion->estadoAprobacion->comentario
                    ] : null,
                    'saldo_vacaciones' => $vacacion->trabajador->saldoVacaciones ? [
                        'dias_acumulados' => $vacacion->trabajador->saldoVacaciones->dias_acumulados,
                        'dias_vencidos' => $vacacion->trabajador->saldoVacaciones->dias_vencidos,
                        'dias_usados' => $vacacion->trabajador->saldoVacaciones->dias_usados,
                        'saldo_actual' => $vacacion->trabajador->saldoVacaciones->saldo_vacaciones
                    ] : null
                ];
            });

            return response()->json($vacaciones, Response::HTTP_OK);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getTiposVacaciones()
    {
        try {
            $tipos = TipoVacaciones::select('id_tipo_vacaciones as id', 'tipo_vacaciones as nombre')->get();
            return response()->json($tipos);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getTrabajadores()
    {
        try {
            $trabajadores = Trabajador::select(
                'id_trabajador as id',
                DB::raw("CONCAT(primer, ' ', COALESCE(segundo, ''), ' ', paterno, ' ', materno) as nombre_completo")
            )->get();
            return response()->json($trabajadores);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
