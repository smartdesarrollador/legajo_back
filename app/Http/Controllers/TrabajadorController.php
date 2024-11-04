<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Trabajador;
use App\Http\Resources\TrabajadorResource;
use Illuminate\Http\Response;
use App\Http\Resources\RegimenLaboralResource;
use Illuminate\Support\Facades\Validator;
use Exception;

class TrabajadorController extends Controller
{
    // Listar todos los trabajadores
   public function index(Request $request)
{
    try {
        // Crea una consulta inicial
        $query = Trabajador::with('area', 'cargo', 'tipoDocumento', 'ubigeo', 'empleador', 
    'regimenLaboral', 'ocupacion', 'tipoContrato', 'jornadaLaboral', 
    'estadoTrabajador', 'nivelEducativo', 'regimenSalud', 'regimenPensiones', 
    'afp', 'contrato');

        // Filtra por user_id si se proporciona
        if ($request->has('user_id')) {
            $query->where('id_empleador', $request->input('user_id'));
           
        }

        // Filtra por área si se proporciona
        if ($request->has('area')) {
            $query->where('id_area', $request->input('area'));
        }

        // Filtra por tipo de contrato si se proporciona
        if ($request->has('tipo_contrato')) {
            $query->where('id_tipo_contrato', $request->input('tipo_contrato'));
        }

        // Ejecuta la consulta y obtiene los resultados
        $trabajadores = $query->get();

        return response()->json([
            'success' => true,
            'message' => 'Lista de trabajadores obtenida exitosamente.',
            'data' => TrabajadorResource::collection($trabajadores)
        ], Response::HTTP_OK);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error al obtener la lista de trabajadores.',
            'error' => $e->getMessage()
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}

    // Crear un nuevo trabajador
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
    'paterno' => 'required|string|max:255',
    'materno' => 'required|string|max:255',
    'primer' => 'required|string|max:255',
    'segundo' => 'nullable|string|max:255',
    'id_tipo_documento' => 'required|integer',
    'numero_documento' => 'required|string|max:20',
    'ruc' => 'nullable|string|max:20',  // Cambiar a nullable
    'direccion' => 'required|string|max:255',
    'id_ubigeo' => 'required|integer',
    'id_empleador' => 'required|integer',
    'id_ocupacion' => 'required|integer',
    'fecha_nacimiento' => 'nullable|date',
    'id_user' => 'nullable|integer',
]);

            $trabajador = Trabajador::create($data);

            return response()->json([
                'success' => true,
                'message' => 'Trabajador creado exitosamente.',
                'data' => new TrabajadorResource($trabajador)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el trabajador.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Mostrar un trabajador específico
    public function show($id)
    {
        try {
            $trabajador = Trabajador::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Trabajador obtenido exitosamente.',
                'data' => new TrabajadorResource($trabajador)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el trabajador.',
                'error' => $e->getMessage()
            ], Response::HTTP_NOT_FOUND);
        }
    }

    // Actualizar un trabajador
    public function update(Request $request, $id)
    {
        try {
            $trabajador = Trabajador::findOrFail($id);

            $data = $request->validate([
                'paterno' => 'required|string|max:255',
                'materno' => 'required|string|max:255',
                'primer' => 'required|string|max:255',
                'segundo' => 'nullable|string|max:255',
                'id_tipo_documento' => 'required|integer',
                'numero_documento' => 'required|string|max:20',
                'direccion' => 'required|string|max:255',
                'id_ubigeo' => 'required|integer',
                'id_empleador' => 'required|integer',
                'id_ocupacion' => 'required|integer',
                'id_user' => 'nullable|integer',
            ]);

            $trabajador->update($data);

            return response()->json([
                'success' => true,
                'message' => 'Trabajador actualizado exitosamente.',
                'data' => new TrabajadorResource($trabajador)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el trabajador.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar un trabajador
    public function destroy($id)
    {
        try {
            $trabajador = Trabajador::findOrFail($id);
            $trabajador->delete();

            return response()->json([
                'success' => true,
                'message' => 'Trabajador eliminado exitosamente.'
            ], Response::HTTP_NO_CONTENT);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el trabajador.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getRegimenLaboral($id)
    {
        // Encuentra el trabajador por su id
        $trabajador = Trabajador::findOrFail($id);

       /*  dd($trabajador); */

        // Si tiene un regimen laboral asignado, se retorna con Resource
        if ($trabajador->regimenLaboral) {
            return new RegimenLaboralResource($trabajador->regimenLaboral);
        }

        // Si no tiene regimen laboral, retorna un mensaje de error
        return response()->json([
            'success' => false,
            'message' => 'El trabajador no tiene un régimen laboral asignado.'
        ], 404);
    }

    public function createTrabajador(Request $request)
    {
        try {
            // Validar los datos de entrada
            $validator = Validator::make($request->all(), [
                'paterno' => 'required|string|max:500',
                'materno' => 'required|string|max:500',
                'primer' => 'required|string|max:500',
                'segundo' => 'nullable|string|max:500',
                'id_tipo_documento' => 'required|integer|exists:tipo_documento,id_tipo_documento',
                'numero_documento' => 'required|string|max:50|unique:trabajador,numero_documento',
                /* 'fecha_nacimiento' => 'required|date', */
                'ruc' => 'nullable|string|max:20',
                'direccion' => 'required|string|max:1000',
                'referencia' => 'nullable|string|max:500',
                'id_ubigeo' => 'required|integer|exists:ubigeo,id_ubigeo',
                'telefono' => 'nullable|string|max:20',
                'celular' => 'nullable|string|max:20',
                'correo' => 'nullable|string|email|max:500',
                /* 'es_jefe' => 'required|boolean', */
                /* 'fecha_ingreso' => 'required|date', */
                /* 'fecha_egreso' => 'nullable|date', */
                /* 'fecha_baja' => 'nullable|date', */
                'id_empleador' => 'required|integer|exists:empleador,id_empleador',
                /* 'id_regimen_laboral' => 'required|integer|exists:regimen_laboral,id_regimen_laboral', */
                /* 'id_ocupacion' => 'required|integer|exists:ocupacion,id_ocupacion', */
                /* 'id_tipo_contrato' => 'required|integer|exists:tipo_contrato,id_tipo_contrato', */
                /* 'id_cargo' => 'required|integer|exists:cargo,id_cargo', */
                /* 'id_area' => 'required|integer|exists:area,id_area', */
                /* 'id_jornada_laboral' => 'required|integer|exists:jornada_laboral,id_jornada_laboral', */
                /* 'id_estado_trabajador' => 'required|integer|exists:estado_trabajador,id_estado_trabajador', */
                /* 'fecha_estado' => 'nullable|date', */
                /* 'id_nivel_educativo' => 'required|integer|exists:nivel_educativo,id_nivel_educativo', */
                /* 'id_regimen_salud' => 'required|integer|exists:regimen_salud,id_regimen_salud', */
                /* 'id_regimen_pensiones' => 'required|integer|exists:regimen_pensiones,id_regimen_pensiones', */
                /* 'id_afp' => 'nullable|integer|exists:afp,id_afp', */
                /* 'cuspp' => 'nullable|string|max:100', */
                /* 'es_discapacitado' => 'required|boolean', */
                /* 'es_sindicalizado' => 'required|boolean', */
                /* 'saldo_inicial_vacaciones' => 'required|numeric', */
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            // Crear el trabajador
            $trabajador = Trabajador::create($request->all());

            // Retornar el recurso del trabajador creado
            return new TrabajadorResource($trabajador);
        } catch (Exception $e) {
            // Manejo de errores
            return response()->json([
                'message' => 'Error al crear el trabajador',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
