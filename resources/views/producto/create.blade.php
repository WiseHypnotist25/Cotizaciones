@extends('layouts.app')
@section('content')
<h1>Agregar Producto</h1>
<form action="{{ route('producto.store') }}" method="POST">
@csrf
<label>Nombre:</label><input type="text" name="nombre" required><br>
<label>Descripción:</label><textarea name="descripcion"></textarea><br>
<label>Precio Unitario:</label><input type="number" name="precio_unitario" step="0.01" required><br>
<label>Stock:</label><input type="number" name="stock" required><br>
<button type="submit">Guardar</button>
</form>
@endsection
