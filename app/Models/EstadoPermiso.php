<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Permiso;
use App\Models\Licencia;

class EstadoPermiso extends Model
{
    use HasFactory;

    protected $table = 'estado_permiso';
    protected $primaryKey = 'id_estado_permiso';

    protected $fillable = ['estado_permiso'];

    public function permisos()
    {
        return $this->hasMany(Permiso::class, 'id_estado_permiso');
    }

    public function licencias()
    {
        return $this->hasMany(Licencia::class, 'id_estado_permiso');
    }

     
}
