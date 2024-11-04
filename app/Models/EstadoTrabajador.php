<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\trabajador;

class EstadoTrabajador extends Model
{
    use HasFactory;

    protected $table = 'estado_trabajador';
    protected $primaryKey = 'id_estado_trabajador';

    protected $fillable = ['estado_trabajador'];

    public function trabajadores()
    {
        return $this->hasMany(Trabajador::class, 'id_estado_trabajador');
    }
}
