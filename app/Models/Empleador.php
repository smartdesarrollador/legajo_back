<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Documento;
use App\Models\Trabajador;
use App\Models\sector;
use App\Models\ubigeo;
use App\Models\ActividadEconomica;
use App\Models\User;
use App\Models\TipoEmpleador;
class Empleador extends Model
{
    use HasFactory;

    protected $table = 'empleador';
    protected $primaryKey = 'id_empleador';

    protected $fillable = [
        'empleador', 'ruc', 'dni_representante_legal', 'domicilio', 'id_ubigeo', 'id_sector', 'id_actividad_economica', 
        'representante_legal', 'cargo_representante_legal', 'numero_partida_poderes',
        'numero_asiento', 'oficina_registral', 'numero_partida_registral', 'fecha_inicio_actividades'
    ];

  

    public function sector()
    {
        return $this->belongsTo(Sector::class, 'id_sector');
    }

    public function ubigeo()
    {
        return $this->belongsTo(Ubigeo::class, 'id_ubigeo');
    }

    // Empleador.php
public function actividadEconomica()
{
    return $this->belongsTo(ActividadEconomica::class, 'id_actividad_economica');
}

  public function trabajadores()
    {
        return $this->hasMany(Trabajador::class, 'id_empleador');
    }

    public function documentos()
    {
        return $this->hasMany(Documento::class, 'id_empleador');
    }

public function user()
{
    return $this->belongsTo(User::class, 'id_user'); // Reemplaza 'user_id' por el nombre correcto de la clave foránea si es diferente
}


// Relacion Muchos a Muchos opcion 2
public function empleadorRegimenLaboral()
{
    return $this->hasMany(EmpleadorRegimenLaboral::class, 'id_empleador');
}

public function tipoEmpleador()
    {
        return $this->belongsTo(TipoEmpleador::class, 'id_tipo_empleador');
    }

// Relacion Muchos a Muchos opcion 1
/* public function regimenLaboral()
{
    return $this->belongsToMany(RegimenLaboral::class, 'empleador_regimen_laboral', 'id_empleador', 'id_regimen_laboral');
} */




}
