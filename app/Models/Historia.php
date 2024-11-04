<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Empleador;
use App\Models\Trabajador;
use App\Models\TipoHistoria;
use App\Models\Evento;
use App\Models\Accion;
use App\Models\Severidad;
use App\Models\HistoriaD;
class Historia extends Model
{
    use HasFactory;

    protected $table = 'historia';
    protected $primaryKey = 'id_historia';

    protected $fillable = [
        'id_empleador', 'id_trabajador', 'id_tipo_historia', 'id_evento', 'id_accion', 
        'id_severidad', 'fecha_inicio', 'fecha_fin', 'observacion'
    ];

    public function empleador()
    {
        return $this->belongsTo(Empleador::class, 'id_empleador');
    }

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'id_trabajador');
    }

    public function tipoHistoria()
    {
        return $this->belongsTo(TipoHistoria::class, 'id_tipo_historia');
    }

    public function evento()
    {
        return $this->belongsTo(Evento::class, 'id_evento');

    }

    public function accion()
    {
        return $this->belongsTo(Accion::class, 'id_accion');
    }

    public function severidad()
    {
        return $this->belongsTo(Severidad::class, 'id_severidad');
    }

    public function historiasD()
    {
        return $this->hasMany(HistoriaD::class, 'id_historia');
    }
}
