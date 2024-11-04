<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accion extends Model
{
    use HasFactory;

    protected $table = 'accion';
    protected $primaryKey = 'id_accion';
    public $timestamps = false;

    protected $fillable = [
        'accion',
    ];

    public function historias()
    {
        return $this->hasMany(Historia::class, 'id_accion');
    }
}
