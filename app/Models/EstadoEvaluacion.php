<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Capacitacion;

class EstadoEvaluacion extends Model
{
    use HasFactory;

    protected $table = 'estado_evaluacion';
    protected $primaryKey = 'id_estado_evaluacion';

    protected $fillable = ['estado_evaluacion'];

    public function capacitaciones()
    {
        return $this->hasMany(Capacitacion::class, 'id_estado_evaluacion');
    }
}
