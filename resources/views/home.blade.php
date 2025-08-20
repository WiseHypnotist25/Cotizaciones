@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard</h1>
    <p>Bienvenido, {{ auth()->user()->nombre }}!</p>

    {{-- Mensaje de sesión --}}
    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="row mt-4">
        {{-- Clientes --}}
        <div class="col-md-4">
            <div class="card p-3">
                <h3>Clientes</h3>
                <p>Total: {{ $clientes->count() }}</p>
                <a href="{{ route('cliente.index') }}" class="btn btn-primary btn-sm">Ver Clientes</a>
                <a href="{{ route('cliente.create') }}" class="btn btn-success btn-sm">Agregar Cliente</a>
            </div>
        </div>

        {{-- Productos --}}
        <div class="col-md-4">
            <div class="card p-3">
                <h3>Productos</h3>
                <p>Total: {{ $productos->count() }}</p>
                <a href="{{ route('producto.index') }}" class="btn btn-primary btn-sm">Ver Productos</a>
                <a href="{{ route('producto.create') }}" class="btn btn-success btn-sm">Agregar Producto</a>
            </div>
        </div>

        {{-- Cotizaciones --}}
        <div class="col-md-4">
            <div class="card p-3">
                <h3>Cotizaciones</h3>
                <p>Total: {{ $cotizaciones->count() }}</p>
                <a href="{{ route('cotizacion.index') }}" class="btn btn-primary btn-sm">Ver Cotizaciones</a>
                <a href="{{ route('cotizacion.create') }}" class="btn btn-success btn-sm">Agregar Cotización</a>
            </div>
        </div>
    </div>

    {{-- Opcional: últimos registros --}}
    <div class="row mt-4">
        <div class="col-md-12">
            <h4>Últimas 5 Cotizaciones</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cotizaciones->take(5) as $cot)
                        <tr>
                            <td>{{ $cot->id_cotizacion }}</td>
                            <td>{{ $cot->cliente->nombre }}</td>
                            <td>{{ $cot->total }}</td>
                            <td>{{ ucfirst($cot->estado) }}</td>
                            <td>{{ $cot->fecha }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
