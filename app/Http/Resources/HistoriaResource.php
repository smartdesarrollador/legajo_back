<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HistoriaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_historia' => $this->id_historia,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'observacion' => $this->observacion,

            // Relación con Empleador
            'empleador' => new EmpleadorResource($this->whenLoaded('empleador')),

            // Relación con Trabajador
            'trabajador' => new TrabajadorResource($this->whenLoaded('trabajador')),

            // Relación con Tipo de Historia
            'tipo_historia' => new TipoHistoriaResource($this->whenLoaded('tipoHistoria')),

            // Relación con Evento
            'evento' => new EventoResource($this->whenLoaded('evento')),

            // Relación con Acción
            'accion' => new AccionResource($this->whenLoaded('accion')),

            // Relación con Severidad
            'severidad' => new SeveridadResource($this->whenLoaded('severidad')),
        ];
    }
}
