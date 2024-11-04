<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\empleador;
use App\Models\regimenLaboral;

class EmpleadorRegimenLaboral extends Model
{
    use HasFactory;

    protected $table = 'empleador_regimen_laboral';
    protected $primaryKey = 'id_empleador_regimen_laboral';

    protected $fillable = ['id_empleador', 'id_regimen_laboral', 'empleador_regimen_laboral'];

    // Relacion Muchos a Muchos opcion 2
    public function empleador()
    {
        return $this->belongsTo(Empleador::class, 'id_empleador');
    }

    // Relacion Muchos a Muchos opcion 2
    public function regimenLaboral()
    {
        return $this->belongsTo(RegimenLaboral::class, 'id_regimen_laboral');
    }

    

   
}
