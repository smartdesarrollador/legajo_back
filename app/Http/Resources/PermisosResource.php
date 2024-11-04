<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PermisosResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_permiso' => $this->id_permiso,
            'permiso' => $this->permiso,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'horas' => $this->horas,
            'jefe_inmediato' => $this->jefe_inmediato,
            'motivo' => $this->motivo,
            'adjunto' => $this->adjunto,

            // Relación con Área
            'area' => new AreaResource($this->whenLoaded('area')),

            // Relación con Trabajador
            'trabajador' => new TrabajadorResource($this->whenLoaded('trabajador')),

            // Relación con Estado de Permiso
            'estado_permiso' => new EstadoPermisoResource($this->whenLoaded('estadoPermiso')),
        ];
    }
}
