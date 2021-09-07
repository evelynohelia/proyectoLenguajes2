<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesion_profesional extends Model
{
    use HasFactory;
    protected $fillable = [
        'profesional_id',
        'profesion_id',
    ];
    public function profesional()
    {
        return $this->belongsTo('App\Models\Profesional');
    }
    public function profesion()
    {
        return $this->belongsTo('App\Models\Profesion');
    }


}
