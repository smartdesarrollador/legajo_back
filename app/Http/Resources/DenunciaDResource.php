<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DenunciaDResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_denuncia_d' => $this->id_denuncia_d,
            'detalle_denuncia' => $this->detalle_denuncia,
            'secuencia' => $this->secuencia,

            // Relación con Denuncia
            'denuncia' => new DenunciaResource($this->whenLoaded('denuncia')),

            // Relación con Actividad Denuncia
            'actividad_denuncia' => new ActividadDenunciaResource($this->whenLoaded('actividadDenuncia')),

            // Relación con Documento
            'documento' => new DocumentoResource($this->whenLoaded('documento')),
        ];
    }
}
