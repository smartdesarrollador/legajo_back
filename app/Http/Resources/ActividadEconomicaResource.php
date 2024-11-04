<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ActividadEconomicaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_actividad_economica' => $this->id_actividad_economica,
            'actividad_economica' => $this->actividad_economica,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
