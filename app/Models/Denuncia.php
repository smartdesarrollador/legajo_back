<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Empleador;
use App\Models\Trabajador;
use App\Models\TipoDenuncia;
use App\Models\EstadoDenuncia;

class Denuncia extends Model
{
    use HasFactory;

    protected $table = 'denuncia';
    protected $primaryKey = 'id_denuncia';

    protected $fillable = [
        'id_tipo_denuncia', 'id_empleador', 'id_trabajador', 'id_estado_denuncia', 
        'fecha_denuncia', 'fecha_cierre', 'numero_documento'
    ];

    public function empleador()
    {
        return $this->belongsTo(Empleador::class, 'id_empleador');
    }

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'id_trabajador');
    }

    // Relación con TipoDenuncia
    public function tipoDenuncia()
    {
        return $this->belongsTo(TipoDenuncia::class, 'id_tipo_denuncia');
    }

    // Relación con EstadoDenuncia
    public function estadoDenuncia()
    {
        return $this->belongsTo(EstadoDenuncia::class, 'id_estado_denuncia');
    }
}
