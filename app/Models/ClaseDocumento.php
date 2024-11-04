<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Documento;

class ClaseDocumento extends Model
{
    use HasFactory;

    protected $table = 'clase_documento';
    protected $primaryKey = 'id_clase_documento';

    protected $fillable = ['clase_documento'];

    public function documentos()
    {
        return $this->hasMany(Documento::class, 'id_clase_documento');
    }

    public function gestiones()
    {
        return $this->hasMany(Gestion::class, 'id_clase_documento');
    }
}
