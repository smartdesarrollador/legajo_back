<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Delivery;

class Notificacion extends Model
{
    use HasFactory;

    protected $table = 'notificacion';
    protected $primaryKey = 'id_notificacion';

    protected $fillable = ['notificacion'];

    public function deliveries()
    {
        return $this->hasMany(Delivery::class, 'id_notificacion');
    }
}
