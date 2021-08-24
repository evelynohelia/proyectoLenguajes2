<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    use HasFactory;
    
    public function servicio()
    {
        return $this->belongsTo('App\Models\Servicio');
    }

    public function cita()
    {
        return $this->belongsTo('App\Models\Cita');
    }
}
