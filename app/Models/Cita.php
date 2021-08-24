<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    public function turno()
    {
        return $this->hasOne('App\Models\Turno', 'foreign_key');
    }

    public function persona()
    {
        return $this->belongsTo('App\Models\Persona');
    }
}
