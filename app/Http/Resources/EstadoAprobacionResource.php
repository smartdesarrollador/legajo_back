<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EstadoAprobacionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_estado_aprobacion' => $this->id_estado_aprobacion,
            'estado_aprobacion' => $this->estado_aprobacion,
            'aprobado_por' => $this->aprobado_por,
            'cargo' => $this->cargo,
            'fecha_aprobacion' => $this->fecha_aprobacion,
            'comentario' => $this->comentario,

            // Relación con Vacaciones
            'vacaciones' => new VacacionesResource($this->whenLoaded('vacaciones')),
        ];
    }
}
