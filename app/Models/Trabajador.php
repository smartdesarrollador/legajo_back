<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Empleador;
use App\Models\Cargo;
use App\Models\TipoDocumento;
use App\Models\Ubigeo;
use App\Models\Ocupacion;
use App\Models\TipoContrato;
use App\Models\jornadaLaboral;
use App\Models\estadoTrabajador;
use App\Models\nivelEducativo;
use App\Models\regimenSalud;
use App\Models\regimenPensiones;
use App\Models\Afp;
use App\Models\RegimenLaboral;
use App\Models\Contrato;


class Trabajador extends Model
{
    use HasFactory;

    protected $table = 'trabajador';
    protected $primaryKey = 'id_trabajador';

    protected $fillable = [
        'paterno', 'materno', 'primer', 'segundo', 'id_tipo_documento', 'numero_documento',
        'fecha_nacimiento', 'ruc', 'direccion', 'id_ubigeo', 'telefono', 'celular', 'correo',
        'id_empleador', 'id_regimen_laboral', 'id_ocupacion', 'id_tipo_contrato', 'id_cargo', 'id_area',
        'es_jefe', 'id_jornada_laboral', 'id_estado_trabajador', 'fecha_estado', 'id_nivel_educativo',
        'id_regimen_salud', 'id_regimen_pensiones', 'id_afp', 'cuspp', 'es_discapacitado',
        'es_sindicalizado', 'fecha_ingreso', 'saldo_inicial_vacaciones'
    ];

    // Relación con Empleador
    public function empleador()
    {
        return $this->belongsTo(Empleador::class, 'id_empleador');
    }

    // Relación con Cargo
    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'id_cargo');
    }

    // Relación con Régimen Laboral
    public function regimenLaboral()
    {
        return $this->belongsTo(RegimenLaboral::class, 'id_regimen_laboral');
    }

    // Relación con Tipo Documento
    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'id_tipo_documento');
    }

    // Relación con Ubigeo
    public function ubigeo()
    {
        return $this->belongsTo(Ubigeo::class, 'id_ubigeo');
    }

    // Relación con Ocupación
    public function ocupacion()
    {
        return $this->belongsTo(Ocupacion::class, 'id_ocupacion');
    }

    // Relación con Tipo de Contrato
    public function tipoContrato()
    {
        return $this->belongsTo(TipoContrato::class, 'id_tipo_contrato');
    }

    // Relación con Jornada Laboral
    public function jornadaLaboral()
    {
        return $this->belongsTo(JornadaLaboral::class, 'id_jornada_laboral');
    }

    // Relación con Estado Trabajador
    public function estadoTrabajador()
    {
        return $this->belongsTo(EstadoTrabajador::class, 'id_estado_trabajador');
    }

    // Relación con Nivel Educativo
    public function nivelEducativo()
    {
        return $this->belongsTo(NivelEducativo::class, 'id_nivel_educativo');
    }

    // Relación con Régimen de Salud
    public function regimenSalud()
    {
        return $this->belongsTo(RegimenSalud::class, 'id_regimen_salud');
    }

    // Relación con Régimen de Pensiones
    public function regimenPensiones()
    {
        return $this->belongsTo(RegimenPensiones::class, 'id_regimen_pensiones');
    }

    // Relación con AFP
    public function afp()
    {
        return $this->belongsTo(Afp::class, 'id_afp');
    }

     public function area()
    {
        return $this->belongsTo(Area::class, 'id_area');
    }

    
    public function contrato()
    {
        return $this->belongsTo(Contrato::class, 'id_contrato');
    }
}
