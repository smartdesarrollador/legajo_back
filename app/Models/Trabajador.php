<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\TipoDocumento;
//use App\Models\Ubigeo;
use App\Models\Empleador;
//use App\Models\RegimenLaboral;
//use App\Models\Ocupacion;
use App\Models\TipoContrato;
//use App\Models\JornadaLaboral;
//use App\Models\EstadoTrabajador;
//use App\Models\NivelEducativo;
//use App\Models\RegimenSalud;
//use App\Models\RegimenPensiones;
use App\Models\Afp;
//use App\Models\MotivoBAja;
use App\Models\Contrato;
use App\Models\User;

class Trabajador extends Model
{
    use HasFactory;

    protected $table = 'trabajadores';

    protected $primaryKey = 'id_trabajador';

    protected $fillable = ['trabajador', 'apellido_paterno','apellido_materno','primer_nombre','segundo_nombre','numero_documento','fecha_nacimiento','ruc','direccion','referencia','telefono','celular','correo','id_empleador','id_tipo_contrato','fecha_estado','id_afp','cuspp','es_discapacitado','es_sindicalizado','fecha_ingreso','fecha_egreso','fecha_baja'];

    public function contrato()
    {
        return $this->belongsToMany(Contrato::class, 'contrato_trabajadores', 'id_contrato', 'id_trabajador');
    }


    public function documento()
    {
        return $this->hasMany(Documento::class, 'id_trabajador', 'id_trabajador');
    }

    /* public function tipo_documento()
    {
        return $this->belongsTo(TipoDocumento::class, 'id_tipo_documento', 'id_tipo_documento');
    } */

    /* public function ubigeo()
    {
        return $this->belongsTo(Ubigeo::class, 'id_ubigeo', 'id_ubigeo');
    } */

    public function empleador()
    {
        return $this->belongsTo(Empleador::class, 'id_empleador', 'id_empleador');
    }

    /* public function regimen_laboral()
    {
        return $this->belongsTo(RegimenLaboral::class, 'id_regimen_laboral', 'id_regimen_laboral');
    } */

    /* public function ocupacion()
    {
        return $this->belongsTo(Ocupacion::class, 'id_ocupacion', 'id_ocupacion');
    } */

    public function tipo_contrato()
    {
        return $this->belongsTo(TipoContrato::class, 'id_tipo_contrato', 'id_tipo_contrato');
    }

    /* public function jornada_laboral()
    {
        return $this->belongsTo(JornadaLaboral::class, 'id_jornada_laboral', 'id_jornada_laboral');
    } */

    /* public function estado_trabajador()
    {
        return $this->belongsTo(EstadoTrabajador::class, 'id_estado_trabajador', 'id_estado_trabajador');
    } */

    /* public function nivel_educativo()
    {
        return $this->belongsTo(NivelEducativo::class, 'id_nivel_educativo', 'id_nivel_educativo');
    } */

    /* public function regimen_salud()
    {
        return $this->belongsTo(Regimen_salud::class, 'id_regimen_salud', 'id_regimen_salud');
    } */

    /* public function regimen_pensiones()
    {
        return $this->belongsTo(RegimenPension::class, 'id_regimen_pensiones', 'id_regimen_pensiones');
    } */

    public function afp()
    {
        return $this->belongsTo(Afp::class, 'id_afp', 'id_afp');
    }

    /* public function motivo_baja()
    {
        return $this->belongsTo(MotivoBaja::class, 'id_motivo_baja', 'id_motivo_baja');
    } */

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    

}
