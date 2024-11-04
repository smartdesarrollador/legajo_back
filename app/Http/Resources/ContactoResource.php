<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_contacto' => $this->id_contacto,
            'contacto' => $this->contacto,
            'telefono' => $this->telefono,
            'celular' => $this->celular,
            'correo' => $this->correo,

            // Relación con Empleador
            'empleador' => new EmpleadorResource($this->whenLoaded('empleador')),

            // Relación con Tipo de Contacto
            'tipo_contacto' => new TipoContactoResource($this->whenLoaded('tipoContacto')),

            // Relación con Área
            'area' => new AreaResource($this->whenLoaded('area')),
        ];
    }
}
