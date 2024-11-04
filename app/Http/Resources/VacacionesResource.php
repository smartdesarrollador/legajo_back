<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VacacionesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_vacaciones' => $this->id_vacaciones,
            'fecha_solicitud' => $this->fecha_solicitud,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'dias' => $this->dias,

            // Relación con Tipo de Vacaciones
            'tipo_vacaciones' => new TipoVacacionesResource($this->whenLoaded('tipoVacaciones')),

            // Relación con Trabajador
            'trabajador' => new TrabajadorResource($this->whenLoaded('trabajador')),
        ];
    }
}
