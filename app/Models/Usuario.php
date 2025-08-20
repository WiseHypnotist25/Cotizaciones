<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;

    protected $fillable = ['nombre','email','password','rol'];

    public function cotizaciones()
    {
        return $this->hasMany(Cotizacion::class, 'id_usuario');
    }

    public function historial()
    {
        return $this->hasMany(Historial::class, 'id_usuario');
    }
}

