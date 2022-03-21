@extends('theme.base') <!-- Qué deseo extender-->

@section('content')
    <div class="container py-5 text-center">
        <h1>Proyecto 2</h1>
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
                @forelse ($clients as $client) <!--Muestra la lista de clientes -->
                <tr>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->due }}</td>
                    <td>
                        <a href="{{ route('client.edit', $client) }}" class= "btn btn-warning">Editar </a> <!--Creamos ruta y botón para editar -->
                        
                        <form action="{{ route('client.destroy',$client) }}" method="post" class="d-inline"> <!--Formulario para elmininar y botón -->
                        @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Desea eliminar cliente?')">Eliminar</button><!--Botón eliminar -->
                        </form>
                    </td>
                </tr>    
                @empty
                   <tr>
                        <td colspan="3">No hay registros</td>    
                   </tr> 
                @endforelse
              
            </tbody>
        </table>
       
        <!--Metodo de validación para por si la lista esta vacia no arroje error--> 
        @if ($clients->count())
        {{ $clients->links() }} <!--Permite movernos entre las páginas de los clientes-->  
        @endif
             <!--fin metodo--> 
    </div>
@endsection