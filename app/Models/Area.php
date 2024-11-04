<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Permiso;
use App\Models\Licencia;

class Area extends Model
{
    use HasFactory;

    protected $table = 'area';
    protected $primaryKey = 'id_area';

    protected $fillable = ['area'];

    public function permisos()
    {
        return $this->hasMany(Permiso::class, 'id_area');
    }

    public function licencias()
    {
        return $this->hasMany(Licencia::class, 'id_area');
    }

    public function trabajadores()
    {
        return $this->hasMany(Trabajador::class, 'id_area');
    }

    public function contactos()
    {
        return $this->hasMany(Contacto::class, 'id_area');
    }
}
