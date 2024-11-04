<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\denuncia;
use App\Models\documento;

class DenunciaD extends Model
{
    use HasFactory;

    protected $table = 'denuncia_d';
    protected $primaryKey = 'id_denuncia_d';

    protected $fillable = [
        'id_denuncia', 'id_actividad_denuncia', 'id_documento', 'detalle_denuncia', 'secuencia'
    ];

    public function denuncia()
    {
        return $this->belongsTo(Denuncia::class, 'id_denuncia');
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
