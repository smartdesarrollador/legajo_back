<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'evento';
    protected $primaryKey = 'id_evento';
    public $timestamps = false;

    protected $fillable = [
        'evento',
    ];

    public function historias()
    {
        return $this->hasMany(Historia::class, 'id_evento');
    }
}
