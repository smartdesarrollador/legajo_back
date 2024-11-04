<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LicenciaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_licencia' => $this->id_licencia,
            'fecha_emision' => $this->fecha_emision,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'jefe_vacaciones' => $this->jefe_vacaciones,
            'motivo' => $this->motivo,

            // Relación con Área
            'area' => new AreaResource($this->whenLoaded('area')),

            // Relación con Trabajador
            'trabajador' => new TrabajadorResource($this->whenLoaded('trabajador')),

            // Relación con Estado de Permiso
            'estado_permiso' => new EstadoPermisoResource($this->whenLoaded('estadoPermiso')),
        ];
    }
}
