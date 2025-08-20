@extends('layouts.app')
@section('content')
<h1>Editar Cotización</h1>
<form action="{{ route('cotizacion.update', $cotizacion->id_cotizacion) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Fecha:</label>
    <input type="date" name="fecha" value="{{ $cotizacion->fecha }}" required><br>
    
    <label>Total:</label>
    <input type="number" name="total" step="0.01" value="{{ $cotizacion->total }}" required><br>
    
    <label>Estado:</label>
    <select name="estado" required>
        <option value="pendiente" {{ $cotizacion->estado=='pendiente'?'selected':'' }}>Pendiente</option>
        <option value="enviada" {{ $cotizacion->estado=='enviada'?'selected':'' }}>Enviada</option>
        <option value="aprobada" {{ $cotizacion->estado=='aprobada'?'selected':'' }}>Aprobada</option>
        <option value="rechazada" {{ $cotizacion->estado=='rechazada'?'selected':'' }}>Rechazada</option>
    </select><br>
    
    <label>Cliente:</label>
    <select name="id_cliente" required>
        @foreach($clientes as $cli)
            <option value="{{ $cli->id_cliente }}" {{ $cotizacion->id_cliente==$cli->id_cliente?'selected':'' }}>
                {{ $cli->nombre }}
            </option>
        @endforeach
    </select><br>
    
    <label>Usuario:</label>
    <select name="id_usuario" required>
        @foreach($usuarios as $u)
            <option value="{{ $u->id_usuario }}" {{ $cotizacion->id_usuario==$u->id_usuario?'selected':'' }}>
                {{ $u->nombre }}
            </option>
        @endforeach
    </select><br>
    
    <button type="submit">Actualizar</button>
</form>
@endsection
