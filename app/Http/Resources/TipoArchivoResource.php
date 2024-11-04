<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TipoArchivoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_tipo_archivo' => $this->id_tipo_archivo,
            'tipo_archivo' => $this->tipo_archivo,
            'icono' => $this->icono,
        ];
    }
}
