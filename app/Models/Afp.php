<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Trabajador;

class Afp extends Model
{
    use HasFactory;

    protected $table = 'afps';

    protected $primaryKey = 'id_afp';

    public function trabajador()
    {
        return $this->hasMany(Trabajador::class, 'id_afp', 'id_afp');
    }
}
