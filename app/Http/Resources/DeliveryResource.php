<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DeliveryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_delivery' => $this->id_delivery,
            'fecha_confirmacion' => $this->fecha_confirmacion,
            'confirmacion' => $this->confirmacion,

            // Relación con Empleador
            'empleador' => new EmpleadorResource($this->whenLoaded('empleador')),

            // Relación con Trabajador
            'trabajador' => new TrabajadorResource($this->whenLoaded('trabajador')),

            // Relación con Documento
            'documento' => new DocumentoResource($this->whenLoaded('documento')),

            // Relación con Notificación
            'notificacion' => new NotificacionResource($this->whenLoaded('notificacion')),
        ];
    }
}
