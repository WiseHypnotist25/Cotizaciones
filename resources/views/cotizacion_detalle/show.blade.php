@extends('layouts.app')
@section('content')
<h1>Detalle de Cotización #{{ $cotizacion_detalle->id_detalle }}</h1>
<p><strong>Cotización:</strong> #{{ $cotizacion_detalle->cotizacion->id_cotizacion }}</p>
<p><strong>Producto:</strong> {{ $cotizacion_detalle->producto->nombre }}</p>
<p><strong>Cantidad:</strong> {{ $cotizacion_detalle->cantidad }}</p>
<p><strong>Subtotal:</strong> {{ $cotizacion_detalle->subtotal }}</p>
<a href="{{ route('cotizacion_detalle.index') }}">Volver</a>
@endsection
