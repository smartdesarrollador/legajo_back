<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FAcumulacionVacacionesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_f_acumulacion_vacaciones' => $this->id_f_acumulacion_vacaciones,
            'fecha_acumulacion' => $this->fecha_acumulacion,
            'dias_acumulados' => $this->dias_acumulados,
            'periodo_acumulado' => $this->periodo_acumulado,
            'nro_dias_acumulados' => $this->nro_dias_acumulados,

            // Relación con Vacaciones
            'vacaciones' => new VacacionesResource($this->whenLoaded('vacaciones')),
        ];
    }
}
