<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Vacaciones;

class TipoVacaciones extends Model
{
    use HasFactory;

    protected $table = 'tipo_vacaciones';
    protected $primaryKey = 'id_tipo_vacaciones';

    protected $fillable = ['tipo_vacaciones'];

    public function vacaciones()
    {
        return $this->hasMany(Vacaciones::class, 'id_tipo_vacaciones');
    }
}
