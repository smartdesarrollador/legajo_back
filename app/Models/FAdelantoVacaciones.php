<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\vacaciones;

class FAdelantoVacaciones extends Model
{
    use HasFactory;

    protected $table = 'f_adelanto_vacaciones';
    protected $primaryKey = 'id_f_adelanto_vacaciones';

    protected $fillable = [
        'fecha_inicio', 'fecha_fin', 'id_vacaciones', 'periodo_actual', 'periodo_restante', 
        'dias_adelantados'
    ];

    public function vacaciones()
    {
        return $this->belongsTo(Vacaciones::class, 'id_vacaciones');
    }
}
