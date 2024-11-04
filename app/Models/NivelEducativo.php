<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Trabajador;

class NivelEducativo extends Model
{
    use HasFactory;

    protected $table = 'nivel_educativo';
    protected $primaryKey = 'id_nivel_educativo';

    protected $fillable = ['nivel_educativo'];

    public function trabajadores()
    {
        return $this->hasMany(Trabajador::class, 'id_nivel_educativo');
    }
}
