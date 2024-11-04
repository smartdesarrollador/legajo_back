<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Trabajador;
use App\Models\Empleador;
use App\Models\Contrato;
class RegimenLaboral extends Model
{
    use HasFactory;

    protected $table = 'regimen_laboral';
    protected $primaryKey = 'id_regimen_laboral';

    protected $fillable = ['regimen_laboral'];

    public function trabajadores()
    {
        return $this->hasMany(Trabajador::class, 'id_regimen_laboral');
    }

    /* public function empleadores()
    {
        return $this->hasMany(Empleador::class, 'id_empleador');
    } */

    public function contratos()
    {
        return $this->hasMany(Contrato::class, 'id_regimen_laboral');
    }

    // Relacion Muchos a Muchos opcion 1
/*     public function empleadores()
{
    return $this->belongsToMany(Empleador::class, 'empleador_regimen_laboral', 'id_regimen_laboral', 'id_empleador');
} */

// Relacion Muchos a Muchos opcion 2
public function empleadorRegimenLaboral()
{
    return $this->hasMany(EmpleadorRegimenLaboral::class, 'id_regimen_laboral');
}
}
