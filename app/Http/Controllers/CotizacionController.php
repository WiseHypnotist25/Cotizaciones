<?php

namespace App\Http\Controllers;
use App\Models\Cotizacion;
use App\Models\Cliente;
use App\Models\Usuario;
use Illuminate\Http\Request;

class CotizacionController extends Controller {
    public function index(){ 
        $cotizaciones = Cotizacion::with(['cliente','usuario','detalles.producto'])->get(); 
        return view('cotizacion.index', compact('cotizaciones')); 
    }
    public function create(){ 
        $clientes = Cliente::all(); 
        $usuarios = Usuario::all(); 
        return view('cotizacion.create', compact('clientes','usuarios')); 
    }
    public function store(Request $r){ 
        $r->validate(['fecha'=>'required|date','total'=>'required|numeric','estado'=>'required','id_cliente'=>'required','id_usuario'=>'required']);
        Cotizacion::create($r->all()); 
        return redirect()->route('cotizacion.index')->with('success','Cotización creada'); 
    }
    public function show(Cotizacion $cotizacion){ 
        $cotizacion->load('detalles.producto','cliente','usuario'); 
        return view('cotizacion.show', compact('cotizacion')); 
    }
    public function edit(Cotizacion $cotizacion){ 
        $clientes = Cliente::all(); 
        $usuarios = Usuario::all(); 
        return view('cotizacion.edit', compact('cotizacion','clientes','usuarios')); 
    }
    public function update(Request $r, Cotizacion $cotizacion){ 
        $r->validate(['fecha'=>'required|date','total'=>'required|numeric','estado'=>'required','id_cliente'=>'required','id_usuario'=>'required']);
        $cotizacion->update($r->all()); 
        return redirect()->route('cotizacion.index')->with('success','Cotización actualizada'); 
    }
    public function destroy(Cotizacion $cotizacion){ $cotizacion->delete(); return redirect()->route('cotizacion.index')->with('success','Cotización eliminada'); }
}
