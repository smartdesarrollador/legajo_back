<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Trabajador;

class SaldoVacaciones extends Model
{
    use HasFactory;

    protected $table = 'saldo_vacaciones';
    protected $primaryKey = 'id_saldo_vacaciones';

    protected $fillable = [
        'id_trabajador', 'anno', 'dias_acumulados', 'dias_vencidos', 'dias_usados', 'saldo_vacaciones'
    ];

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'id_trabajador');
    }
}
