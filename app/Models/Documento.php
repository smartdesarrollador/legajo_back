<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Empleador;
use App\Models\Trabajador;
use App\Models\Capacitacion;
use App\Models\Gestion;

class Documento extends Model
{
    use HasFactory;

    protected $table = 'documento';
    protected $primaryKey = 'id_documento';

    protected $fillable = [
        'documento', 'resumen', 'version', 'fecha_version', 'fecha_vencimiento', 'archivo',
        'filename', 'mimetype', 'actualizado', 'id_empleador', 'id_trabajador', 'id_usuario',
        'id_tipo_archivo', 'url_publico', 'id_clase_documento'
    ];

    public function empleador()
    {
        return $this->belongsTo(Empleador::class, 'id_empleador');
    }

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'id_trabajador');
    }

    public function capacitaciones()
    {
        return $this->hasMany(Capacitacion::class, 'id_documento');
    }

    public function gestiones()
    {
        return $this->hasMany(Gestion::class, 'id_documento');
    }

    public function historiasd()
    {
        return $this->hasMany(HistoriaD::class, 'id_documento');
    }
}
