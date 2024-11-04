<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadDenuncia extends Model
{
    use HasFactory;

    protected $table = 'actividad_denuncia';
    protected $primaryKey = 'id_actividad_denuncia';
    public $timestamps = false;

    protected $fillable = [
        'actividad_denuncia',
    ];

    public function denunciasD()
    {
        return $this->hasMany(DenunciaD::class, 'id_actividad_denuncia');
    }

    public function politicasD()
    {
        return $this->hasMany(PoliticaD::class, 'id_actividad_denuncia');
    }
}
