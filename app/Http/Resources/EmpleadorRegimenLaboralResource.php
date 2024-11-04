<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmpleadorRegimenLaboralResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_empleador_regimen_laboral' => $this->id_empleador_regimen_laboral,
            'empleador_regimen_laboral' => $this->empleador_regimen_laboral,

            // Relación con Empleador
            'empleador' => new EmpleadorResource($this->whenLoaded('empleador')),

            // Relación con Régimen Laboral
            'regimen_laboral' => new RegimenLaboralResource($this->whenLoaded('regimenLaboral')),
        ];
    }
}
