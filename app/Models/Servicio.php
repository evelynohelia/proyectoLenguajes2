<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    protected $fillable = [
        'descripcion',
        'precio',
        'profesional_id',
    ];
    public function turno()
    {
        return $this->hasMany('App\Models\Turno', 'foreign_key');
    }

    public function profesional()
    {
        return $this->belongsTo('App\Models\Profesional');
    }
}
