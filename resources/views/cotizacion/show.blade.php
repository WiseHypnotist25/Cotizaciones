@extends('layouts.app')
@section('content')
<h1>Detalle Cotización #{{ $cotizacion->id_cotizacion }}</h1>
<p><strong>Fecha:</strong> {{ $cotizacion->fecha }}</p>
<p><strong>Total:</strong> {{ $cotizacion->total }}</p>
<p><strong>Estado:</strong> {{ $cotizacion->estado }}</p>
<p><strong>Cliente:</strong> {{ $cotizacion->cliente->nombre }}</p>
<p><strong>Usuario:</strong> {{ $cotizacion->usuario->nombre }}</p>
<a href="{{ route('cotizacion.index') }}">Volver</a>
@endsection
