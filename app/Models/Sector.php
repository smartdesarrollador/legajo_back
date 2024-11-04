<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Empleador;

class Sector extends Model
{
    use HasFactory;

    protected $table = 'sector';
    protected $primaryKey = 'id_sector';

    protected $fillable = ['sector'];

    public function empleadores()
    {
        return $this->hasMany(Empleador::class, 'id_sector');
    }
}
