<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FReduccionVacacionesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_f_reduccion_vacaciones' => $this->id_f_reduccion_vacaciones,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'periodo_inicio_laboral' => $this->periodo_inicio_laboral,
            'periodo_fin_laboral' => $this->periodo_fin_laboral,
            'nro_dias_reduccion' => $this->nro_dias_reduccion,

            // Relación con Vacaciones
            'vacaciones' => new VacacionesResource($this->whenLoaded('vacaciones')),
        ];
    }
}
