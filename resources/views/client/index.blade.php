@extends('theme.base') <!-- Qué deseo extender-->

@section('content')
    <div class="container py-5 text-center">
        <h1>Listado de Clientes</h1>
        <a href="{{ route('client.create')}} "class="btn btn-primary">Crear Clientes</a>
<!--Condicional para lanzar la alerta de registro-->
        @if (Session::has('mensaje'))
            <div class="alert alert-info my-5"></div>
            {{ Session::get('mensaje') }}
        @endif
<!--  Fin del if -->
        <table class="table">
            <thead>
             <th>Nombre</th>
             <th>Saldo</th>
             <th>Acciones</th>   
            </thead>
            <tbody>
                <tr>
                    <td>FelinoHost</td>
                    <td>0.00</td>
                    <td>Editar - Eliminar</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection