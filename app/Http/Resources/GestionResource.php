<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_gestion' => $this->id_gestion,
            'gestion' => $this->gestion,
            'fecha' => $this->fecha,

            // Relación con Periodo
            'periodo' => new PeriodoResource($this->whenLoaded('periodo')),

            // Relación con Documento
            'documento' => new DocumentoResource($this->whenLoaded('documento')),

            // Relación con Trabajador
            'trabajador' => new TrabajadorResource($this->whenLoaded('trabajador')),

            // Relación con Empleador
            'empleador' => new EmpleadorResource($this->whenLoaded('empleador')),

            // Relación con Clase de Documento
            'clase_documento' => new ClaseDocumentoResource($this->whenLoaded('claseDocumento')),
        ];
    }
}
