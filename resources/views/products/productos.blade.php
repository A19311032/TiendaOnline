@extends('layouts.cms')

@section('title', 'Productos')

@section('header', 'Productos')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Productos</a></li>
    </ol>
</nav>
@endsection

@section('context_button')
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
        class="fa-solid fa-folder-plus">

    </i>
    <a>Agregar</a>
</button>
@endsection

@section('content')

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
            <th scope="col">Descripcion</th>
            <th scope="col">Botones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $item)
        <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->description}}</td>

            <td>
                <a href="" data-bs-toggle="modal" data-bs-target="#modalver{{$item->id}}"
                    class="btn btn-secondary btn-sm"><i class="fa-solid fa-circle-info"></i></a>

                <a href="" data-bs-toggle="modal" data-bs-target="#modaleditar{{$item->id}}"
                    class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>

                <a href="{{route('producto.delete', $item->id)}}" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                    data-bs-target="#modaleliminar{{$item->id}}"><i class="fa-solid fa-trash-can"></i></a>
            </td>

            <!--Modal elminar-->
            <div class="modal" id="modaleliminar{{$item->id}}" tabindex="-1" aria-labelledby="modaleliminarLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalverLabel">Eliminar Producto</h5>

                        </div>
                        <div class="modal-body">
                            <p>¿Estas seguro de eliminar este producto?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form method="POST" action="{{route('producto.delete', $item->id)}}">
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
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modalverLabel">Informacion de Producto</h1>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="form-floating mb-3 col-6">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" id="floatingInput" name="name"
                                        value="{{$item->name}}" readonly>
                                    <label for="floatingInput"></label>
                                </div>
                                <div class="form-floating mb-3 col-6">
                                    <label>Descripcion</label>
                                    <input type="text" class="form-control" id="floatingInput" name="description"
                                        value="{{$item->description}}" readonly>
                                    <label for="floatingInput"></label>
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-floating mb-3 col-6">
                                    <label>Foto</label>
                                    <input type="text" class="form-control" id="floatingInput" name="picture"
                                        value="{{$item->picture}}" readonly>
                                    <label for="floatingInput"></label>
                                </div>
                                <div class="form-floating mb-3 col-6">
                                    <label>Existencia</label>
                                    <input type="text" class="form-control" id="floatingInput" name="stock"
                                        value="{{$item->stock}}" readonly>
                                    <label for="floatingInput"></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-floating mb-3 col-6">
                                    <label>Id_categoria</label>
                                    <input type="text" class="form-control" id="floatingInput" name="category_id"
                                        value="{{$item->category_id}}" readonly>
                                    <label for="floatingInput"></label>
                                </div>
                                <div class="form-floating mb-3 col-6">
                                    <label>Id_User</label>
                                    <input type="text" class="form-control" id="floatingInput" name="user_id"
                                        value="{{$item->user_id}}" readonly>
                                    <label for="floatingInput"></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-floating mb-3 col-6">
                                    <label>Precio</label>
                                    <input type="text" class="form-control" id="floatingInput" name="price"
                                        value="{{$item->price}}" readonly>
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
                            <h1 class="modal-title fs-5" id="modaleditarLabel">Modificar Producto</h1>

                        </div>
                        <div class="modal-body">
                            <form action="{{route('producto.update', $item->id)}}" method="POST">
                                @csrf
                                @PATCH
                                <div class="row">
                                    <div class="form-floating mb-3 col-6">
                                        <label>Nombre</label>
                                        <input type="text" class="form-control" id="floatingInput" name="name"
                                            value="{{$item->name}}">
                                        <label for="floatingInput"></label>
                                    </div>
                                    <div class="form-floating mb-3 col-6">
                                        <label>Descripcion</label>
                                        <input type="text" class="form-control" id="floatingInput" name="description"
                                            value="{{$item->description}}">
                                        <label for="floatingInput"></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-floating mb-3 col-6">
                                        <label>Foto</label>
                                        <input type="text" class="form-control" id="floatingInput" name="picture"
                                            value="{{$item->picture}}">
                                        <label for="floatingInput"></label>
                                    </div>
                                    <div class="form-floating mb-3 col-6">
                                        <label>Existencia</label>
                                        <input type="text" class="form-control" id="floatingInput" name="stock"
                                            value="{{$item->stock}}">
                                        <label for="floatingInput"></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-floating mb-3 col-6">
                                        <label>Id_categoria</label>
                                        <input type="text" class="form-control" id="floatingInput" name="category_id"
                                            value="{{$item->category_id}}">
                                        <label for="floatingInput"></label>
                                    </div>
                                    <div class="form-floating mb-3 col-6">
                                        <label>Id_user</label>
                                        <input type="text" class="form-control" id="floatingInput" name="user_id"
                                            value="{{$item->user_id}}">
                                        <label for="floatingInput"></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-floating mb-3 col-6">
                                        <label>Precio</label>
                                        <input type="text" class="form-control" id="floatingInput" name="price"
                                            value="{{$item->price}}">
                                        <label for="floatingInput"></label>
                                    </div>

                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                            </form>
                        </div>
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

<!-- Modal agregar -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Producto</h1>

            </div>
            <div class="modal-body">
                <form action="{{route('producto.create')}}" method="POST">
                    @csrf
                    <div class="row">
                        
                        <div class="form-floating col-6">
                        <label>Nombre</label>
                            <input type="text" class="form-control" id="floatingInput" placeholder="Nombre" name="name"
                                required>
                            <label for="floatingInput"></label>
                        </div>

                       
                        <div class="form-floating col-6">
                        <label>Descripcion</label>
                            <input type="text" class="form-control" id="floatingInput" placeholder="Descripcion"
                                name="description" required>
                            <label for="floatingInput"></label>
                        </div>
                    </div>
                    <div class="row">
                       
                        <div class="form-floating col-6">
                        <label>Foto</label>
                            <input type="text" class="form-control" id="floatingInput" placeholder="Foto" name="picture"
                                required>
                            <label for="floatingInput"></label>
                        </div>

                        
                        <div class="form-floating col-6">
                        <label>Categoria</label>
                            <select type="number" class="form-control" id="floatingInput" placeholder="id_categoria"
                                name="category_id" required>
                                <label for="floatingInput"></label>
                                <option value="1">Ropa</option>
                                <option value="2">Cuidado Personal</option>
                                <option value="3">Bolsos</option>
                                <option value="4">Accesorios</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        
                        <div class="form-floating col-6">
                        <label>Existencia</label>
                            <input type="text" class="form-control" id="floatingInput" placeholder="existencias"
                                name="stock" required>
                            <label for="floatingInput"></label>
                        </div>
                     
                      
                        <div class="form-floating col-6">
                        <label>Proveedor</label>
                            <select type="number" class="form-control" id="floatingInput" placeholder="Proveedor"
                                name="user_id" required>
                            <label for="floatingInput"></label>
                            @foreach ($users as $prov)
                            <option value="{{$prov->id}}">{{$prov->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        
                    </div>

                    <div class="row">
                        
                        <div class="form-floating col-6">
                        <label>Precio</label>
                            <input type="number" class="form-control" id="floatingInput" placeholder="Precio"
                                name="price" required>
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