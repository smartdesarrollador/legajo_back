<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Trabajador;
use App\Models\Area;

class Permiso extends Model
{
    use HasFactory;

    protected $table = 'permiso';
    protected $primaryKey = 'id_permiso';

    protected $fillable = [
        'permiso', 'fecha_inicio', 'fecha_fin', 'horas', 'id_area', 'id_trabajador', 'jefe_inmediato', 
        'motivo', 'adjunto', 'id_estado_permiso'
    ];

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'id_trabajador');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'id_area');
    }

    public function estadoPermiso()
    {
        return $this->belongsTo(EstadoPermiso::class, 'id_estado_permiso');
    }
}
