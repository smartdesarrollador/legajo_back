<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Historia;
use App\Models\Documento;
use App\Models\Situacion;

class HistoriaD extends Model
{
    use HasFactory;

    protected $table = 'historia_d';
    protected $primaryKey = 'id_historia_d';

    protected $fillable = ['id_historia', 'id_documento', 'id_situacion', 'comentario'];

    public function historia()
    {
        return $this->belongsTo(Historia::class, 'id_historia');
    }

    public function documento()
    {
        return $this->belongsTo(Documento::class, 'id_documento');
    }

    // Relación con el modelo Situacion
    public function situacion()
    {
        return $this->belongsTo(Situacion::class, 'id_situacion'); // Asegúrate de que 'id_situacion' sea la clave foránea correcta.
    }
}
