@extends('layouts.app')
@section('content')
<h1>Productos</h1>
<a href="{{ route('producto.create') }}">Agregar Producto</a>
@if(session('success')) <p>{{ session('success') }}</p> @endif
<table border="1" cellpadding="5">
<tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Precio Unitario</th><th>Stock</th><th>Acciones</th></tr>
@foreach($productos as $p)
<tr>
<td>{{ $p->id_producto }}</td>
<td>{{ $p->nombre }}</td>
<td>{{ $p->descripcion }}</td>
<td>{{ $p->precio_unitario }}</td>
<td>{{ $p->stock }}</td>
<td>
<a href="{{ route('producto.show',$p->id_producto) }}">Ver</a> |
<a href="{{ route('producto.edit',$p->id_producto) }}">Editar</a> |
<form action="{{ route('producto.destroy',$p->id_producto) }}" method="POST" style="display:inline;">
@csrf @method('DELETE')
<button type="submit">Eliminar</button>
</form>
</td>
</tr>
@endforeach
</table>
@endsection
