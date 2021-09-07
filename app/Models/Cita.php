<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha',
        'estado',
        'acceso_cliente',
        'acceso_profesional',
        'turno_id',
        'cliente_id',
        'descripcion',
    ];
    public function turno()
    {
        return $this->hasOne('App\Models\Turno', 'foreign_key');
    }

    public function persona()
    {
        return $this->belongsTo('App\Models\Persona');
    }
}
