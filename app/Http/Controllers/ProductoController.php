<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller {
    public function index(){ $productos = Producto::all(); return view('producto.index', compact('productos')); }
    public function create(){ return view('producto.create'); }
    public function store(Request $r){ 
        $r->validate(['nombre'=>'required|max:100','descripcion'=>'nullable','precio_unitario'=>'required|numeric','stock'=>'required|integer']);
        Producto::create($r->all()); 
        return redirect()->route('producto.index')->with('success','Producto creado'); 
    }
    public function show(Producto $producto){ return view('producto.show', compact('producto')); }
    public function edit(Producto $producto){ return view('producto.edit', compact('producto')); }
    public function update(Request $r, Producto $producto){ 
        $r->validate(['nombre'=>'required|max:100','descripcion'=>'nullable','precio_unitario'=>'required|numeric','stock'=>'required|integer']);
        $producto->update($r->all()); 
        return redirect()->route('producto.index')->with('success','Producto actualizado'); 
    }
    public function destroy(Producto $producto){ $producto->delete(); return redirect()->route('producto.index')->with('success','Producto eliminado'); }
}
