<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\vacaciones;

class EstadoAprobacion extends Model
{
    use HasFactory;

    protected $table = 'estado_aprobacion';
    protected $primaryKey = 'id_estado_aprobacion';

    protected $fillable = [
        'estado_aprobacion', 'id_vacaciones', 'aprobado_por', 'cargo', 'fecha_aprobacion', 'comentario'
    ];

    public function vacaciones()
    {
        return $this->belongsTo(Vacaciones::class, 'id_vacaciones');
    }
}
