<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Empleador;
use App\Models\Trabajador;
use App\Models\Curso;
class Capacitacion extends Model
{
    use HasFactory;

    protected $table = 'capacitacion';
    protected $primaryKey = 'id_capacitacion';

    protected $fillable = [
        'capacitacion', 'id_empleador', 'id_trabajador', 'id_curso', 'id_estado_evaluacion', 
        'id_documento', 'id_instructor', 'fecha_inicio', 'fecha_fin', 'observacion'
    ];

    public function empleador()
    {
        return $this->belongsTo(Empleador::class, 'id_empleador');
    }

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'id_trabajador');
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'id_curso'); // Asegúrate de que 'id_curso' es el nombre de la clave foránea correcta
    }

    public function estadoEvaluacion()
    {
        return $this->belongsTo(EstadoEvaluacion::class, 'id_estado_evaluacion'); 
        // Asegúrate de que 'id_estado_evaluacion' es el nombre de la clave foránea correcta en tu tabla de capacitaciones
    }

    public function documento()
    {
        return $this->belongsTo(Documento::class, 'id_documento'); 
        // Asegúrate de que 'id_documento' es el nombre correcto de la clave foránea en tu tabla de capacitaciones
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'id_instructor');
        // Asegúrate de que 'id_instructor' es la clave foránea en la tabla `capacitaciones`
    }
}
