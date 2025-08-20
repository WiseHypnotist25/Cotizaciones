<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'cliente';
    protected $primaryKey = 'id_cliente';
    public $timestamps = false;

    protected $fillable = ['nombre','email','telefono','direccion'];

    public function cotizaciones()
    {
        return $this->hasMany(Cotizacion::class, 'id_cliente');
    }
}
