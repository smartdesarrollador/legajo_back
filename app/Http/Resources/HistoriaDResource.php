<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HistoriaDResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_historia_d' => $this->id_historia_d,
            'comentario' => $this->comentario,

            // Relación con Historia
            'historia' => new HistoriaResource($this->whenLoaded('historia')),

            // Relación con Documento
            'documento' => new DocumentoResource($this->whenLoaded('documento')),

            // Relación con Situación
            'situacion' => new SituacionResource($this->whenLoaded('situacion')),
        ];
    }
}
