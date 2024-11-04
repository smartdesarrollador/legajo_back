<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ActividadDenunciaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_actividad_denuncia' => $this->id_actividad_denuncia,
            'actividad_denuncia' => $this->actividad_denuncia,
        ];
    }
}
