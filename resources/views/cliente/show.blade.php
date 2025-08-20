@extends('layouts.app')
@section('content')
<h1>Detalle Cliente</h1>
<p><strong>ID:</strong> {{ $cliente->id_cliente }}</p>
<p><strong>Nombre:</strong> {{ $cliente->nombre }}</p>
<p><strong>Email:</strong> {{ $cliente->email }}</p>
<p><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>
<p><strong>Dirección:</strong> {{ $cliente->direccion }}</p>
<a href="{{ route('cliente.index') }}">Volver</a>
@endsection
