<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FeriadoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_feriado' => $this->id_feriado,
            'feriado' => $this->feriado,
            'fecha' => $this->fecha,

            // Relación con Año
            'anno' => new AnnoResource($this->whenLoaded('anno')),
        ];
    }
}
