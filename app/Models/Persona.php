<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'image'
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'foreign_key');
    }

    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'foreign_key');
    }
    
    public function profesional()
    {
        return $this->hasOne('App\Models\Profesional', 'foreign_key');
    }
}
