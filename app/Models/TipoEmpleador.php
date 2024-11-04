<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEmpleador extends Model
{
    use HasFactory;

    protected $table = 'tipo_empleador';
    protected $primaryKey = 'id_tipo_empleador';

    protected $fillable = [
        'tipo_empleador',
    ];

    // Relación con la tabla Empleador
    public function empleadores()
    {
        return $this->hasMany(Empleador::class, 'id_tipo_empleador');
    }
}
