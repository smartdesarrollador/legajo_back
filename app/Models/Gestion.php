<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Periodo;
use App\Models\Documento;
use App\Models\Trabajador;
use App\Models\Empleador;
use App\Models\ClaseDocumento;

class Gestion extends Model
{
    use HasFactory;

    protected $table = 'gestion';
    protected $primaryKey = 'id_gestion';

    protected $fillable = [
        'gestion', 'id_periodo', 'id_documento', 'id_trabajador', 'id_empleador', 'id_clase_documento', 
        'fecha'
    ];

    public function periodo()
    {
        return $this->belongsTo(Periodo::class, 'id_periodo');
    }

    public function documento()
    {
        return $this->belongsTo(Documento::class, 'id_documento');
    }

    // Relación con Trabajador
    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'id_trabajador');
    }

    // Relación con Empleador
    public function empleador()
    {
        return $this->belongsTo(Empleador::class, 'id_empleador');
    }

     // Relación con Clase de Documento
    public function claseDocumento()
    {
        return $this->belongsTo(ClaseDocumento::class, 'id_clase_documento');
    }
}
