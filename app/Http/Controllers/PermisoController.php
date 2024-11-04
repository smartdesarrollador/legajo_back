<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Resources\PermisosResource;
use App\Models\Permiso;


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
}
