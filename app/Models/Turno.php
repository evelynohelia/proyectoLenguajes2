<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha_inicio',
        'fecha_fin',
        'id_servicio',
        'estado'
    ];
    
    public function servicio()
    {
        return $this->belongsTo('App\Models\Servicio');
    }

    public function cita()
    {
        return $this->belongsTo('App\Models\Cita');
    }
}
