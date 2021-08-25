<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesional extends Model
{
    use HasFactory;

    public function persona()
    {
        return $this->belongsTo('App\Models\Persona');
    }

    public function servicio()
    {
        return $this->hasMany('App\Models\Servicio', 'foreign_key');
    }

    public function profesion()
    {
        return $this->belongsToMany('App\Models\Profesion');
    }

}