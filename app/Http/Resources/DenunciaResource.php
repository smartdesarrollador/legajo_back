<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DenunciaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_denuncia' => $this->id_denuncia,
            'fecha_denuncia' => $this->fecha_denuncia,
            'fecha_cierre' => $this->fecha_cierre,
            'numero_documento' => $this->numero_documento,

            // Relación con Tipo de Denuncia
            'tipo_denuncia' => new TipoDenunciaResource($this->whenLoaded('tipoDenuncia')),

            // Relación con Empleador
            'empleador' => new EmpleadorResource($this->whenLoaded('empleador')),

            // Relación con Trabajador
            'trabajador' => new TrabajadorResource($this->whenLoaded('trabajador')),

            // Relación con Estado de la Denuncia
            'estado_denuncia' => new EstadoDenunciaResource($this->whenLoaded('estadoDenuncia')),
        ];
    }
}
