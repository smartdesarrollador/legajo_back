<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Resources\PermisosResource;
use App\Models\Permiso;
use Carbon\Carbon;
use App\Models\Trabajador;
use Illuminate\Support\Facades\Validator;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Support\Facades\Auth;

use App\Models\Area;
use App\Models\EstadoPermiso;
use Illuminate\Support\Facades\DB;


class PermisoController extends Controller
{
    public function index(Request $request)
    {
        // Obtener los filtros
        $idTrabajador = $request->input('id_trabajador');
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');

        // Construir la consulta con los filtros aplicados
        $query = Permiso::query();

        // Filtrar por trabajador si se proporciona
        if ($idTrabajador) {
            $query->where('id_trabajador', $idTrabajador);
        }

        // Filtrar por fecha de inicio y fecha de fin si se proporcionan
        if ($fechaInicio) {
            $query->where('fecha_inicio', '>=', $fechaInicio);
        }

        if ($fechaFin) {
            $query->where('fecha_fin', '<=', $fechaFin);
        }

        // Cargar relaciones para optimizar los Resources
        $query->with(['trabajador', 'estadoPermiso', 'area']);

        // Obtener los resultados paginados o todos (según el caso)
        $permisos = $query->paginate(10);

        // Retornar los resultados usando el resource
        return PermisosResource::collection($permisos);
    }

    public function show($id)
    {
        $permiso = Permiso::with(['trabajador', 'estadoPermiso', 'area'])->findOrFail($id);

        // Retornar el permiso utilizando el resource
        return new PermisosResource($permiso);
    }

    public function store(Request $request)
    {
        // Validar los datos de entrada
        $data = $request->validate([
            'permiso' => 'required|string|max:200',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'horas' => 'required|integer|min:1',
            'id_trabajador' => 'required|exists:trabajador,id_trabajador',
            'id_estado_permiso' => 'required|exists:estado_permiso,id_estado_permiso',
            'jefe_inmediato' => 'required|string|max:200',
            'motivo' => 'nullable|string|max:500',
            'adjunto' => 'nullable|file',
        ]);

        // Crear el nuevo permiso
        $permiso = Permiso::create($data);

        // Retornar la respuesta con el recurso creado
        return new PermisosResource($permiso);
    }

    public function consulta_permiso(Request $request)
    {
        $request->validate([
            'fecha_desde' => 'required|date',
            'fecha_hasta' => 'required|date|after_or_equal:fecha_desde',
            'id_user' => 'required|exists:users,id'
        ]);

        // Primero obtenemos el trabajador asociado al usuario
        $trabajador = Trabajador::where('id_user', $request->id_user)->first();

        if (!$trabajador) {
            return response()->json([
                'success' => false,
                'message' => 'No se encontró el trabajador asociado al usuario'
            ], 404);
        }

        $permisos = Permiso::with(['trabajador', 'area', 'estado_permiso'])
            ->where('id_trabajador', $trabajador->id_trabajador)
            ->whereBetween('fecha_inicio', [$request->fecha_desde, $request->fecha_hasta])
            ->get()
            ->map(function ($permiso) {
                return [
                    'motivo' => $permiso->motivo,
                    'fecha_inicio' => date('d/m/Y', strtotime($permiso->fecha_inicio)),
                    'fecha_final' => date('d/m/Y', strtotime($permiso->fecha_fin)),
                    'horas' => $permiso->horas,
                    'estado' => [
                        'id' => $permiso->estado_permiso->id_estado_permiso,
                        'nombre' => $permiso->estado_permiso->estado_permiso,
                        'color' => $permiso->estado_permiso->id_estado_permiso == 1 ? 'green' : 'red'
                    ],
                    'ver_acuerdo' => [
                        'tiene_documento' => !is_null($permiso->adjunto),
                        'url' => !is_null($permiso->adjunto) ? "/api/permisos/{$permiso->id_permiso}/documento" : null
                    ],
                    'trabajador' => [
                        'id' => $permiso->trabajador->id_trabajador,
                        'nombre_completo' => $permiso->trabajador->primer . ' ' . $permiso->trabajador->paterno,
                        'area' => $permiso->area ? $permiso->area->area : null
                    ]
                ];
            });

        return response()->json($permisos,200);
    }

