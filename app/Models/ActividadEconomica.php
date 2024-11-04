<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadEconomica extends Model
{
    use HasFactory;

    protected $table = 'actividades_economicas';
    protected $primaryKey = 'id_actividad_economica';

    protected $fillable = [
        'actividad_economica',
    ];

    // Relación con la tabla Empleador
    public function empleadores()
    {
        return $this->hasMany(Empleador::class, 'id_actividad_economica');
    }
}
