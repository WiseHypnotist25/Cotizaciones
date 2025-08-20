@extends('layouts.app')
@section('content')
<h1>Editar Cliente</h1>
<form action="{{ route('cliente.update',$cliente->id_cliente) }}" method="POST">
@csrf @method('PUT')
<label>Nombre:</label><input type="text" name="nombre" value="{{ $cliente->nombre }}" required><br>
<label>Email:</label><input type="email" name="email" value="{{ $cliente->email }}" required><br>
<label>Teléfono:</label><input type="text" name="telefono" value="{{ $cliente->telefono }}"><br>
<label>Dirección:</label><textarea name="direccion">{{ $cliente->direccion }}</textarea><br>
<button type="submit">Actualizar</button>
</form>
@endsection
