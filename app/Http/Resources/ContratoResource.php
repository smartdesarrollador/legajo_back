<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContratoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_contrato' => $this->id_contrato,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'observacion' => $this->observacion,

            // Relación con Empleador
            'empleador' => new EmpleadorResource($this->whenLoaded('empleador')),

            // Relación con Trabajador
            'trabajador' => new TrabajadorResource($this->whenLoaded('trabajador')),

            // Relación con Estado de Contrato
            'estado_contrato' => new EstadoContratoResource($this->whenLoaded('estadoContrato')),

            // Relación con Jornada Laboral
            'jornada_laboral' => new JornadaLaboralResource($this->whenLoaded('jornadaLaboral')),

            // Relación con Cargo
            'cargo' => new CargoResource($this->whenLoaded('cargo')),

            // Relación con Funciones
            'funciones' => new FuncionesResource($this->whenLoaded('funciones')),

            // Relación con Régimen Laboral
            'regimen_laboral' => new RegimenLaboralResource($this->whenLoaded('regimenLaboral')),

            // Relación con Tipo de Contrato
            'tipo_contrato' => new TipoContratoResource($this->whenLoaded('tipoContrato')),
        ];
    }
}
