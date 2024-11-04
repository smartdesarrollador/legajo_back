<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionRol extends Model
{
    use HasFactory;

    protected $table = 'permission_rol';
    protected $primaryKey = 'id_permission_rol';

    protected $fillable = ['id_permission', 'id_rol'];
}
