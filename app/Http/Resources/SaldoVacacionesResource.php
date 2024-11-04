<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SaldoVacacionesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_saldo_vacaciones' => $this->id_saldo_vacaciones,
            'anno' => $this->anno,
            'dias_acumulados' => $this->dias_acumulados,
            'dias_vencidos' => $this->dias_vencidos,
            'dias_usados' => $this->dias_usados,
            'saldo_vacaciones' => $this->saldo_vacaciones,

            // Relación con Trabajador
            'trabajador' => new TrabajadorResource($this->whenLoaded('trabajador')),
        ];
    }
}
