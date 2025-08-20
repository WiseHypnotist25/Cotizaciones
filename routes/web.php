<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\CotizacionDetalleController;


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('cliente', ClienteController::class);
Route::resource('usuario', UsuarioController::class);
Route::resource('producto', ProductoController::class);
Route::resource('cotizacion', CotizacionController::class);     
Route::resource('cotizacion_detalle', CotizacionDetalleController::class);