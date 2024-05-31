@extends('layouts.cms', ['notifacaciones' => $notificaciones])

@section('title', 'PAGINA - Sun Concept Store')

@section('header', 'Perfil')

@section('breadcrumb')

@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Perfil</div>

                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form method="POST" action="{{ route('perfil.update') }}">
                        @csrf
                        @method('POST')
<!--hola-->
<!--prueba-->
                        <div class="form-group">
                            <label for="phone">Teléfono</label>
                            <input type="text" name="phone" value="{{ $user->phone }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="correo">Correo Electrónico</label>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password">Nueva Contraseña</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirmar Nueva Contraseña</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Actualizar Perfil</button>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
</div>

@endsection