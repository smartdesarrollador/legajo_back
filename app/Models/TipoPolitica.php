<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Politica;

class TipoPolitica extends Model
{
    use HasFactory;

    protected $table = 'tipo_politica';
    protected $primaryKey = 'id_tipo_politica';

    protected $fillable = ['tipo_politica'];

    public function politicas()
    {
        return $this->hasMany(Politica::class, 'id_tipo_politica');
    }
}
