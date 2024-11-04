<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Contrato;

class EstadoContrato extends Model
{
    use HasFactory;

    protected $table = 'estado_contrato';
    protected $primaryKey = 'id_estado_contrato';

    protected $fillable = ['estado_contrato'];

    public function contratos()
    {
        return $this->hasMany(Contrato::class, 'id_estado_contrato');
    }
}
