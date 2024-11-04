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

    public function users()
    {
        return $this->belongsToMany(User::class, 'rol_user', 'id_rol', 'id_user');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_rol', 'id_rol', 'id_permission');
    }
}
