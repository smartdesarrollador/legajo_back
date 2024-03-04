<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Contrato;
use App\Models\Trabajador;
use App\Models\Documento;
use App\Models\Ubigeo;
use App\Models\Sector;
use App\Models\ActividadEconomica;
use App\Models\User;

class Empleador extends Model
{
    use HasFactory;

    protected $table = 'empleadores';

    protected $primaryKey = 'id_empleador';

    protected $fillable = ['empleador','ruc','domicilio','representante_legal','dni_representante_legal','cargo_representante_legal','numero_partida_poderes','numero_partida_poderes','numero_asiento','oficina_registral','numero_partida_registral','fecha_inicio_actividadess','id_actividad_economica'];

    public function contrato()
    {
        return $this->hasMany(Contrato::class, 'id_empleador', 'id_empleador');
    }

    public function trabajador()
    {
        return $this->hasMany(Trabajador::class, 'id_empleador', 'id_empleador');
    }

    public function documento()
    {
        return $this->hasMany(Documento::class, 'id_empleador', 'id_empleador');
    }

    

 /*   public function ubigeo()
    {
        return $this->belongsTo(Ubigeo::class, 'id_ubigeo', 'id_ubigeo');
    } */

    /* public function sector()
    {
        return $this->belongsTo(Sector::class, 'id_sector', 'id_sector');
    } */

    public function actividadEconomica()
    {
        return $this->belongsTo(ActividadEconomica::class, 'id_actividad_economica');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }



}
