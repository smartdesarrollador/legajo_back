<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Capacitacion;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'curso';
    protected $primaryKey = 'id_curso';

    protected $fillable = ['curso'];

    public function capacitaciones()
    {
        return $this->hasMany(Capacitacion::class, 'id_curso');
    }

    
}
