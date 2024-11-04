<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PoliticaDResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_politica_d' => $this->id_politica_d,
            'secuencia' => $this->secuencia,
            'resumen' => $this->resumen,
            'enviar_correo' => $this->enviar_correo,
            'requiere_cargo' => $this->requiere_cargo,

            // Relación con Política
            'politica' => new PoliticaResource($this->whenLoaded('politica')),

            // Relación con Documento
            'documento' => new DocumentoResource($this->whenLoaded('documento')),

            // Relación con Actividad de Denuncia
            'actividad_denuncia' => new ActividadDenunciaResource($this->whenLoaded('actividadDenuncia')),
        ];
    }
}
