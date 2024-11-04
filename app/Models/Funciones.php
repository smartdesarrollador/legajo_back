<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Contrato;

class Funciones extends Model
{
    use HasFactory;

    protected $table = 'funciones';
    protected $primaryKey = 'id_funciones';

    protected $fillable = ['funciones'];

    public function contratos()
    {
        return $this->hasMany(Contrato::class, 'id_funciones');
    }
}
