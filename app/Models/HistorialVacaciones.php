<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\trabajador;
use App\Models\tipoMovimiento;

class HistorialVacaciones extends Model
{
    use HasFactory;

    protected $table = 'historial_vacaciones';
    protected $primaryKey = 'id_historial_vacaciones';

    protected $fillable = [
        'historial_vacaciones', 'fecha', 'id_trabajador', 'dias', 'id_tipo_movimiento', 'comentarios'
    ];

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'id_trabajador');
    }

    public function tipoMovimiento()
    {
        return $this->belongsTo(TipoMovimiento::class, 'id_tipo_movimiento');
    }
}
