<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Trabajador;
use App\Models\Empleador;
use App\Models\Documento;
use App\Models\EstadoContrato;
use App\Models\Modalidad;
use App\Models\TipoContrato;

class Contrato extends Model
{
    use HasFactory;

    protected $table = 'contratos';

    protected $primaryKey = 'id_contrato';
    
    public function trabajador()
    {
        return $this->belongsToMany(Trabajador::class, 'contrato_trabajadores', 'id_contrato', 'id_trabajador');
    }

    public function empleador()
    {
        return $this->belongsTo(Empleador::class, 'id_empleador', 'id_empleador');
    }


    public function documento()
    {
        return $this->belongsTo(documento::class, 'id_documento', 'id_documento');
    }

    public function estado_contrato()
    {
        return $this->belongsTo(EstadoContrato::class, 'id_estado_contrato', 'id_estado_contrato');
    }

    public function modalidad()
    {
        return $this->belongsTo(Modalidad::class, 'id_modalidad', 'id_modalidad');
    }

    public function tipo_contrato()
    {
        return $this->belongsTo(TipoContrato::class, 'id_tipo_contrato', 'id_tipo_contrato');
    }
}
