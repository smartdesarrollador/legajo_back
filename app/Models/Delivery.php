<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Empleador;
use App\Models\Trabajador;
use App\Models\Documento;
use App\Models\Notificacion;

class Delivery extends Model
{
    use HasFactory;

    protected $table = 'delivery';
    protected $primaryKey = 'id_delivery';

    protected $fillable = [
        'id_empleador', 'id_trabajador', 'id_documento', 'id_notificacion', 'fecha_confirmacion', 
        'confirmacion'
    ];

    public function empleador()
    {
        return $this->belongsTo(Empleador::class, 'id_empleador');
    }

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'id_trabajador');
    }

    public function documento()
    {
        return $this->belongsTo(Documento::class, 'id_documento');
    }

    public function notificacion()
    {
        return $this->belongsTo(Notificacion::class, 'id_notificacion');
    }
}
