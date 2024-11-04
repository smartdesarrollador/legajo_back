<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SaldoVacaciones;
use App\Http\Resources\SaldoVacacionesResource;
use Illuminate\Http\Response;

class SaldoVacacionesController extends Controller
{
    // Listar todos los saldos de vacaciones
    public function index()
    {
        try {
            $saldos = SaldoVacaciones::with('trabajador')->get();
            return response()->json([
                'success' => true,
                'message' => 'Lista de saldos de vacaciones obtenida exitosamente.',
                'data' => SaldoVacacionesResource::collection($saldos)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la lista de saldos de vacaciones.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Crear un nuevo saldo de vacaciones
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'anno' => 'required|integer',
            'dias_acumulados' => 'required|numeric',
            'dias_vencidos' => 'required|numeric',
            'dias_usados' => 'required|numeric',
            'saldo_vacaciones' => 'required|numeric',
            'id_trabajador' => 'required|exists:trabajadores,id_trabajador',
        ]);

        try {
            $saldo = SaldoVacaciones::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Saldo de vacaciones creado exitosamente.',
                'data' => new SaldoVacacionesResource($saldo)
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el saldo de vacaciones.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Mostrar un saldo de vacaciones específico
    public function show($id)
    {
        try {
            $saldo = SaldoVacaciones::with('trabajador')->findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Saldo de vacaciones obtenido exitosamente.',
                'data' => new SaldoVacacionesResource($saldo)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el saldo de vacaciones.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar un saldo de vacaciones
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'anno' => 'required|integer',
            'dias_acumulados' => 'required|numeric',
            'dias_vencidos' => 'required|numeric',
            'dias_usados' => 'required|numeric',
            'saldo_vacaciones' => 'required|numeric',
            'id_trabajador' => 'required|exists:trabajadores,id_trabajador',
        ]);

        try {
            $saldo = SaldoVacaciones::findOrFail($id);
            $saldo->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Saldo de vacaciones actualizado exitosamente.',
                'data' => new SaldoVacacionesResource($saldo)
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el saldo de vacaciones.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar un saldo de vacaciones
    public function destroy($id)
    {
        try {
            $saldo = SaldoVacaciones::findOrFail($id);
            $saldo->delete();
            return response()->json([
                'success' => true,
                'message' => 'Saldo de vacaciones eliminado exitosamente.'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el saldo de vacaciones.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
