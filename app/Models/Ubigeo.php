<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Empleador;
use App\Models\Trabajador;

class Ubigeo extends Model
{
    use HasFactory;

    protected $table = 'ubigeo';
    protected $primaryKey = 'id_ubigeo';

    protected $fillable = ['ubigeo', 'departamento', 'provincia', 'distrito'];

    public function empleadores()
    {
        return $this->hasMany(Empleador::class, 'id_ubigeo');
    }

    public function trabajadores()
    {
        return $this->hasMany(Trabajador::class, 'id_ubigeo');
    }
}
