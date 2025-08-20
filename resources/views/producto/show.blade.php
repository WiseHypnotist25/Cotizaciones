@extends('layouts.app')
@section('content')
<h1>Detalle Producto</h1>
<p><strong>ID:</strong> {{ $producto->id_producto }}</p>
<p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
<p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
<p><strong>Precio Unitario:</strong> {{ $producto->precio_unitario }}</p>
<p><strong>Stock:</strong> {{ $producto->stock }}</p>
<a href="{{ route('producto.index') }}">Volver</a>
@endsection
