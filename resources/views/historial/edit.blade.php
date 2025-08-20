@extends('layouts.app')
@section('content')
<h1>Editar Historial</h1>
<form action="{{ route('historial.update',$historial->id_historial) }}" method="POST">
@csrf @method('PUT')
<label>Acción:</label><input type="text" name="accion" value="{{ $historial->accion }}" required><br>
<label>Fecha:</label><input type="datetime-local" name="fecha" value="{{ date('Y-m-d\TH:i', strtotime($historial->fecha)) }}" required><br>
<label>Usuario:</label>
<select name="id_usuario" required>
@foreach($usuarios as $u)
<option value="{{ $u->id_usuario }}" {{ $historial->id_usuario==$u->id_usuario?'selected':'' }}>{{ $u->nombre }}</option>
@endforeach
</select><br>
<label>Cotización (opcional):</label>
<select name="id_cotizacion">
<option value="">Ninguna</option>
@foreach($cotizaciones as $c)
<option value="{{ $c->id_cotizacion }}" {{ $historial->id_cotizacion==$c->id_cotizacion?'selected':'' }}>#{{ $c->id_cotizacion }}</option>
@endforeach
</select><br>
<button type="submit">Actualizar</button>
</form>
@endsection
