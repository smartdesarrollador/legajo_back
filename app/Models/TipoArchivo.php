<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Documento;

class TipoArchivo extends Model
{
    use HasFactory;

    protected $table = 'tipo_archivo';
    protected $primaryKey = 'id_tipo_archivo';

    protected $fillable = ['tipo_archivo', 'icono'];

    public function documentos()
    {
        return $this->hasMany(Documento::class, 'id_tipo_archivo');
    }
}
