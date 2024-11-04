<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Trabajador;

class Afp extends Model
{
    use HasFactory;

    protected $table = 'afp';
    protected $primaryKey = 'id_afp';

    protected $fillable = ['afp'];

    public function trabajadores()
    {
        return $this->hasMany(Trabajador::class, 'id_afp');
    }
}
