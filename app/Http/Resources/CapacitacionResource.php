<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CapacitacionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_capacitacion' => $this->id_capacitacion,
            'capacitacion' => $this->capacitacion,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'observacion' => $this->observacion,

            // Relación con Empleador
            'empleador' => new EmpleadorResource($this->whenLoaded('empleador')),

            // Relación con Trabajador
            'trabajador' => new TrabajadorResource($this->whenLoaded('trabajador')),

            // Relación con Curso
            'curso' => new CursoResource($this->whenLoaded('curso')),

            // Relación con Estado de Evaluación
            'estado_evaluacion' => new EstadoEvaluacionResource($this->whenLoaded('estadoEvaluacion')),

            // Relación con Documento
            'documento' => new DocumentoResource($this->whenLoaded('documento')),

            // Relación con Instructor
            'instructor' => new InstructorResource($this->whenLoaded('instructor')),
        ];
    }
}
