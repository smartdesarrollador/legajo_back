<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Empleador;
use App\Models\Trabajador;
use App\Models\EstadoContrato;
use App\Models\JornadaLaboral;
use App\Models\Cargo;
use App\Models\Funciones;
use App\Models\RegimenLaboral;
use App\Models\TipoContrato;

class Contrato extends Model
{
    use HasFactory;

    protected $table = 'contrato';
    protected $primaryKey = 'id_contrato';

    protected $fillable = [
        'id_empleador', 'id_trabajador', 'id_estado_contrato', 'id_jornada_laboral', 
        'id_cargo', 'id_funciones', 'id_regimen_laboral', 'id_tipo_contrato', 'fecha_inicio', 
        'fecha_fin', 'observacion'
    ];

    public function empleador()
    {
        return $this->belongsTo(Empleador::class, 'id_empleador');
    }

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'id_trabajador');
    }

    // Relación con EstadoContrato
    public function estadoContrato()
    {
        return $this->belongsTo(EstadoContrato::class, 'id_estado_contrato');
    }

    // Relación con JornadaLaboral
    public function jornadaLaboral()
    {
        return $this->belongsTo(JornadaLaboral::class, 'id_jornada_laboral');
    }

    // Relación con Cargo
    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'id_cargo');
    }

    // Relación con Funciones
    public function funciones()
    {
        return $this->belongsTo(Funciones::class, 'id_funciones');
    }

    // Relación con RégimenLaboral
    public function regimenLaboral()
    {
        return $this->belongsTo(RegimenLaboral::class, 'id_regimen_laboral');
    }

    // Relación con TipoContrato
    public function tipoContrato()
    {
        return $this->belongsTo(TipoContrato::class, 'id_tipo_contrato');
    }
}
