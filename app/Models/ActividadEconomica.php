<?php

namespace App\Models;
use App\Models\Empleador;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadEconomica extends Model
{
    use HasFactory;

    protected $table = 'actividades_economicas';

    protected $primaryKey = 'id_actividad_economica';

    public function empleados()
    {
        return $this->hasMany(Empleador::class, 'id_actividad_economica');
    }
}
