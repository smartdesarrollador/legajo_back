<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TipoEmpleadorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_tipo_empleador' => $this->id_tipo_empleador,
            'tipo_empleador' => $this->tipo_empleador,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
