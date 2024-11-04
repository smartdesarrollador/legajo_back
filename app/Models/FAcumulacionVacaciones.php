<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\vacaciones;

class FAcumulacionVacaciones extends Model
{
    use HasFactory;

    protected $table = 'f_acumulacion_vacaciones';
    protected $primaryKey = 'id_f_acumulacion_vacaciones';

    protected $fillable = [
        'fecha_acumulacion', 'dias_acumulados', 'id_vacaciones', 'periodo_acumulado', 'nro_dias_acumulados'
    ];

    public function vacaciones()
    {
        return $this->belongsTo(Vacaciones::class, 'id_vacaciones');
    }
}
