@extends('layouts.app')
@section('content')
<h1>Clientes</h1>
<a href="{{ route('cliente.create') }}">Agregar Cliente</a>
@if(session('success')) <p>{{ session('success') }}</p> @endif
<table border="1" cellpadding="5">
<tr><th>ID</th><th>Nombre</th><th>Email</th><th>Teléfono</th><th>Dirección</th><th>Acciones</th></tr>
@foreach($clientes as $c)
<tr>
<td>{{ $c->id_cliente }}</td>
<td>{{ $c->nombre }}</td>
<td>{{ $c->email }}</td>
<td>{{ $c->telefono }}</td>
<td>{{ $c->direccion }}</td>
<td>
<a href="{{ route('cliente.show',$c->id_cliente) }}">Ver</a> |
<a href="{{ route('cliente.edit',$c->id_cliente) }}">Editar</a> |
<form action="{{ route('cliente.destroy',$c->id_cliente) }}" method="POST" style="display:inline;">
@csrf @method('DELETE')
<button type="submit">Eliminar</button>
</form>
</td>
</tr>
@endforeach
</table>
@endsection
