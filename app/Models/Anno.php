<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anno extends Model
{
    use HasFactory;

    protected $table = 'annos';

    protected $primaryKey = 'id_anno';
}
