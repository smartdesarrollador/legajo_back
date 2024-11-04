<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Trabajador;
use App\Models\TipoVacaciones;

class Vacaciones extends Model
{
    use HasFactory;

    protected $table = 'vacaciones';
    protected $primaryKey = 'id_vacaciones';

    protected $fillable = [
        'fecha_solicitud', 'fecha_inicio', 'fecha_fin', 'dias', 'id_tipo_vacaciones', 'id_trabajador'
    ];

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'id_trabajador');
    }

    public function tipoVacaciones()
    {
        return $this->belongsTo(TipoVacaciones::class, 'id_tipo_vacaciones');
    }
}
