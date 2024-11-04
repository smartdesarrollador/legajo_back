<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Gestion;

class Periodo extends Model
{
    use HasFactory;

    protected $table = 'periodo';
    protected $primaryKey = 'id_periodo';

    protected $fillable = ['periodo', 'corto'];

    public function gestiones()
    {
        return $this->hasMany(Gestion::class, 'id_periodo');
    }
}
