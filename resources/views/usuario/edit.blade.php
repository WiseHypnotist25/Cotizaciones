@extends('layouts.app')
@section('content')
<h1>Editar Usuario</h1>
<form action="{{ route('usuario.update',$usuario->id_usuario) }}" method="POST">
@csrf @method('PUT')
<label>Nombre:</label><input type="text" name="nombre" value="{{ $usuario->nombre }}" required><br>
<label>Email:</label><input type="email" name="email" value="{{ $usuario->email }}" required><br>
<label>Password (solo si quiere cambiar):</label><input type="password" name="password"><br>
<label>Rol:</label>
<select name="rol" required>
<option value="admin" {{ $usuario->rol=='admin'?'selected':'' }}>Admin</option>
<option value="vendedor" {{ $usuario->rol=='vendedor'?'selected':'' }}>Vendedor</option>
<option value="supervisor" {{ $usuario->rol=='supervisor'?'selected':'' }}>Supervisor</option>
</select><br>
<button type="submit">Actualizar</button>
</form>
@endsection
