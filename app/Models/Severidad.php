<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Severidad extends Model
{
    use HasFactory;

    protected $table = 'severidad';
    protected $primaryKey = 'id_severidad';
    public $timestamps = false;

    protected $fillable = [
        'severidad',
    ];

    public function historia()
    {
        return $this->hasMany(Historia::class, 'id_severidad');
    }
}
