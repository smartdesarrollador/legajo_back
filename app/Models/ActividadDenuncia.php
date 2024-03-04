<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadDenuncia extends Model
{
    use HasFactory;

    protected $table = 'actividades_denuncias';

    protected $primaryKey = 'id_actividad_denuncia';
}
