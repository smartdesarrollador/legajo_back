<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoHistoria extends Model
{
    use HasFactory;

    protected $table = 'tipo_historia';
    protected $primaryKey = 'id_tipo_historia';
    public $timestamps = false;

    protected $fillable = [
        'tipo_historia',
    ];

    public function historias()
    {
        return $this->hasMany(Historia::class, 'id_tipo_historia');
    }
}
