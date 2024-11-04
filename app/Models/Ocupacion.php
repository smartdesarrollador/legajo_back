<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Trabajador;

class Ocupacion extends Model
{
    use HasFactory;

    protected $table = 'ocupacion';
    protected $primaryKey = 'id_ocupacion';

    protected $fillable = ['ocupacion'];

    public function trabajadores()
    {
        return $this->hasMany(Trabajador::class, 'id_ocupacion');
    }
}