    public function crear_permiso(Request $request)
    {
        try {
            // Validación de los datos recibidos
            $validator = Validator::make($request->all(), [
                'permiso' => 'required|string|max:200',
                'fecha_inicio' => 'required|date',
                'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
                'horas' => 'required|integer',
                'id_area' => 'required|exists:area,id_area',
                'id_trabajador' => 'required|exists:trabajador,id_trabajador',
                'jefe_inmediato' => 'required|string|max:200',
                'motivo' => 'required|string|max:500',
                'adjunto' => 'nullable|file'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], 400);
            }

            // Procesar el archivo adjunto si existe
            $adjunto = null;
            if ($request->hasFile('adjunto')) {
                $adjunto = $request->file('adjunto')->getContent();
            }

            // Crear el nuevo permiso
            $permiso = new Permiso();
            $permiso->permiso = $request->permiso;
            $permiso->fecha_inicio = $request->fecha_inicio;
            $permiso->fecha_fin = $request->fecha_fin;
            $permiso->horas = $request->horas;
            $permiso->id_area = $request->id_area;
            $permiso->id_trabajador = $request->id_trabajador;
            $permiso->jefe_inmediato = $request->jefe_inmediato;
            $permiso->motivo = $request->motivo;
            $permiso->adjunto = $adjunto;
            $permiso->id_estado_permiso = 1; // Estado inicial (pendiente)
            
            $permiso->save();

            return response()->json($permiso, 201);

        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error al crear el permiso',
                'error' => $e->getMessage()
            ], 500);
        }
    }


//Metodo Entorno Empresa
    public function editar_permiso(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            // Validar los datos de entrada
            $request->validate([
                'fecha_inicio' => 'required|date',
                'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
                'horas' => 'required|integer|min:1',
                'motivo' => 'required|string|max:500',
                'id_area' => 'required|exists:area,id_area',
                'id_trabajador' => 'required|exists:trabajador,id_trabajador',
                'jefe_inmediato' => 'required|string|max:200',
                'id_estado_permiso' => 'required|exists:estado_permiso,id_estado_permiso',
            ], [
                'fecha_inicio.required' => 'La fecha de inicio es requerida',
                'fecha_fin.required' => 'La fecha de fin es requerida',
                'fecha_fin.after_or_equal' => 'La fecha de fin debe ser posterior o igual a la fecha de inicio',
                'horas.required' => 'El número de horas es requerido',
                'horas.integer' => 'Las horas deben ser un número entero',
                'horas.min' => 'Las horas deben ser al menos 1',
                'motivo.required' => 'El motivo es requerido',
                'id_area.required' => 'El área es requerida',
                'id_area.exists' => 'El área seleccionada no existe',
                'id_trabajador.required' => 'El trabajador es requerido',
                'id_trabajador.exists' => 'El trabajador seleccionado no existe',
                'jefe_inmediato.required' => 'El jefe inmediato es requerido',
                'id_estado_permiso.required' => 'El estado del permiso es requerido',
                'id_estado_permiso.exists' => 'El estado del permiso seleccionado no existe'
            ]);

            // Buscar el permiso existente
            $permiso = Permiso::findOrFail($id);

            // Actualizar el permiso
            $permiso->update([
                'permiso' => 'Permiso ' . Carbon::parse($request->fecha_inicio)->format('d/m/Y'),
                'fecha_inicio' => $request->fecha_inicio,
                'fecha_fin' => $request->fecha_fin,
                'horas' => $request->horas,
                'id_area' => $request->id_area,
                'id_trabajador' => $request->id_trabajador,
                'jefe_inmediato' => $request->jefe_inmediato,
                'motivo' => $request->motivo,
                'id_estado_permiso' => $request->id_estado_permiso,
            ]);

            // Si hay un archivo adjunto, procesarlo
            if ($request->hasFile('adjunto')) {
                $adjunto = $request->file('adjunto');
                $permiso->adjunto = $adjunto->get();
                $permiso->save();
            }

            DB::commit();

            // Cargar las relaciones necesarias y retornar el recurso
            $permiso->load(['area', 'trabajador', 'estadoPermiso']);
            
            return response()->json([
                'status' => 'success',
                'message' => 'Permiso actualizado correctamente',
                'data' => new PermisosResource($permiso)
            ], 200);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'Permiso no encontrado'
            ], 404);

        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'Error de validación',
                'errors' => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'Error al actualizar el permiso',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
