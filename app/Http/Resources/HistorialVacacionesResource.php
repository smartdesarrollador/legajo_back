<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HistorialVacacionesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_historial_vacaciones' => $this->id_historial_vacaciones,
            'historial_vacaciones' => $this->historial_vacaciones,
            'fecha' => $this->fecha,
            'dias' => $this->dias,
            'comentarios' => $this->comentarios,

            // Relación con Trabajador
            'trabajador' => new TrabajadorResource($this->whenLoaded('trabajador')),

            // Relación con Tipo de Movimiento
            'tipo_movimiento' => new TipoMovimientoResource($this->whenLoaded('tipoMovimiento')),
        ];
    }
}
