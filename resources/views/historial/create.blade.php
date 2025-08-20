@extends('layouts.app')
@section('content')
<h1>Agregar Historial</h1>
<form action="{{ route('historial.store') }}" method="POST">
@csrf
<label>Acción:</label><input type="text" name="accion" required><br>
<label>Fecha:</label><input type="datetime-local" name="fecha" required><br>
<label>Usuario:</label>
<select name="id_usuario" required>
@foreach($usuarios as $u)
<option value="{{ $u->id_usuario }}">{{ $u->nombre }}</option>
@endforeach
</select><br>
<label>Cotización (opcional):</label>
<select name="id_cotizacion">
<option value="">Ninguna</option>
@foreach($cotizaciones as $c)
<option value="{{ $c->id_cotizacion }}">#{{ $c->id_cotizacion }}</option>
@endforeach
</select><br>
<button type="submit">Guardar</button>
</form>
@endsection
