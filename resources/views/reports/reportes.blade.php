@extends('layouts.cms')

@section('title', 'Reportes')

@section('header', 'Reportes')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Reportes</a></li>
    </ol>
</nav>
@endsection

@section('content')

<div id="accordion">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link  text-decoration-none" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    Reporte de Usuarios
                </button>
            </h5>
        </div>

        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        Usuarios
                    </div>
                    <div class="col text-right">
                        <a href="{{route('usuarios')}}" target="_blank" class="btn btn-primary btn-sm">Ver</a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        Proveedores
                    </div>
                    <div class="col text-right">
                        <a href="{{route('prove')}}" target="_blank" class="btn btn-primary btn-sm">Ver</a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        Clientes
                    </div>
                    <div class="col text-right">
                        <a href="{{route('clie')}}" target="_blank" class="btn btn-primary btn-sm">Ver</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link text-decoration-none" data-toggle="collapse" data-target="#collapsepro"
                        aria-expanded="false" aria-controls="collapsepro">
                        Reporte de Productos
                    </button>
                </h5>
            </div>

            <div id="collapsepro" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">

                    <div class="row">
                        <div class="col">
                            Productos
                        </div>
                        <div class="col text-right">
                            <a href="{{route('prod')}}" target="_blank" class="btn btn-primary btn-sm">Ver</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div id="accordion">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-decoration-none" data-toggle="collapse"
                            data-target="#collapseventas" aria-expanded="true" aria-controls="collapseventas">
                            Reporte de Ventas
                        </button>
                    </h5>
                </div>

                <div id="collapseventas" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">

                        <div class="card">
                            <div class="card-header" id="headingven">
                                <h5 class="mb-0">
                                    <button class="btn btn-link text-decoration-none" data-toggle="collapse"
                                        data-target="#collapseven" aria-expanded="true"
                                        aria-controls="collapseven">
                                        Ventas
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseven" class="collapse" aria-labelledby="headingven"
                                data-parent="#accordionNested">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            Ventas
                                        </div>
                                        <div class="col text-right">
                                            <a href="{{route('ven')}}" target="_blank"
                                                class="btn btn-primary btn-sm">Ver</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="accordionNested">
                            <div class="card">
                                <div class="card-header" id="headingNested">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link text-decoration-none" data-toggle="collapse"
                                            data-target="#collapseNested" aria-expanded="true"
                                            aria-controls="collapseNested">
                                            Reporte por Fechas
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseNested" class="collapse" aria-labelledby="headingNested"
                                    data-parent="#accordionNested">
                                    <div class="card-body">
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="fechaInicial">Fecha Inicial:</label>
                                                <input type="date" id="fechaInicial" name="fechaInicial">
                                            </div>
                                            <div class="col">
                                                <label for="fechaFinal">Fecha Final:</label>
                                                <input type="date" id="fechaFinal" name="fechaFinal">
                                            </div>
                                            <div class="col text-right">
                                                <a href="" target="_blank" class="btn btn-primary btn-sm">Ver</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Nuevo collapse por categoría -->
                            <div class="card">
                                <div class="card-header" id="headingCategoria">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link text-decoration-none" data-toggle="collapse"
                                            data-target="#collapseCategoria" aria-expanded="true"
                                            aria-controls="collapseCategoria">
                                            Reporte por Categoría
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseCategoria" class="collapse" aria-labelledby="headingCategoria"
                                    data-parent="#accordionNested">
                                    <div class="card-body">
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="categoria">Categoría:</label>
                                                <select id="categoria" name="categoria">
                                                    <option value="1">Ropa</option>
                                                    <option value="2">Cuidado Personal</option>
                                                    <option value="3">Bolsos</option>
                                                    <option value="4">Accesorios</option>
                                                </select>
                                            </div>
                                            <div class="col text-right">
                                                <a href="" target="_blank" class="btn btn-primary btn-sm">Ver</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    @endsection