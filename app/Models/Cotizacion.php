<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;

    protected $table = 'cotizacion';
    protected $primaryKey = 'id_cotizacion';
    public $timestamps = false;

    protected $fillable = ['fecha','total','estado','id_cliente','id_usuario'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function detalles()
    {
        return $this->hasMany(CotizacionDetalle::class, 'id_cotizacion');
    }
}

