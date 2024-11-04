<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Trabajador;

class MotivoBaja extends Model
{
    use HasFactory;

    protected $table = 'motivo_baja';
    protected $primaryKey = 'id_motivo_baja';

    protected $fillable = ['motivo_baja'];

    public function trabajadores()
    {
        return $this->hasMany(Trabajador::class, 'id_motivo_baja');
    }
}
