<?php

namespace App\Http\Controllers;
use App\Models\Historial;
use App\Models\Usuario;
use App\Models\Cotizacion;
use Illuminate\Http\Request;

class HistorialController extends Controller {
    public function index(){ $historiales = Historial::with(['usuario','cotizacion'])->get(); return view('historial.index', compact('historiales')); }
    public function create(){ $usuarios = Usuario::all(); $cotizaciones = Cotizacion::all(); return view('historial.create', compact('usuarios','cotizaciones')); }
    public function store(Request $r){ 
        $r->validate(['accion'=>'required','fecha'=>'required','id_usuario'=>'required','id_cotizacion'=>'nullable']);
        Historial::create($r->all()); 
        return redirect()->route('historial.index')->with('success','Historial registrado'); 
    }
    public function edit(Historial $historial){ $usuarios = Usuario::all(); $cotizaciones = Cotizacion::all(); return view('historial.edit', compact('historial','usuarios','cotizaciones')); }
    public function update(Request $r, Historial $historial){ 
        $r->validate(['accion'=>'required','fecha'=>'required','id_usuario'=>'required','id_cotizacion'=>'nullable']);
        $historial->update($r->all()); 
        return redirect()->route('historial.index')->with('success','Historial actualizado'); 
    }
    public function destroy(Historial $historial){ $historial->delete(); return redirect()->route('historial.index')->with('success','Historial eliminado'); }
}
