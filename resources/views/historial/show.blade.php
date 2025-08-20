@extends('layouts.app')
@section('content')
<h1>Detalle Historial #{{ $historial->id_historial }}</h1>
<p><strong>Acción:</strong> {{ $historial->accion }}</p>
<p><strong>Fecha:</strong> {{ $historial->fecha }}</p>
<p><strong>Usuario:</strong> {{ $historial->usuario->nombre }}</p>
<p><strong>Cotización:</strong> {{ $historial->cotizacion ? '#'.$historial->cotizacion->id_cotizacion : 'N/A' }}</p>
<a href="{{ route('historial.index') }}">Volver</a>
@endsection
