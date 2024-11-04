<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PoliticaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_politica' => $this->id_politica,
            'politica' => $this->politica,
            'resumen' => $this->resumen,

            // Relación con Tipo de Política
            'tipo_politica' => new TipoPoliticaResource($this->whenLoaded('tipoPolitica')),

            // Relación con Empleador
            'empleador' => new EmpleadorResource($this->whenLoaded('empleador')),
        ];
    }
}
