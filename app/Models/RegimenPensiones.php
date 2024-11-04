<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Trabajador;

class RegimenPensiones extends Model
{
    use HasFactory;

    protected $table = 'regimen_pensiones';
    protected $primaryKey = 'id_regimen_pensiones';

    protected $fillable = ['regimen_pensiones'];

    public function trabajadores()
    {
        return $this->hasMany(Trabajador::class, 'id_regimen_pensiones');
    }
}
