<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Empleador;
use App\Models\TipoContacto;
use App\Models\Area;

class Contacto extends Model
{
    use HasFactory;

    protected $table = 'contacto';
    protected $primaryKey = 'id_contacto';

    protected $fillable = [
        'contacto', 'id_empleador', 'id_tipo_contacto', 'id_area', 'telefono', 'celular', 'correo'
    ];

    public function empleador()
    {
        return $this->belongsTo(Empleador::class, 'id_empleador');
    }

    public function tipoContacto()
    {
        return $this->belongsTo(TipoContacto::class, 'id_tipo_contacto');
    }

    // Relación con el modelo Area
    public function area()
    {
        return $this->belongsTo(Area::class, 'id_area', 'id_area');
    }


}
