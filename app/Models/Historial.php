<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;

    protected $table = 'historial';
    protected $primaryKey = 'id_historial';
    public $timestamps = false;

    protected $fillable = ['accion','fecha','id_usuario','id_cotizacion'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class,'id_usuario');
    }

    public function cotizacion()
    {
        return $this->belongsTo(Cotizacion::class,'id_cotizacion');
    }
}
