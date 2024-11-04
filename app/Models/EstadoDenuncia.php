<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Denuncia;

class EstadoDenuncia extends Model
{
    use HasFactory;

    protected $table = 'estado_denuncia';
    protected $primaryKey = 'id_estado_denuncia';

    protected $fillable = ['estado_denuncia'];

    public function denuncias()
    {
        return $this->hasMany(Denuncia::class, 'id_estado_denuncia');
    }

    
}
