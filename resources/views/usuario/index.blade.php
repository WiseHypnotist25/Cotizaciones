@extends('layouts.app')
@section('content')
<h1>Usuarios</h1>
<a href="{{ route('usuario.create') }}">Agregar Usuario</a>
@if(session('success')) <p>{{ session('success') }}</p> @endif
<table border="1" cellpadding="5">
<tr><th>ID</th><th>Nombre</th><th>Email</th><th>Rol</th><th>Acciones</th></tr>
@foreach($usuarios as $u)
<tr>
<td>{{ $u->id_usuario }}</td>
<td>{{ $u->nombre }}</td>
<td>{{ $u->email }}</td>
<td>{{ $u->rol }}</td>
<td>
<a href="{{ route('usuario.show',$u->id_usuario) }}">Ver</a> |
<a href="{{ route('usuario.edit',$u->id_usuario) }}">Editar</a> |
<form action="{{ route('usuario.destroy',$u->id_usuario) }}" method="POST" style="display:inline;">
@csrf @method('DELETE')
<button type="submit">Eliminar</button>
</form>
</td>
</tr>
@endforeach
</table>
@endsection
