@extends('layouts.app')

@section('content')
<div class="container-sm">
    <h1>Catálogo de Productos</h1>
    <div class="row">
        @foreach($productos as $producto)
        <div class="col-md-3 mb-3">
            <div class="card">
                <div style="height: 200px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                    <img src="{{ asset('images/' . $producto->imagen) }}" class="card-img-top" alt="{{ $producto->descripcion }}" style="max-height: 100%; max-width: 100%;">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $producto->descripcion }}</h5>
                    <p class="card-text">Precio: ${{ $producto->precio }}</p>
                    <p class="card-text">Cantidad Disponible: {{ $producto->cantidad }}</p>
                    <form action="{{ route('ventas.registrar') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="cantidad">Cantidad a Vender</label>
                            <input type="number" class="form-control" id="cantidad" name="ventas[{{ $producto->id }}][cantidad]" min="0" max="{{ $producto->cantidad }}">
                            <input type="hidden" name="ventas[{{ $producto->id }}][producto_id]" value="{{ $producto->id }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Vender</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
