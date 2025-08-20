@extends('layouts.app')
@section('content')
<h1>Detalles de Cotizaciones</h1>
<a href="{{ route('cotizacion_detalle.create') }}">Agregar Detalle</a>
@if(session('success')) <p>{{ session('success') }}</p> @endif
<table border="1" cellpadding="5">
<tr><th>ID</th><th>Cotización</th><th>Producto</th><th>Cantidad</th><th>Subtotal</th><th>Acciones</th></tr>
@foreach($detalles as $d)
<tr>
<td>{{ $d->id_detalle }}</td>
<td>{{ $d->cotizacion->id_cotizacion }}</td>
<td>{{ $d->producto->nombre }}</td>
<td>{{ $d->cantidad }}</td>
<td>{{ $d->subtotal }}</td>
<td>
<a href="{{ route('cotizacion_detalle.show',$d->id_detalle) }}">Ver</a> |
<a href="{{ route('cotizacion_detalle.edit',$d->id_detalle) }}">Editar</a> |
<form action="{{ route('cotizacion_detalle.destroy',$d->id_detalle) }}" method="POST" style="display:inline;">
@csrf @method('DELETE')
<button type="submit">Eliminar</button>
</form>
</td>
</tr>
@endforeach
</table>
@endsection
