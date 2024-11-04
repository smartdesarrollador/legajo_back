<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Trabajador;

class RegimenSalud extends Model
{
    use HasFactory;

    protected $table = 'regimen_salud';
    protected $primaryKey = 'id_regimen_salud';

    protected $fillable = ['regimen_salud'];

    public function trabajadores()
    {
        return $this->hasMany(Trabajador::class, 'id_regimen_salud');
    }
}
