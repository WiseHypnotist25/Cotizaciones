@extends('layouts.app')
@section('content')
<h1>Editar Producto</h1>
<form action="{{ route('producto.update', $producto->id_producto) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Nombre:</label>
    <input type="text" name="nombre" value="{{ $producto->nombre }}" required><br>
    
    <label>Descripción:</label>
    <textarea name="descripcion">{{ $producto->descripcion }}</textarea><br>
    
    <label>Precio Unitario:</label>
    <input type="number" name="precio_unitario" step="0.01" value="{{ $producto->precio_unitario }}" required><br>
    
    <label>Stock:</label>
    <input type="number" name="stock" value="{{ $producto->stock }}" required><br>
    
    <button type="submit">Actualizar</button>
</form>
@endsection
