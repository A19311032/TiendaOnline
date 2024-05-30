@extends('layouts.cms', ['notifacaciones' => $notificaciones])

@section('title', 'PAGINA - El Surtido Feliz')

@section('header', 'Dashboard')

@section('breadcrumb')


<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
    </ol>
</nav>
@endsection

@section('content')
<h2>Resultados de la búsqueda:</h2>

<h3>Proveedores:</h3>
<div class="card-container">
    <ul>
        @foreach ($proveedores as $proveedorItem)
        <a href="{{route('proveedor')}}" class="text-decoration-none">
        <div class="card">
            <li>{{ $proveedorItem->name }}</li>
            <li>{{ $proveedorItem->email }}</li>
            <li>{{ $proveedorItem->brand }}</li>
        </div>
        @endforeach
    </ul>
</div>
<h3>Productos:</h3>
<div class="card-container">
    <ul>
    @foreach ($productos as $productoItem)
    <a href="{{route('producto')}}" class="text-decoration-none">
    <div class="card">
    <h4> <li>{{ $productoItem->name }}</li></h4>
        <li>{{ $productoItem->description }}</li>
    </div>
    @endforeach
    </ul>
</div>

<h3>Clientes:</h3>
<div class="card-container">
    <ul>
        @foreach ($clientes as $clienteItem)
        <a href="{{route('cliente')}}" class="text-decoration-none">
        <div class="card">
            <li>{{ $clienteItem->name }}</li>
            <li>{{ $clienteItem->email }}</li>
        </div>
        @endforeach
    </ul>
</div>

<style>
        .card-container {
            display: flex;
            gap: 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        .card {
            min-width: 300px;
            flex: 0 0 auto;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-right: 20px;
        }

        ul {
            list-style: none;
            padding: 0;
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto; /* Agrega una barra de desplazamiento horizontal si los elementos desbordan el contenedor */
        }

        ul li {
            margin-right: 20px; /* Ajusta el espacio entre los elementos */
        }
    </style>
@endsection






