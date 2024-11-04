<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Empleador;
use App\Http\Resources\EmpleadorResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Models\EmpleadorRegimenLaboral;
use Illuminate\Support\Facades\Log;

class EmpleadorController extends Controller
{
    // Mostrar todos los empleadores
    // Mostrar todos los empleadores
public function index()
{
    try {
        $empleadores = Empleador::with('actividadEconomica','tipoEmpleador', 'trabajadores', 'user')->get();
        return response()->json([
            'success' => true,
            'data' => EmpleadorResource::collection($empleadores),
        ], Response::HTTP_OK);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'error' => 'Error al obtener la lista de empleadores',
            'details' => $e->getMessage(),
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}


    // Mostrar un empleador específico
    // Mostrar un empleador específico
public function show($id)
{
    try {
        $empleador = Empleador::with('actividadEconomica', 'trabajadores', 'user')->findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => new EmpleadorResource($empleador),
        ], Response::HTTP_OK);
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return response()->json([
            'success' => false,
            'error' => 'Empleador no encontrado',
        ], Response::HTTP_NOT_FOUND);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'error' => 'Error al obtener el empleador',
            'details' => $e->getMessage(),
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}


    // Crear un nuevo empleador
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'empleador' => 'required|string|max:200',
            'ruc' => 'required|string|max:20|unique:empleadores',
            'domicilio' => 'required|string|max:500',
            'representante_legal' => 'required|string|max:200',
            // Añade más validaciones según sea necesario
        ]);

        try {
            $empleador = Empleador::create($validatedData);
            return response()->json(new EmpleadorResource($empleador), Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear el empleador', 'details' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Actualizar un empleador existente
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'empleador' => 'sometimes|required|string|max:200',
            'ruc' => 'sometimes|required|string|max:20|unique:empleadores,ruc,' . $id,
            'domicilio' => 'sometimes|required|string|max:500',
            'representante_legal' => 'sometimes|required|string|max:200',
            // Añade más validaciones según sea necesario
        ]);

        try {
            $empleador = Empleador::findOrFail($id);
            $empleador->update($validatedData);
            return response()->json(new EmpleadorResource($empleador), Response::HTTP_OK);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Empleador no encontrado'], Response::HTTP_NOT_FOUND);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar el empleador', 'details' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Eliminar un empleador
    public function destroy($id)
    {
        try {
            $empleador = Empleador::findOrFail($id);
            $empleador->delete();
            return response()->json(['message' => 'Empleador eliminado exitosamente'], Response::HTTP_NO_CONTENT);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Empleador no encontrado'], Response::HTTP_NOT_FOUND);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al eliminar el empleador', 'details' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
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
  $empleadosConActividad = DB::table('empleador')
            ->join('actividades_economicas', 'empleador.id_actividad_economica', '=', 'actividades_economicas.id_actividad_economica')
            ->orderBy('empleador.id_empleador', 'desc')
            ->select('empleador.empleador','empleador.ruc','empleador.domicilio','empleador.representante_legal','empleador.dni_representante_legal','empleador.cargo_representante_legal','empleador.numero_partida_poderes','empleador.numero_asiento','empleador.oficina_registral','empleador.numero_partida_registral', 'actividades_economicas.actividad_economica')
            ->first();

        return response()->json($empleadosConActividad);
    }

   public function showByLoggedUser(Request $request)
{
    try {
        $user = $request->user(); // Obtiene el usuario autenticado

        if (!$user) {
            return response()->json(['error' => 'Usuario no autenticado'], Response::HTTP_UNAUTHORIZED);
        }

        // Busca el empleador asociado al usuario autenticado
        $empleador = Empleador::where('id_user', $user->id)
            ->with('actividadEconomica', 'trabajadores', 'user')
            ->firstOrFail();

        // Devuelve el empleador utilizando el resource
        return response()->json(new EmpleadorResource($empleador), Response::HTTP_OK);

    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return response()->json(['error' => 'Empleador no encontrado'], Response::HTTP_NOT_FOUND);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error al obtener el empleador asociado al usuario'], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}

// Relacion Muchos a Muchos opcion 1
/* public function getRegimenLaboral($id)
{
    try {
        // Busca el empleador y carga el régimen laboral relacionado
        $empleador = Empleador::with('regimenLaboral')->findOrFail($id);

        // Retorna el régimen laboral asociado al empleador
        return response()->json($empleador->regimenLaboral, Response::HTTP_OK);
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return response()->json(['error' => 'Empleador no encontrado'], Response::HTTP_NOT_FOUND);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error al obtener el régimen laboral', 'details' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
} */

// Relacion Muchos a Muchos opcion 2
public function getRegimenLaboralFromIntermedia($id)
{
    try {
        // Busca el empleador y sus relaciones en la tabla intermedia
        $empleadorRegimenLaboral = EmpleadorRegimenLaboral::where('id_empleador', $id)->with('regimenLaboral')->get();

        return response()->json($empleadorRegimenLaboral, Response::HTTP_OK);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error al obtener el régimen laboral desde la tabla intermedia', 'details' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}

public function getEmpleadorByUserId($id_user)
{
    try {
        Log::info('Buscando empleador para el id_user: ' . $id_user);

        // Busca el empleador relacionado con el id_user y carga su relación con empleadorRegimenLaboral y regimenLaboral
        $empleador = Empleador::where('id_user', $id_user)
            ->with('empleadorRegimenLaboral.regimenLaboral') // Carga la relación a través de EmpleadorRegimenLaboral
            ->first();

        // Verifica si se encontró el empleador
        if ($empleador) {
            return new EmpleadorResource($empleador);
        } else {
            return response()->json(['message' => 'Empleador no encontrado'], 404);
        }
    } catch (\Exception $e) {
        Log::error('Error al obtener el empleador: ' . $e->getMessage());

        // Retorna una respuesta de error con detalles adicionales para depuración
        return response()->json([
            'message' => 'Ocurrió un error al intentar obtener el empleador',
            'details' => $e->getMessage()
        ], 500);
    }
}

public function updateEmpleador(Request $request, $id)
{
    try {
        // Validar los datos entrantes
        $validatedData = $request->validate([
            'empleador' => 'required|string|max:255',
            'ruc' => 'required|string|max:20',
            'domicilio' => 'required|string|max:500',
            'representante_legal' => 'required|string|max:255',
            'dni_representante_legal' => 'required|string|max:20',
            'cargo_representante_legal' => 'nullable|string|max:200',
            'numero_partida_poderes' => 'nullable|string|max:20',
            'numero_asiento' => 'nullable|string|max:20',
            'oficina_registral' => 'nullable|string|max:200',
            'numero_partida_registral' => 'nullable|string|max:50',
            'fecha_inicio_actividades' => 'nullable|date',
            'id_regimen_laboral' => 'nullable|integer|exists:regimen_laboral,id_regimen_laboral', // Validación para id_regimen_laboral
        ]);

        // Buscar el empleador por su ID
        $empleador = Empleador::findOrFail($id);

        // Actualizar los campos del empleador
        $empleador->update($validatedData);

        // Actualizar la relación con RegimenLaboral si se proporciona un id_regimen_laboral
        if ($request->has('id_regimen_laboral')) {
            // Obtener el ID del régimen laboral desde la solicitud
            $idRegimenLaboral = $validatedData['id_regimen_laboral'];

            // Actualizar la tabla empleador_regimen_laboral
            // Asumiendo que un empleador solo puede tener un registro activo de regimen laboral,
            // sincronizamos para actualizar la relación.
            $empleador->empleadorRegimenLaboral()->delete();
            $empleador->empleadorRegimenLaboral()->create([
                'id_regimen_laboral' => $idRegimenLaboral,
            ]);
        }

        // Retornar la respuesta utilizando el recurso EmpleadorResource
        return response()->json(new EmpleadorResource($empleador), Response::HTTP_OK);
    } catch (\Exception $e) {
        // Retornar un error 500 con el mensaje de la excepción
        return response()->json([
            'error' => 'Error al actualizar el empleador',
            'message' => $e->getMessage(),
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}



public function listarEmpleadores()
    {
        // Recupera todos los empleadores y aplica el recurso para transformar la respuesta.
        $empleadores = Empleador::with(['tipoEmpleador', 'actividadEconomica'])->get();

        return response()->json(EmpleadorResource::collection($empleadores));
    }

public function searchByName(Request $request)
    {
        $query = $request->input('empleador');

        // Recupera los empleadores que coincidan con el nombre proporcionado.
        $empleadores = Empleador::with(['tipoEmpleador', 'actividadEconomica'])
            ->where('empleador', 'LIKE', "%{$query}%")
            ->get();

        return response()->json(EmpleadorResource::collection($empleadores));
    }

    public function searchByType(Request $request)
    {
        $tipoEmpleadorId = $request->input('tipo_empleador');

        // Recupera los empleadores que coincidan con el tipo de empleador proporcionado.
        $empleadores = Empleador::with(['tipoEmpleador', 'actividadEconomica'])
            ->where('id_tipo_empleador', $tipoEmpleadorId)
            ->get();

        return response()->json(EmpleadorResource::collection($empleadores));
    }

    public function search(Request $request)
    {
        $query = $request->input('empleador');
        $tipoEmpleadorId = $request->input('tipo_empleador');

        // Construye la consulta dependiendo de los parámetros proporcionados.
        $empleadores = Empleador::with(['tipoEmpleador', 'actividadEconomica'])
            ->when($query, function ($q) use ($query) {
                $q->where('empleador', 'LIKE', "%{$query}%");
            })
            ->when($tipoEmpleadorId, function ($q) use ($tipoEmpleadorId) {
                $q->where('id_tipo_empleador', $tipoEmpleadorId);
            })
            ->get();

        return response()->json(EmpleadorResource::collection($empleadores));
    }
}
