<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegimenLaboralResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_regimen_laboral' => $this->id_regimen_laboral,
            'regimen_laboral' => $this->regimen_laboral,
        ];
    }
}
