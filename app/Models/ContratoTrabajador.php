<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratoTrabajador extends Model
{
    use HasFactory;

    protected $table = 'contrato_trabajadores';

    protected $primaryKey = 'id_contrato_trabajador';
    
}
