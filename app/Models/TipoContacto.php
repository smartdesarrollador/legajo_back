<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Contacto;

class TipoContacto extends Model
{
    use HasFactory;

    protected $table = 'tipo_contacto';
    protected $primaryKey = 'id_tipo_contacto';

    protected $fillable = ['tipo_contacto'];

    public function contactos()
    {
        return $this->hasMany(Contacto::class, 'id_tipo_contacto');
    }
}
