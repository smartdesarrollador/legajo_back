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
        // Validar los parámetros del request
        $request->validate([
            'fecha_desde' => 'required|date',
            'fecha_hasta' => 'required|date',
            'id_user' => 'required|integer'
        ]);

        // Obtener el trabajador usando el id_user
        $trabajador = DB::table('trabajador')
            ->where('id_user', $request->id_user)
            ->first();

        if (!$trabajador) {
            return response()->json([
                'success' => false,
                'message' => 'Trabajador no encontrado',
                'data' => null
            ], 404);
        }

        // Consulta principal con joins y filtros
        $licencias = DB::table('licencia')
            ->join('estado_permiso', 'licencia.id_estado_permiso', '=', 'estado_permiso.id_estado_permiso')
            ->where('licencia.id_trabajador', $trabajador->id_trabajador)
            ->whereBetween('licencia.fecha_inicio', [$request->fecha_desde, $request->fecha_hasta])
            ->select([
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
                    'ver_acuerdo' => url('/api/licencias/' . $licencia->id_licencia) // Cambiado a una URL directa
                ];
            });

        return response()->json([
            'success' => true,
            'message' => 'Licencias consultadas exitosamente',
            'data' => $licencias
        ], 200);

    } catch (ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error de validación',
            'errors' => $e->errors()
        ], 422);
    } catch (Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error al consultar licencias',
            'error' => $e->getMessage()
        ], 500);
    }
}
  
}
