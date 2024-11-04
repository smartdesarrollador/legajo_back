<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\ActividadEconomicaResource;

class EmpleadorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_empleador' => $this->id_empleador,
            'empleador' => $this->empleador,
            'ruc' => $this->ruc,
            'domicilio' => $this->domicilio,
            'representante_legal' => $this->representante_legal,
            'dni_representante_legal' => $this->dni_representante_legal,
            'cargo_representante_legal' => $this->cargo_representante_legal,
            'numero_partida_poderes' => $this->numero_partida_poderes,
            'numero_asiento' => $this->numero_asiento,
            'oficina_registral' => $this->oficina_registral,
            'numero_partida_registral' => $this->numero_partida_registral,
            'fecha_inicio_actividades' => $this->fecha_inicio_actividades,

            // Relación con Actividad Económica
            'actividad_economica' => new ActividadEconomicaResource($this->whenLoaded('actividadEconomica')),

            'tipo_empleador' => new TipoEmpleadorResource($this->whenLoaded('tipoEmpleador')),

            // Relación con Trabajadores (si es necesario)
            'trabajadores' => TrabajadorResource::collection($this->whenLoaded('trabajadores')),

            // Relación con Usuario (si es necesario)
            'user' => new UserResource($this->whenLoaded('user')),

            // Relación con Regimen Laboral (opción 2)
            'regimen_laboral' => $this->empleadorRegimenLaboral
                ? RegimenLaboralResource::collection($this->empleadorRegimenLaboral->pluck('regimenLaboral'))
                : [],

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
