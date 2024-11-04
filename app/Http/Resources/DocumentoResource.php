<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DocumentoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_documento' => $this->id_documento,
            'documento' => $this->documento,
            'resumen' => $this->resumen,
            'version' => $this->version,
            'fecha_version' => $this->fecha_version,
            'archivo' => $this->archivo,

            // Relación con Empleador
            'empleador' => new EmpleadorResource($this->whenLoaded('empleador')),
        ];
    }
}
