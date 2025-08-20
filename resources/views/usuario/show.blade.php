@extends('layouts.app')
@section('content')
<h1>Detalle Usuario</h1>
<p><strong>ID:</strong> {{ $usuario->id_usuario }}</p>
<p><strong>Nombre:</strong> {{ $usuario->nombre }}</p>
<p><strong>Email:</strong> {{ $usuario->email }}</p>
<p><strong>Rol:</strong> {{ $usuario->rol }}</p>
<a href="{{ route('usuario.index') }}">Volver</a>
@endsection
