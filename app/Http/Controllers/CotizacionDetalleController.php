<?php

namespace App\Http\Controllers;
use App\Models\CotizacionDetalle;
use App\Models\Producto;
use App\Models\Cotizacion;
use Illuminate\Http\Request;

class CotizacionDetalleController extends Controller {
    public function index(){ $detalles = CotizacionDetalle::with(['cotizacion','producto'])->get(); return view('cotizacion_detalle.index', compact('detalles')); }
    public function create(){ $productos = Producto::all(); $cotizaciones = Cotizacion::all(); return view('cotizacion_detalle.create', compact('productos','cotizaciones')); }
    public function store(Request $r){ 
        $r->validate(['cantidad'=>'required|integer','subtotal'=>'required|numeric','id_cotizacion'=>'required','id_producto'=>'required']);
        CotizacionDetalle::create($r->all()); 
        return redirect()->route('cotizacion_detalle.index')->with('success','Detalle agregado'); 
    }
    public function edit(CotizacionDetalle $cotizacion_detalle){ 
        $productos = Producto::all(); $cotizaciones = Cotizacion::all(); 
        return view('cotizacion_detalle.edit', compact('cotizacion_detalle','productos','cotizaciones')); 
    }
    public function update(Request $r, CotizacionDetalle $cotizacion_detalle){ 
        $r->validate(['cantidad'=>'required|integer','subtotal'=>'required|numeric','id_cotizacion'=>'required','id_producto'=>'required']);
        $cotizacion_detalle->update($r->all()); 
        return redirect()->route('cotizacion_detalle.index')->with('success','Detalle actualizado'); 
    }
    public function destroy(CotizacionDetalle $cotizacion_detalle){ $cotizacion_detalle->delete(); return redirect()->route('cotizacion_detalle.index')->with('success','Detalle eliminado'); }
}
