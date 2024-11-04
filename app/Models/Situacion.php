<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Trabajador;

class Situacion extends Model
{
    use HasFactory;

    protected $table = 'situacion';
    protected $primaryKey = 'id_situacion';

    protected $fillable = ['situacion'];

    public function trabajadores()
    {
        return $this->hasMany(Trabajador::class, 'id_situacion');
    }

    public function historiasd()
    {
        return $this->hasMany(HistoriaD::class, 'id_situacion');
    }
}
