@extends('layouts.app')
@section('content')
<h1>Agregar Cliente</h1>
<form action="{{ route('cliente.store') }}" method="POST">
@csrf
<label>Nombre:</label><input type="text" name="nombre" required><br>
<label>Email:</label><input type="email" name="email" required><br>
<label>Teléfono:</label><input type="text" name="telefono"><br>
<label>Dirección:</label><textarea name="direccion"></textarea><br>
<button type="submit">Guardar</button>
</form>
@endsection
