@extends('layouts.app')
@section('content')
<h1>Cotizaciones</h1>
<a href="{{ route('cotizacion.create') }}">Agregar Cotización</a>
@if(session('success')) <p>{{ session('success') }}</p> @endif
<table border="1" cellpadding="5">
<tr><th>ID</th><th>Fecha</th><th>Total</th><th>Estado</th><th>Cliente</th><th>Usuario</th><th>Acciones</th></tr>
@foreach($cotizaciones as $c)
<tr>
<td>{{ $c->id_cotizacion }}</td>
<td>{{ $c->fecha }}</td>
<td>{{ $c->total }}</td>
<td>{{ $c->estado }}</td>
<td>{{ $c->cliente->nombre }}</td>
<td>{{ $c->usuario->nombre }}</td>
<td>
<a href="{{ route('cotizacion.show',$c->id_cotizacion) }}">Ver</a> |
<a href="{{ route('cotizacion.edit',$c->id_cotizacion) }}">Editar</a> |
<form action="{{ route('cotizacion.destroy',$c->id_cotizacion) }}" method="POST" style="display:inline;">
@csrf @method('DELETE')
<button type="submit">Eliminar</button>
</form>
</td>
</tr>
@endforeach
</table>
@endsection
