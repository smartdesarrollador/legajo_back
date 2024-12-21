<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contrato;
use App\Http\Resources\ContratoResource;
use Illuminate\Http\Response;

use App\Models\Area;
use App\Models\EstadoContrato;
use App\Models\TipoContrato;
use App\Models\Trabajador;
use App\Http\Resources\AreaResource;
use App\Http\Resources\EstadoContratoResource;
use App\Http\Resources\TipoContratoResource;
use App\Http\Resources\TrabajadorResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class ContratoController extends Controller
{

    public function index(Request $request)
    {
        // Construir la consulta base
        $query = Contrato::with([
            'empleador',
            'trabajador.area',
            'estadoContrato',
            'jornadaLaboral',
            'cargo',
            'funciones',
            'regimenLaboral',
            'tipoContrato',
        ]);

        // Aplicar filtros si existen
        if ($request->filled('area')) {
            $query->whereHas('trabajador.area', function ($q) use ($request) {
                $q->where('id_area', $request->area);
            });
        }

        if ($request->filled('estado_contrato')) {
            $query->where('id_estado_contrato', $request->estado_contrato);
        }

        if ($request->filled('trabajador')) {
            $query->where('id_trabajador', $request->trabajador);
        }

        if ($request->filled('tipo_contrato')) {
            $query->where('id_tipo_contrato', $request->tipo_contrato);
        }

        // Obtener los resultados paginados
        $contratos = $query->paginate(10);

        // Retornar los resultados utilizando el recurso
        return ContratoResource::collection($contratos);
    }
   
   /*  public function index()
    {
        try {
           
            $contratos = Contrato::with([
                'empleador', 
                'trabajador', 
                'estadoContrato', 
                'jornadaLaboral', 
                'cargo', 
                'funciones', 
                'regimenLaboral', 
                'tipoContrato'
            ])->get();

            return response()->json([
                'success' => true,
                'message' => 'Lista de contratos obtenida exitosamente.',
                'data' => ContratoResource::collection($contratos),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de contratos.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    } */

     public function show($id)
{
    $contrato = Contrato::with([
        'empleador',
        'trabajador.area',
        'estadoContrato',
        'jornadaLaboral',
        'cargo',
        'funciones',
        'regimenLaboral',
        'tipoContrato',
    ])->findOrFail($id);

    return new ContratoResource($contrato);
}
    
   /*  public function show($id)
    {
        try {
            $contrato = Contrato::with([
                'empleador', 
                'trabajador', 
                'estadoContrato', 
                'jornadaLaboral', 
                'cargo', 
                'funciones', 
                'regimenLaboral', 
                'tipoContrato'
            ])->findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => new ContratoResource($contrato),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Contrato no encontrado.',
                'error' => $e->getMessage(),
            ], Response::HTTP_NOT_FOUND);
        }
    } */

    // Crear un nuevo contrato
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'observacion' => 'nullable|string',
            'id_empleador' => 'required|integer|exists:empleadores,id_empleador',
            'id_trabajador' => 'required|integer|exists:trabajadores,id_trabajador',
            'id_estado_contrato' => 'required|integer|exists:estado_contratos,id_estado_contrato',
            'id_jornada_laboral' => 'required|integer|exists:jornada_laborales,id_jornada_laboral',
            'id_cargo' => 'required|integer|exists:cargos,id_cargo',
            'id_funciones' => 'required|integer|exists:funciones,id_funciones',
            'id_regimen_laboral' => 'required|integer|exists:regimen_laborales,id_regimen_laboral',
            'id_tipo_contrato' => 'required|integer|exists:tipo_contratos,id_tipo_contrato',
        ]);

        try {
            $contrato = Contrato::create($validatedData);

            return response()->json([
                'success' => true,
                'message' => 'Contrato creado exitosamente.',
                'data' => new ContratoResource($contrato),
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el contrato.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar un contrato existente
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'observacion' => 'nullable|string',
            'id_empleador' => 'required|integer|exists:empleadores,id_empleador',
            'id_trabajador' => 'required|integer|exists:trabajadores,id_trabajador',
            'id_estado_contrato' => 'required|integer|exists:estado_contratos,id_estado_contrato',
            'id_jornada_laboral' => 'required|integer|exists:jornada_laborales,id_jornada_laboral',
            'id_cargo' => 'required|integer|exists:cargos,id_cargo',
            'id_funciones' => 'required|integer|exists:funciones,id_funciones',
            'id_regimen_laboral' => 'required|integer|exists:regimen_laborales,id_regimen_laboral',
            'id_tipo_contrato' => 'required|integer|exists:tipo_contratos,id_tipo_contrato',
        ]);

        try {
            $contrato = Contrato::findOrFail($id);
            $contrato->update($validatedData);

            return response()->json([
                'success' => true,
                'message' => 'Contrato actualizado exitosamente.',
                'data' => new ContratoResource($contrato),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el contrato.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar un contrato
    public function destroy($id)
    {
        try {
            $contrato = Contrato::findOrFail($id);
            $contrato->delete();

            return response()->json([
                'success' => true,
                'message' => 'Contrato eliminado exitosamente.',
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el contrato.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function getAreas()
    {
        $areas = Area::all();
        return AreaResource::collection($areas);
    }

    /**
     * Obtener las opciones de estados de contrato.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getEstadosContrato()
    {
        $estados = EstadoContrato::all();
        return EstadoContratoResource::collection($estados);
    }

    /**
     * Obtener las opciones de tipos de contrato.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getTiposContrato()
    {
        $tipos = TipoContrato::all();
        return TipoContratoResource::collection($tipos);
    }

    /**
     * Obtener las opciones de trabajadores.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getTrabajadores()
    {
        $trabajadores = Trabajador::all();
        return TrabajadorResource::collection($trabajadores);
    }

    /**
     * Crear un nuevo contrato con sus detalles
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function crear_contrato(Request $request)
    {
        try {
            Log::info('Datos recibidos:', $request->all());

            // Validar los datos recibidos
            $validatedData = $request->validate([
                'id_trabajador' => 'required|exists:trabajador,id_trabajador',
                'id_empleador' => 'required|exists:empleador,id_empleador',
                'jornada' => 'required|exists:jornada_laboral,id_jornada_laboral',
                'tipo_contrato' => 'required|exists:tipo_contrato,id_tipo_contrato',
                'fecha_periodo' => 'required|date_format:Y-m-d',
                // Campos opcionales
                'oferta_laboral' => 'nullable|string|max:500',
                'motivo_contrato' => 'nullable|string|max:500',
                'evidencia_documentaria' => 'nullable|string|max:500',
                'fecha_suplencia' => 'nullable|date_format:Y-m-d',
                // ... resto de validaciones
            ]);

            DB::beginTransaction();

            try {
                $contrato = Contrato::create([
                    'id_empleador' => $request->id_empleador,
                    'id_trabajador' => $request->id_trabajador,
                    'id_jornada_laboral' => $request->jornada,
                    'id_tipo_contrato' => $request->tipo_contrato,
                    'fecha_inicio' => $request->fecha_periodo,
                    'fecha_fin' => null,
                    'id_estado_contrato' => 1,
                    'observacion' => 'Contrato creado el ' . now()->format('Y-m-d'),
                ]);

                Log::info('Contrato creado:', $contrato->toArray());

                $contratoDetalle = $contrato->detalle()->create([
                    'oferta_laboral' => $request->oferta_laboral ?? '',
                    'motivo_contrato' => $request->motivo_contrato ?? '',
                    'evidencia_documentaria' => $request->evidencia_documentaria ?? '',
                    // ... otros campos con valores por defecto
                ]);

                Log::info('Detalle de contrato creado:', $contratoDetalle->toArray());

                DB::commit();

                return response()->json([
                    'success' => true,
                    'message' => 'Contrato creado exitosamente',
                    'data' => [
                        'contrato' => $contrato,
                        'detalle' => $contratoDetalle
                    ]
                ], Response::HTTP_CREATED);

            } catch (\Exception $e) {
                DB::rollback();
                Log::error('Error al crear el contrato o detalle: ' . $e->getMessage());
                Log::error('Stack trace: ' . $e->getTraceAsString());
                throw $e;
            }

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Error de validación: ' . json_encode($e->errors()));
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors' => $e->errors()
            ], Response::HTTP_BAD_REQUEST);

        } catch (\Exception $e) {
            Log::error('Error general: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el contrato: ' . $e->getMessage(),
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}
