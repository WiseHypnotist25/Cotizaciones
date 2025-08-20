@extends('layouts.app')
@section('content')
<h1>Agregar Detalle de Cotización</h1>
<form action="{{ route('cotizacion_detalle.store') }}" method="POST">
@csrf
<label>Cotización:</label>
<select name="id_cotizacion" required>
@foreach($cotizaciones as $c)
<option value="{{ $c->id_cotizacion }}">#{{ $c->id_cotizacion }}</option>
@endforeach
</select><br>
<label>Producto:</label>
<select name="id_producto" required>
@foreach($productos as $p)
<option value="{{ $p->id_producto }}">{{ $p->nombre }}</option>
@endforeach
</select><br>
<label>Cantidad:</label><input type="number" name="cantidad" required><br>
<label>Subtotal:</label><input type="number" name="subtotal" step="0.01" required><br>
<button type="submit">Guardar</button>
</form>
@endsection
