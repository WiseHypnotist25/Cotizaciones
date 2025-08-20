<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Cotizacion;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $clientes = Cliente::all();
        $productos = Producto::all();
        $cotizaciones = Cotizacion::with('cliente')->get();

        return view('home', compact('clientes', 'productos', 'cotizaciones'));
    }
}
