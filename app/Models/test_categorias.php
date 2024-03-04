<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class test_categorias extends Model
{
    use HasFactory;

    protected $table = 'test_categorias';

    protected $fillable = ['name', 'slug'];

    // declarar el id
    /* protected $primaryKey = 'id'; */

   


   


}
