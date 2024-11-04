<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\TipoPolitica;
use App\Models\Empleador;

class Politica extends Model
{
    use HasFactory;

     protected $table = 'politica';
    protected $primaryKey = 'id_politica';

    protected $fillable = ['politica', 'resumen', 'id_tipo_politica', 'id_empleador'];

    public function tipoPolitica()
    {
        return $this->belongsTo(TipoPolitica::class, 'id_tipo_politica');
    }

    public function empleador()
    {
        return $this->belongsTo(Empleador::class, 'id_empleador');
    }
}
