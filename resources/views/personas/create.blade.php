@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<a style="margin-top: 40px;" href="{{ url()->previous() }}" class="btn btn-danger">Volver</a>
<div class="card uper">
  <div class="card-header">
    Alta persona
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('personapublico.store') }}">
          <div class="form-group">
              @csrf
              <label for="nombre">Nombre:</label>
              <input type="text" class="form-control" name="nombre"/>
          </div>
          <div class="form-group">
              <label for="apellido">Apellido:</label>
              <input type="text" class="form-control" name="apellido"/>
          </div>
          <div class="form-group">
              <label for="edad">Edad:</label>
              <input type="text" class="form-control" name="edad"/>
          </div>
          <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
  </div>
</div>
@endsection
