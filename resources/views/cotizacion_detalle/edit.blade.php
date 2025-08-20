@extends('layouts.app')
@section('content')
<h1>Editar Detalle de Cotización</h1>
<form action="{{ route('cotizacion_detalle.update', $cotizacion_detalle->id_detalle) }}" method="POST">
@csrf @method('PUT')
<label>Cotización:</label>
<select name="id_cotizacion" required>
@foreach($cotizaciones as $c)
<option value="{{ $c->id_cotizacion }}" {{ $cotizacion_detalle->id_cotizacion==$c->id_cotizacion?'selected':'' }}>#{{ $c->id_cotizacion }}</option>
@endforeach
</select><br>
<label>Producto:</label>
<select name="id_producto" required>
@foreach($productos as $p)
<option value="{{ $p->id_producto }}" {{ $cotizacion_detalle->id_producto==$p->id_producto?'selected':'' }}>{{ $p->nombre }}</option>
@endforeach
</select><br>
<label>Cantidad:</label><input type="number" name="cantidad" value="{{ $cotizacion_detalle->cantidad }}" required><br>
<label>Subtotal:</label><input type="number" name="subtotal" step="0.01" value="{{ $cotizacion_detalle->subtotal }}" required><br>
<button type="submit">Actualizar</button>
</form>
@endsection
