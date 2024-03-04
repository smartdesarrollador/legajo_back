<?php

namespace App\Models;

use App\Models\Rol;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;

     protected $table = 'permisos';

    protected $primaryKey = 'id_permiso';

    protected $fillable = ['nombre','descripcion'];

    public function rol()
    {
        return $this->belongsToMany(Rol::class, 'permisos_roles', 'id_permiso', 'id_rol');
    }
}
