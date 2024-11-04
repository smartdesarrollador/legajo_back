<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Trabajador;
use App\Models\Area;

class Licencia extends Model
{
    use HasFactory;

    protected $table = 'licencia';
    protected $primaryKey = 'id_licencia';

    protected $fillable = [
        'fecha_emision', 'fecha_inicio', 'fecha_fin', 'jefe_vacaciones', 'motivo', 'id_area', 
        'id_trabajador', 'id_estado_permiso'
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
