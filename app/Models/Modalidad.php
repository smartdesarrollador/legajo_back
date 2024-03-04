<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Contrato;

class Modalidad extends Model
{
    use HasFactory;

    protected $table = 'modalidades';

    protected $primaryKey = 'id_modalidad';

    public function contrato()
    {
        return $this->hasMany(Contrato::class, 'id_modalidad', 'id_modalidad');
    }
}
