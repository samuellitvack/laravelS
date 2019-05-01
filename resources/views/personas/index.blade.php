@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <a href="{{ url('/') }}" class="btn btn-danger">Volver</a>
  <a href="{{ route('personas.create')}}" class="btn btn-success">Agregar</a><br><br>
  <table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
          <td>Nombre</td>
          <td>Apellido</td>
          <td>Edad</td>
          <td colspan="2">Acción</td>
        </tr>
    </thead>
    <tbody>
        @foreach($personas as $persona)
        <tr>
            <td>{{$persona->nombre}}</td>
            <td>{{$persona->apellido}}</td>
            <td>{{$persona->edad}}</td>
            <td><a href="{{ route('personas.edit',$persona->id)}}" class="btn btn-primary">Editar</a>
                <form action="{{ route('personas.destroy', $persona->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection