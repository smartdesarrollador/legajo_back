<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegimenPensionesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_regimen_pensiones' => $this->id_regimen_pensiones,
            'regimen_pensiones' => $this->regimen_pensiones,
        ];
    }
}
