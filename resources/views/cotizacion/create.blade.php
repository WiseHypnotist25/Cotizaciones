@extends('layouts.app')
@section('content')
<h1>Agregar Cotización</h1>
<form action="{{ route('cotizacion.store') }}" method="POST">
@csrf
<label>Fecha:</label><input type="date" name="fecha" required><br>
<label>Total:</label><input type="number" name="total" step="0.01" required><br>
<label>Estado:</label>
<select name="estado" required>
<option value="pendiente">Pendiente</option>
<option value="enviada">Enviada</option>
<option value="aprobada">Aprobada</option>
<option value="rechazada">Rechazada</option>
</select><br>
<label>Cliente:</label>
<select name="id_cliente" required>
@foreach($clientes as $cli)
<option value="{{ $cli->id_cliente }}">{{ $cli->nombre }}</option>
@endforeach
</select><br>
<label>Usuario:</label>
<select name="id_usuario" required>
@foreach($usuarios as $u)
<option value="{{ $u->id_usuario }}">{{ $u->nombre }}</option>
@endforeach
</select><br>
<button type="submit">Guardar</button>
</form>
@endsection
