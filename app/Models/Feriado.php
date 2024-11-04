<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Anno;

class Feriado extends Model
{
    use HasFactory;

    protected $table = 'feriado';
    protected $primaryKey = 'id_feriado';

    protected $fillable = ['feriado', 'fecha'];

    public function anno()
    {
        return $this->belongsTo(Anno::class, 'id_anno');
    }
}

