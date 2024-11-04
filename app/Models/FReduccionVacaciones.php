<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Vacaciones;

class FReduccionVacaciones extends Model
{
    use HasFactory;

    protected $table = 'f_reduccion_vacaciones';
    protected $primaryKey = 'id_f_reduccion_vacaciones';

    protected $fillable = [
        'fecha_inicio', 'fecha_fin', 'id_vacaciones', 'periodo_inicio_laboral', 
        'periodo_fin_laboral', 'nro_dias_reduccion'
    ];

    public function vacaciones()
    {
        return $this->belongsTo(Vacaciones::class, 'id_vacaciones');
    }
}
