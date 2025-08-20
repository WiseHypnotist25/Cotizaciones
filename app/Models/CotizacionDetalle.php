<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CotizacionDetalle extends Model
{
    use HasFactory;

    protected $table = 'cotizacion_detalle';
    protected $primaryKey = 'id_detalle';
    public $timestamps = false;

    protected $fillable = ['cantidad','subtotal','id_cotizacion','id_producto'];

    public function cotizacion()
    {
        return $this->belongsTo(Cotizacion::class,'id_cotizacion');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class,'id_producto');
    }
}
