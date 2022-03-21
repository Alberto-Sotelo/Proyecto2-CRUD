<!-- Este formulario es para Crear a a los clientes-->

@extends('theme.base') <!-- Qué deseo extender-->

@section('content')
    <div class="container py-5 text-center">
   <!--Metodo de verificación para saber si sí estamos editando y trabajando sobre el form-->     
        @if (isset($client))
            <h1>Editar cliente</h1>
        @else 
            <h1>Crear cliente</h1>
        @endif
        

        @if (isset($client))
        <form action="{{ route('client.update', $client) }}" method="post"> <!--Se usa el metodo post ya que haremos referencias a objetos--> 
            @method('PUT')
    @else 
       <form action="{{ route('client.store') }}" method="post"> 
    @endif


   <!-- Fin del metodo-->
        
   
        @csrf  <!-- Token para brindar seguridad--> 
          
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" placeholder="Nombre del cliente" value="{{ old('name') ?? @$client->name }}">
            <p class="form-text">Ingrese el nombre del cliente</p>
            @error('name')
            <p class="form-text text-danger">{{ $message }}</p>  
            @enderror
        </div>

        <div class="mb-3">
            <label for="due" class="form-label">Saldo</label>
            <input type="number" name="due" class="form-control" placeholder="Saldo del cliente" step="0.01" value="{{ old('due') ?? @$client->due}}">
            <p class="form-text">Ingrese saldo del cliente</p>
            @error('due')
            <p class="form-text text-danger">{{ $message }}</p>  
            @enderror
        </div>

        <div class="mb-3">
            <label for="comments" class="form-label">Comentarios</label>
            <textarea name="comments" cols="30" rows="4" class="form-control">{{ old('comments') ?? @$client->comments }}</textarea>
            <p class="form-text">Deja tus comentarios</p>
        </div>

        @if (isset($client))
        <button type="submit" class="btn btn-info">Editar Cliente </button>

        @else 
        <button type="submit" class="btn btn-info">Guardar Cliente </button>
 
        @endif

        
        </form>
    
    </div>
@endsection