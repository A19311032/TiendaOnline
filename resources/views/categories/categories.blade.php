@extends('layouts.cms')

@section('title', 'Categorias')



@section('header', 'Categorias')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
    </ol>
</nav>
@endsection

@section('content')

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="/admin/productos/categorias">Ropa</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/admin/productos/cuidadopersonal">Cuidado Personal</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/admin/productos/bolsos">Bolsos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/admin/productos/accesorios">Accesorios</a>
  </li>
</ul>

<table class="table">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
        </tr>
    </thead>
    <tbody>
    @php
        $counter = 1;
        @endphp
        @foreach ($products as $item)

        <tr>
            <td>{{ $counter++ }}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->description}}</td>
        </tr>

        @endforeach

    </tbody>
</table>

<!--Paginaacion-->
<div class="row">
    <div class="col">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                @php
                $i=1
                @endphp
                @foreach($products->links()->elements[0] as $page)

                <li class="page-item"><a class="page-link" href="{{$page}}">{{$i}}</a></li>
                @php
                $i++;
                @endphp
                @endforeach
            </ul>
        </nav>
    </div>
</div>
@endsection