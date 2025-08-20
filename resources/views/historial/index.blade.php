@extends('layouts.app')
@section('content')
<h1>Historial</h1>
<a href="{{ route('historial.create') }}">Agregar Historial</a>
@if(session('success')) <p>{{ session('success') }}</p> @endif
<table border="1" cellpadding="5">
<tr><th>ID</th><th>Acción</th><th>Fecha</th><th>Usuario</th><th>Cotización</th><th>Acciones</th></tr>
@foreach($historiales as $h)
<tr>
<td>{{ $h->id_historial }}</td>
<td>{{ $h->accion }}</td>
<td>{{ $h->fecha }}</td>
<td>{{ $h->usuario->nombre }}</td>
<td>{{ $h->cotizacion ? '#'.$h->cotizacion->id_cotizacion : 'N/A' }}</td>
<td>
<a href="{{ route('historial.show',$h->id_historial) }}">Ver</a> |
<a href="{{ route('historial.edit',$h->id_historial) }}">Editar</a> |
<form action="{{ route('historial.destroy',$h->id_historial) }}" method="POST" style="display:inline;">
@csrf @method('DELETE')
<button type="submit">Eliminar</button>
</form>
</td>
</tr>
@endforeach
</table>
@endsection
