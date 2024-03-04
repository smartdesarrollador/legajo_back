<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Contrato;

class TipoContrato extends Model
{
    use HasFactory;

    protected $table = 'tipo_contratos';

    protected $primaryKey = 'id_tipo_contrato';

   public function contratos()
    {
        return $this->hasMany(Contrato::class, 'id_tipo_contrato', 'id_tipo_contrato');
    }

}
