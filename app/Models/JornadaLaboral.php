<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Trabajador;
use App\Models\Contrato;

class JornadaLaboral extends Model
{
    use HasFactory;

    protected $table = 'jornada_laboral';
    protected $primaryKey = 'id_jornada_laboral';

    protected $fillable = ['jornada_laboral'];

    public function trabajadores()
    {
        return $this->hasMany(Trabajador::class, 'id_jornada_laboral');
    }

    public function contratos()
    {
        return $this->hasMany(Contrato::class, 'id_jornada_laboral');
    }
}
