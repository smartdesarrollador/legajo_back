<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Trabajador;
use App\Models\HistorialVacaciones;

class TipoMovimiento extends Model
{
    use HasFactory;

    protected $table = 'tipo_movimiento';
    protected $primaryKey = 'id_tipo_movimiento';

    protected $fillable = ['tipo_movimiento'];

    public function trabajadores()
    {
        return $this->hasMany(Trabajador::class, 'id_tipo_movimiento');
    }

    public function historialVacaciones()
    {
        return $this->hasMany(HistorialVacaciones::class, 'id_tipo_movimiento');
    }
}
