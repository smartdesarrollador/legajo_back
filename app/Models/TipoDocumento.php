<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Trabajador;

class TipoDocumento extends Model
{
    use HasFactory;

    protected $table = 'tipo_documento';
    protected $primaryKey = 'id_tipo_documento';

    protected $fillable = ['tipo_documento'];

    public function trabajadores()
    {
        return $this->hasMany(Trabajador::class, 'id_tipo_documento');
    }
}
