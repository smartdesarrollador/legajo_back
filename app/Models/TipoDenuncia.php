<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Denuncia;

class TipoDenuncia extends Model
{
    use HasFactory;

    protected $table = 'tipo_denuncia';
    protected $primaryKey = 'id_tipo_denuncia';

    protected $fillable = ['tipo_denuncia'];

    public function denuncias()
    {
        return $this->hasMany(Denuncia::class, 'id_tipo_denuncia');
    }
}
