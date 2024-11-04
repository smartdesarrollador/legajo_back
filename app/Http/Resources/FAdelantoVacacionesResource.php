<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FAdelantoVacacionesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_f_adelanto_vacaciones' => $this->id_f_adelanto_vacaciones,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'periodo_actual' => $this->periodo_actual,
            'periodo_restante' => $this->periodo_restante,
            'dias_adelantados' => $this->dias_adelantados,

            // Relación con Vacaciones
            'vacaciones' => new VacacionesResource($this->whenLoaded('vacaciones')),
        ];
    }
}
