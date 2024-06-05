@extends('layouts.cms')

@section('title', 'inactivos')

@section('context_button')
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
        class="fas fa-user-plus">
    </i>
    Agregar
</button>
@endsection

@section('header', 'Usuarios')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Usuarios</a></li>
    </ol>
</nav>
@endsection

@section('content')

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="/admin/user">Activos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/admin/inactivos">Inactivos</a>
  </li>
</ul>


@if (\Session::has('success'))
<div class="alert alert-success">
    <ul>
        <li>{!! \Session::get('success') !!}</li>
    </ul>
</div>
@endif

@if (\Session::has('correcto'))
<div class="alert alert-success">
    <ul>
        <li>{!! \Session::get('correcto') !!}</li>
    </ul>
</div>
@endif

@if (\Session::has('incorrecto'))
<div class="alert alert-success">
    <ul>
        <li>{!! \Session::get('incorrecto') !!}</li>
    </ul>
</div>
@endif





<table class="table">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Telefono</th>
            <th scope="col">Nivel</th>
            <th scope="col">Botones</th>
        </tr>
    </thead>
    <tbody>
    @php
        $counter = 1;
        @endphp
        @foreach ($users as $item)

        <tr>
        <td>{{ $counter++ }}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->phone}}</td>
            <td>@if ($item->level == 1)
                Admin
            @elseif ($item->level == 2)
                Proveedor
            @elseif ($item->level == 3)
                Cliente
            @endif</td>
            <td>
                <a href="" data-bs-toggle="modal" data-bs-target="#modalver{{$item->id}}"
                    class="btn btn-secondary btn-sm"><i class="fa-solid fa-circle-info"></i></a>

                <a href="" data-bs-toggle="modal" data-bs-target="#modaleditar{{$item->id}}"
                    class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>

                <a href="{{route('usuario.delete', $item->id)}}" class="btn btn-danger btn-sm"
                    data-bs-toggle="modal" data-bs-target="#modaleliminar{{$item->id}}"><i
                        class="fa-solid fa-trash-can"></i></a>
            </td>

            

        <!--Modal elminar-->
            <div class="modal" id="modaleliminar{{$item->id}}" tabindex="-1" aria-labelledby="modaleliminarLabel"  aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"  id="modalverLabel">Eliminar Usuario</h5>
                            
                        </div>
                        <div class="modal-body">
                            <p>¿Estas seguro de eliminar este usuario?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form method="POST" action="{{route('usuario.delete', $item->id)}}">
                                @csrf
                                <button type="submit" class="btn btn-primary">Eliminar</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>

            <!--modal ver -->

            <div class="modal fade" id="modalver{{$item->id}}" tabindex="-1" aria-labelledby="modalverLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modalverLabel">Informacion de usuario</h1>

                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-floating mb-3 col-6">
                                    <label for="">Nombre</label>
                                    <input type="text" class="form-control" id="floatingInput" name="name"
                                        value="{{$item->name}}" readonly>
                                    <label for="floatingInput"></label>
                                </div>
                                <div class="form-floating mb-3 col-6">
                                    <label for="">E-mail</label>
                                    <input type="email" class="form-control" id="floatingInput" name="email"
                                        value="{{$item->email}}" readonly>
                                    <label for="floatingInput"></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-floating mb-3 col-6">
                                    <label for="">Telefono</label>
                                    <input type="text" class="form-control" id="floatingInput" name="phone"
                                        value="{{$item->phone}}" readonly>
                                    <label for="floatingInput"></label>
                                </div>
                                <div class="form-floating mb-3 col-6">
                                    <label for="">Marca</label>
                                    <input type="text" class="form-control" id="floatingInput" name="brand"
                                        value="{{$item->brand}}" readonly>
                                    <label for="floatingInput"></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-floating mb-3 col-6">
                                    <label for="">Red Social</label>
                                    <input type="text" class="form-control" id="floatingInput" name="social"
                                        value="{{$item->social}}" readonly>
                                    <label for="floatingInput"></label>
                                </div>
                                <div class="form-floating mb-3 col-6">
                                    <label for="">Nivel</label>
                                    <input type="text" class="form-control" id="floatingInput" name="level"
                                        value="{{$item->level}}" readonly>
                                    <label for="floatingInput"></label>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--modal editar -->

            <div class="modal fade" id="modaleditar{{$item->id}}" tabindex="-1" aria-labelledby="modaleditarLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modaleditarLabel">Editar usuario</h1>

                        </div>
                        <div class="modal-body">
                            <form action="{{route('usuario.update', $item->id)}}" method="POST">
                                @csrf
                                @PATCH
                                <div class="row">
                                    <div class="form-floating mb-3 col-6">
                                        <label for="">Nombre</label>
                                        <input type="text" class="form-control" id="floatingInput" name="name"
                                            value="{{$item->name}}">
                                        <label for="floatingInput"></label>
                                    </div>
                                    <div class="form-floating mb-3 col-6">
                                        <label for="">E-mail</label>
                                        <input type="email" class="form-control" id="floatingInput" name="email"
                                            value="{{$item->email}}">
                                        <label for="floatingInput"></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-floating mb-3 col-6">
                                        <label for="">Telefono</label>
                                        <input type="text" class="form-control" id="floatingInput" name="phone"
                                            value="{{$item->phone}}">
                                        <label for="floatingInput"></label>
                                    </div>
                                    <div class="form-floating mb-3 col-6">
                                        <label for="">Marca</label>
                                        <input type="text" class="form-control" id="floatingInput" name="brand"
                                            value="{{$item->brand}}">
                                        <label for="floatingInput"></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-floating mb-3 col-6">
                                        <label for="">Red Social</label>
                                        <input type="text" class="form-control" id="floatingInput" name="social"
                                            value="{{$item->social}}">
                                        <label for="floatingInput"></label>
                                    </div>
                                    <div class="form-floating mb-3 col-6">
                                        <label for="">Nivel</label>
                                        <input type="text" class="form-control" id="floatingInput" name="level"
                                            value="{{$item->level}}">
                                        <label for="floatingInput"></label>
                                    </div>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </div>

                        </form>

                    </div>
                </div>
            </div>

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
                @foreach($users->links()->elements[0] as $page)

                <li class="page-item"><a class="page-link" href="{{$page}}">{{$i}}</a></li>
                @php
                $i++;
                @endphp
                @endforeach
            </ul>
        </nav>
    </div>
