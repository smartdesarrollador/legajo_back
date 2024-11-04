<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TrabajadorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_trabajador' => $this->id_trabajador,
            'paterno' => $this->paterno,
            'materno' => $this->materno,
            'primer' => $this->primer,
            'segundo' => $this->segundo,
            'id_tipo_documento' => $this->id_tipo_documento,
            'numero_documento' => $this->numero_documento,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'ruc' => $this->ruc,
            'direccion' => $this->direccion,
            'referencia' => $this->referencia,
            'id_ubigeo' => $this->id_ubigeo,
            'telefono' => $this->telefono,
            'celular' => $this->celular,
            'correo' => $this->correo,
            'es_jefe' => $this->es_jefe,
            'fecha_ingreso' => $this->fecha_ingreso,
            'fecha_egreso' => $this->fecha_egreso,
            'fecha_baja' => $this->fecha_baja,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            // Relación con Area
            'area' => new AreaResource($this->whenLoaded('area')),

            // Relación con Cargo
            'cargo' => new CargoResource($this->whenLoaded('cargo')),

            // Relación con Tipo de Documento
            'tipo_documento' => new TipoDocumentoResource($this->whenLoaded('tipoDocumento')),

            // Relación con Ubigeo
            'ubigeo' => new UbigeoResource($this->whenLoaded('ubigeo')),

            // Relación con Empleador
            'empleador' => new EmpleadorResource($this->whenLoaded('empleador')),

            // Relación con Régimen Laboral
            'regimen_laboral' => new RegimenLaboralResource($this->whenLoaded('regimenLaboral')),

            // Relación con Ocupación
            'ocupacion' => new OcupacionResource($this->whenLoaded('ocupacion')),

            // Relación con Tipo de Contrato
            'tipo_contrato' => new TipoContratoResource($this->whenLoaded('tipoContrato')),

            // Relación con Jornada Laboral
            'jornada_laboral' => new JornadaLaboralResource($this->whenLoaded('jornadaLaboral')),

            // Relación con Estado Trabajador
            'estado_trabajador' => new EstadoTrabajadorResource($this->whenLoaded('estadoTrabajador')),

            // Relación con Nivel Educativo
            'nivel_educativo' => new NivelEducativoResource($this->whenLoaded('nivelEducativo')),

            // Relación con Régimen de Salud
            'regimen_salud' => new RegimenSaludResource($this->whenLoaded('regimenSalud')),

            // Relación con Régimen de Pensiones
            'regimen_pensiones' => new RegimenPensionesResource($this->whenLoaded('regimenPensiones')),

            // Relación con AFP
            'afp' => new AFPResource($this->whenLoaded('afp')),

            // Relación con Contrato
            'contrato' => new ContratoResource($this->whenLoaded('contrato')),
        ];
    }
}
