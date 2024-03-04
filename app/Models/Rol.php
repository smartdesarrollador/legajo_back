<?php

namespace App\Models;

use App\Models\User;
use App\Models\Permiso;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $primaryKey = 'id_rol';

    protected $fillable = ['nombre','descripcion'];

    public function user()
    {
        return $this->belongsToMany(User::class, 'rol_usuarios', 'id_rol', 'id_user');
    }

    public function permiso()
    {
        return $this->belongsToMany(Permiso::class, 'permisos_roles', 'id_rol', 'id_permiso');
    }
}
