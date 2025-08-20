<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller {
    public function index(){ $usuarios = Usuario::all(); return view('usuario.index', compact('usuarios')); }
    public function create(){ return view('usuario.create'); }
    public function store(Request $r){ 
        $r->validate(['nombre'=>'required|max:100','email'=>'required|email|unique:usuario,email','password'=>'required|min:6','rol'=>'required']);
        Usuario::create(['nombre'=>$r->nombre,'email'=>$r->email,'password'=>bcrypt($r->password),'rol'=>$r->rol]);
        return redirect()->route('usuario.index')->with('success','Usuario creado'); 
    }
    public function show(Usuario $usuario){ return view('usuario.show', compact('usuario')); }
    public function edit(Usuario $usuario){ return view('usuario.edit', compact('usuario')); }
    public function update(Request $r, Usuario $usuario){ 
        $r->validate(['nombre'=>'required|max:100','email'=>'required|email','rol'=>'required']);
        $data = $r->only(['nombre','email','rol']);
        if($r->password) $data['password'] = bcrypt($r->password);
        $usuario->update($data);
        return redirect()->route('usuario.index')->with('success','Usuario actualizado'); 
    }
    public function destroy(Usuario $usuario){ $usuario->delete(); return redirect()->route('usuario.index')->with('success','Usuario eliminado'); }
}
