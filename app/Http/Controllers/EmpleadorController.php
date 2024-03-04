<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleador;
use App\Http\Requests\EmpleadorRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class EmpleadorController extends Controller
{
    public function index()
    {
        $empleadores = Empleador::all();
        return response()->json($empleadores, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmpleadorRequest $request)
    {
        $empleadores=Empleador::create($request->all());
        return response()->json([
            'message'=>"Registro creado satisfactoriamente",
            'category'=>$empleadores
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $empleador = Empleador::find($id);

        if (!$empleador) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        return response()->json($empleador, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmpleadorRequest $request, string $id)
    {
        $empleador=Empleador::find($id);
        $empleador->update($request->only('empleador','ruc','domicilio','representante_legal','dni_representante_legal','numero_partida_poderes','numero_asiento','oficiona_registral','numero_partida_registral'));
        return response()->json([
            'message'=>"Registro actualizado satisfactoriamente",
            'category'=>$empleador
        ],Response::HTTP_CREATED);


        $empleadores=Empleador::create($request->all());
        return response()->json([
            'message'=>"Registro creado satisfactoriamente",
            'category'=>$empleadores
        ],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function ultimo_empleador()
    {
$ultimoRegistro = Empleador::latest('id_empleador')->first(); // Obtiene el último registro ordenado por el campo 'id' de manera descendente

    if ($ultimoRegistro) {
        $ultimoId = $ultimoRegistro->id_empleador; // Obtiene el ID del último registro
        return response()->json(['id_empleador' => $ultimoId]);
    } else {
        return response()->json(['mensaje' => 'No se encontraron registros en la tabla empleador'], 404);
    }
    }

     public function actividad_ultimo_empleador()
    {
  $empleadosConActividad = DB::table('empleadores')
            ->join('actividades_economicas', 'empleadores.id_actividad_economica', '=', 'actividades_economicas.id_actividad_economica')
            ->orderBy('empleadores.id_empleador', 'desc')
            ->select('empleadores.empleador','empleadores.ruc','empleadores.domicilio','empleadores.representante_legal','empleadores.dni_representante_legal','empleadores.cargo_representante_legal','empleadores.numero_partida_poderes','empleadores.numero_asiento','empleadores.oficina_registral','empleadores.numero_partida_registral', 'actividades_economicas.actividad_economica')
            ->first();

        return response()->json($empleadosConActividad);
    }
}
