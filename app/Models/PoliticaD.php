<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Politica;
use App\Models\Documento;

class PoliticaD extends Model
{
    use HasFactory;

    protected $table = 'politica_d';
    protected $primaryKey = 'id_politica_d';

    protected $fillable = [
        'id_politica', 'secuencia', 'resumen', 'id_documento', 'id_actividad_denuncia', 
        'enviar_correo', 'requiere_cargo'
    ];

    public function politica()
    {
        return $this->belongsTo(Politica::class, 'id_politica');
    }

    public function documento()
    {
        return $this->belongsTo(Documento::class, 'id_documento');
    }

    public function actividadDenuncia()
    {
        return $this->belongsTo(ActividadDenuncia::class, 'id_actividad_denuncia');
    }
}
