<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Capacitacion;

class Instructor extends Model
{
    use HasFactory;

    protected $table = 'instructor';
    protected $primaryKey = 'id_instructor';

    protected $fillable = ['instructor'];

    public function capacitaciones()
    {
        return $this->hasMany(Capacitacion::class, 'id_instructor');
    }
}