</div>


<!-- Modal agregar -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar usuario</h1>

            </div>
            <div class="modal-body">

                <form action="{{route('usuario.create')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-floating col-6">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control" id="floatingInput" placeholder="Nombre" name="name"
                                required>
                            <label for="floatingInput"></label>
                        </div>

                        <div class="form-floating col-6">
                            <label for="">E-mail</label>
                            <input type="email" class="form-control" id="floatingInput" placeholder="E-mail"
                                name="email" required>
                            <label for="floatingInput"></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-floating col-6">
                            <label for="">Telefono</label>
                            <input type="text" class="form-control" id="floatingInput" placeholder="Telefono"
                                name="phone" required>
                            <label for="floatingInput"></label>
                        </div>

                        <div class="form-floating col-6">
                            <label for="">Nivel</label>
                            <select class="form-control" type="number" class="form-control" placeholder="Nivel"
                                id="floatingInput" name="level" required>
                                <label for="floatingInput"></label>
                                <option value="1">Admin</option>
                                <option value="2">Proveedor</option>
                                <option value="3">Cliente</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-floating col-6">
                            <label for="">Marca</label>
                            <input type="text" class="form-control" id="floatingInput" placeholder="Marca" name="brand"
                                >
                            <label for="floatingInput"></label>
                        </div>
                        <div class="form-floating col-6">
                            <label for="">Red Social</label>
                            <input type="text" class="form-control" id="floatingInput" placeholder="Social"
                                name="social" >
                            <label for="floatingInput"></label>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>

            </div>
            </form>
        </div>
    </div>
</div>
@endsection
<!--dsaasd-->