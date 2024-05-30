@extends('layouts.cms')

@section('title', 'Apartados')

@section('header', 'Apartados')




@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Apartados</a></li>
    </ol>
</nav>
@endsection

@section('context_button')
<button type="button" class="btn btn-success" id="openModal" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="fa-solid fa-folder-plus"></i>
    <a>Nuevo Apartado</a>
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

@if (\Session::has('bien'))
<div class="alert alert-success">
    <ul>
        <li>{!! \Session::get('bien') !!}</li>
    </ul>
</div>
@endif

@if (\Session::has('mal'))
<div class="alert alert-danger">
    <ul>
        <li>{!! \Session::get('mal') !!}</li>
    </ul>
</div>
@endif


<div id="selectedItemsContainer" class="mt-4">
    <div class="row align-items-stretch">
        @foreach($layaways as $index => $layaway)
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title h5 font-weight-bold text-primary text-uppercase mb-1">
                        {{ $layaway->customer->name }}</h5>
                        <img src="{{asset('img/png.png')}}" class="img-fluid" alt="{{ $layaway->product?->name }}"/>
                    <p class="card-text text-xs mb-0 font-weight-bold text-gray-800">
                        Producto: {{ $layaway->product?->name }}
                    </p>
                    <p class="card-text text-xs mb-0 font-weight-bold text-gray-800">
                        Enganche: {{ $layaway->downpayment }} $
                    </p>

                    <div class="text-center mt-4">
                        <a href="{{route('apartado.delete', $layaway->id)}}" class="btn btn-secondary btn-sm"
                            data-bs-toggle="modal" data-bs-target="#modaleliminar{{$index}}"><i>Cancelar</i></a>
                        <button type="button" class="btn btn-success btn-sm"> <a href="{{route('venta')}}"
                                class="text-white text-decoration-none">Venta</a></button>
                    </div>
                </div>
            </div>
        </div>
        @if (($index + 1) % 4 === 0)
    </div>
    <div class="row align-items-stretch">
        @endif
        @endforeach
    </div>


    <!--Modales de eliminación-->
    @foreach($layaways as $index => $layaway)
    <div class="modal" id="modaleliminar{{$index}}" tabindex="-1" aria-labelledby="modaleliminarLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalverLabel">Cancelar Apartado</h5>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de cancelar este apartado?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <form method="POST" action="{{route('apartado.delete', $layaway->id)}}">
                        @csrf
                        <button type="submit" class="btn btn-primary">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach


    <!-- Modal agregar -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Apartado</h1>
                    <div>


                    </div>
                </div>

                <div class="modal-body">
                    <form action="{{route('apartado.create')}}" method="post">
                        @csrf

                        <div class="accordion" id="accordionExample">

                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left text-decoration-none"
                                            type="button" data-toggle="collapse" data-target="#collapseOne"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            Seleccione Cliente
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <select name="customer_id" id="customer_id" class="">
                                            @foreach ($users as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>

                                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#Modalagregar"><i class="fas fa-user-plus">
                                            </i>
                                            Agregar Cliente
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingproducto">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed text-decoration-none"
                                            type="button" data-toggle="collapse" data-target="#collapseproducto"
                                            aria-expanded="false" aria-controls="collapseproducto">
                                            Seleccione Producto
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseproducto" class="collapse" aria-labelledby="headingproducto"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div>
                                            <input type="text" id="searchInput" placeholder="Buscar producto" />
                                        </div>
                                        <br>
                                        <div class="row">

                                            @foreach ($products as $pro)
                                            <div class="col-md-3 product-item">
                                                <input type="checkbox" name="product_id" value="{{ $pro->id }}" />
                                                <div class="card mb-3">

                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $pro->name }}</h5>
                                                    </div>

                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="card">
                                <div class="card-header" id="headingenganche">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed text-decoration-none"
                                            type="button" data-toggle="collapse" data-target="#collapseenganche"
                                            aria-expanded="false" aria-controls="collapseenganche">
                                            Enganche
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseenganche" class="collapse" aria-labelledby="headingenganche"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <form>
                                            <div class="form">
                                                <label for="cantidadDinero">Cantidad de Dinero:</label>
                                                <input type="number" id="downpayment" name="downpayment"
                                                    placeholder="Ingrese la cantidad" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <input value="{{auth()->user()->id}}" name="user_id" type="hidden" />

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Agregar Apartado</button>
                            </div>

                    </form>

                </div>

            </div>

        </div>
    </div>
</div>

<!-- Modal agregar cliente -->
<div class="modal fade" id="Modalagregar" tabindex="-1" aria-labelledby="ModalagregarLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ModalagregarLabel">Agregar Cliente</h1>

            </div>
            <div class="modal-body">

                <form action="{{route('usuario.createlayaway')}}" id="nuevo-apartado-form" method="POST">
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
                                <option value="3">Cliente</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-floating col-6">
                            <label for="">Marca</label>
                            <input type="text" class="form-control" id="floatingInput" placeholder="Marca" name="brand">
                            <label for="floatingInput"></label>
                        </div>
                        <div class="form-floating col-6">
                            <label for="">Red Social</label>
                            <input type="text" class="form-control" id="floatingInput" placeholder="Social"
                                name="social">
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


<script>
    // Obtener el campo de búsqueda y todos los elementos de producto
    const searchInput = document.getElementById('searchInput');
    const productItems = document.querySelectorAll('.product-item');

    // Agregar un event listener para detectar cambios en el campo de búsqueda
    searchInput.addEventListener('input', function () {
        const searchTerm = searchInput.value.toLowerCase();

        // Iterar a través de los elementos de producto y mostrar/ocultar en función del término de búsqueda
        productItems.forEach(function (item) {
            const productName = item.querySelector('.card-title')
                .textContent.toLowerCase();
            if (productName.includes(searchTerm)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
</script>
@endsection