<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    

    public function persona()
    {
        return $this->belongsTo('App\Models\Persona');
    }

   
    public function cita()
    {
        return $this->hasMany('App\Models\Cita', 'foreign_key');
    }
}
