<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Contrato;
use App\Models\Empleador;
use App\Models\Trabajador;
//use App\Models\Usuarios;
//use App\Models\TipoArchivo;
//use App\Models\ClaseDocumento;

class Documento extends Model
{
    use HasFactory;

    protected $table = 'documentos';

    protected $primaryKey = 'id_documento';

    public function contrato()
    {
        return $this->hasMany(Contrato::class, 'id_documento', 'id_documento');
    }

    public function empleador()
    {
        return $this->belongsTo(Empleador::class, 'id_empleador', 'id_empleador');
    }

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'id_trabajador', 'id_trabajador');
    }

    /* public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario');
    } */

    /* public function tipo_archivo()
    {
        return $this->belongsTo(TipoArchivo::class, 'id_tipo_archivo', 'id_tipo_archivo');
    } */

    /* public function clase_documento()
    {
        return $this->belongsTo(ClaseDocumento::class, 'id_clase_documento', 'id_clase_documento');
    } */
   

    
}
