@extends('layouts.app')
@section('content')
<h1>Agregar Usuario</h1>
<form action="{{ route('usuario.store') }}" method="POST">
@csrf
<label>Nombre:</label><input type="text" name="nombre" required><br>
<label>Email:</label><input type="email" name="email" required><br>
<label>Password:</label><input type="password" name="password" required><br>
<label>Rol:</label>
<select name="rol" required>
<option value="admin">Admin</option>
<option value="vendedor">Vendedor</option>
<option value="supervisor">Supervisor</option>
</select><br>
<button type="submit">Guardar</button>
</form>
@endsection
