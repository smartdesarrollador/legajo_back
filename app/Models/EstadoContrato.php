<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Contrato;

class EstadoContrato extends Model
{
    use HasFactory;

    protected $table = 'estado_contratos';

    protected $primaryKey = 'id_estado_contrato';

    public function contrato()
    {
        return $this->hasMany(Contrato::class, 'id_estado_contrato', 'id_estado_contrato');
    }
}
