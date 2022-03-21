<!-- Este formulario es para Crear a a los clientes-->

@extends('theme.base') <!-- Qué deseo extender-->

@section('content')
    <div class="container py-5 text-center">
        <h1>Crear cliente</h1>
   
        <form action="{{ route('client.store') }}" method="post"> <!--Se usa el metodo post ya que haremos referencias a objetos-->
        @csrf  <!-- Token para brindar seguridad--> 
          
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" placeholder="Nombre del cliente">
            <p class="form-text">Ingrese el nombre del cliente</p>
            @error('name')
            <p class="form-text text-danger">{{ $message }}</p>  
            @enderror
        </div>

        <div class="mb-3">
            <label for="due" class="form-label">Saldo</label>
            <input type="number" name="due" class="form-control" placeholder="Saldo del cliente" step="0.01">
            <p class="form-text">Ingrese saldo del cliente</p>
            @error('due')
            <p class="form-text text-danger">{{ $message }}</p>  
            @enderror
        </div>

        <div class="mb-3">
            <label for="comments" class="form-label">Comentarios</label>
            <textarea name="comments" cols="30" rows="4" class="form-control"></textarea>
            <p class="form-text">Deja tus comentarios</p>
        </div>

        <button type="submit" class="btn btn-info">Guardar Cliente </button>

        </form>
    
    </div>
@endsection