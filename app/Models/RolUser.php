<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolUser extends Model
{
    use HasFactory;

    protected $table = 'rol_user';
    protected $primaryKey = 'id_rol_user';

    protected $fillable = ['id_user', 'id_rol'];
}
