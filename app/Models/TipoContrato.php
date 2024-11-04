<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Contrato;
use App\Models\Trabajador;

class TipoContrato extends Model
{
    use HasFactory;

    protected $table = 'tipo_contrato';
    protected $primaryKey = 'id_tipo_contrato';

    protected $fillable = ['tipo_contrato'];

    public function contratos()
    {
        return $this->hasMany(Contrato::class, 'id_tipo_contrato');
    }

    public function trabajadores()
    {
        return $this->hasMany(Trabajador::class, 'id_tipo_contrato');
    }
}
