<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Trabajador;
use App\Models\Contrato;

class Cargo extends Model
{
    use HasFactory;

    protected $table = 'cargo';
    protected $primaryKey = 'id_cargo';

    protected $fillable = ['cargo'];

    public function trabajadores()
    {
        return $this->hasMany(Trabajador::class, 'id_cargo');
    }

    public function contratos()
    {
        return $this->hasMany(Contrato::class, 'id_cargo');
    }
}
