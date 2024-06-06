@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Realizar Venta</h1>
    <form action="{{ route('ventas.registrar') }}" method="POST">
        @csrf
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad Disponible</th>
                    <th>Cantidad a Vender</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->descripcion }}</td>
                    <td>{{ $producto->cantidad }}</td>
                    <td>
                        <input type="number" name="cantidad[]" min="0" max="{{ $producto->cantidad }}">
                        <input type="hidden" name="producto_id[]" value="{{ $producto->id }}">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Registrar Ventas</button>
    </form>
</div>
@endsection
