<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Feriado;

class Anno extends Model
{
    use HasFactory;

        protected $table = 'anno';
    protected $primaryKey = 'id_anno';

    protected $fillable = ['anno'];

    public function feriados()
    {
        return $this->hasMany(Feriado::class, 'id_anno');
    }

}
