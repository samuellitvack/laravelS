<center>
<h1>Planilla de Personas</h1>
<table id="table" class="table">
    <thead>
        <tr>
          <td><b>Nombre</b></td>
          <td><b>Apellido</b></td>
          <td><b>Edad</b></td>
          <td><b>DNI</b></td>
        </tr>
    </thead>
    @foreach ($personas as $persona)
    <tbody>
       <tr> 
          <td>{{ $persona->nombre }}</td>
          <td>{{ $persona->apellido }}</td>
          <td>{{ $persona->edad }}</td>
          <td>{{ $persona->dni }}</td>
        </tr>
    </tbody>
    @endforeach
</table>
</center>