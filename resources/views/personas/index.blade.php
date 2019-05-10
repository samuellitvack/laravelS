<html>
<head>
  <title>Administrar personas</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
  <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
</head>

<style>
  .uper {
    margin-top: 40px;
  }

  .acciones_menu {
    margin-left: 5cm;
  }
</style>
<body style="background-color: #f5ffea">
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <div class="acciones_menu">
     <a href="{{ url('/') }}" class="btn btn-danger">Volver</a>
     <a href="{{ url('/personas/create') }}" class="btn btn-success">Agregar</a><br><br>
  </div>

  <table id="table" class="table">
    <thead>
        <tr>
          <td>Nombre</td>
          <td>Apellido</td>
          <td>Edad</td>
          <td>DNI</td>
          <td>Acción</td>
        </tr>
    </thead>
    <tbody>
<!--
    <form action="{{ route('personas.index')}}" method="GET">
    <input class="form-control" type="text" name="nombre" placeholder="Filtrar por nombre">
    <button class="btn btn-primary" type="submit">Buscar</button>
    </form>
-->
    </tbody>
  </table>
<div>
<script>
  $(function() {
    //Inicializamos la tabla
      $('#table').DataTable({
          processing: true,
          serverSide: true,
          //Traducción
          language: {
            "search": "Buscar",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "zeroRecords": "No hay resultados",
            "paginate": {
              "first": "Primero",
              "last": "Ultimo",
              "next": "Siguiente",
              "previous": "Anterior"
            }
          },
          //Traemos los datos
          ajax: '{{ route('personas.index') }}',
          columns: [
            { data: 'nombre', name: 'nombre' },
            { data: 'apellido', name: 'apellido' },
            { data: 'edad', name: 'edad' },
            { data: 'dni', name: 'dni' },
            { data: 'accion', name:' accion'}
          ]
      });

      //Cuando hacemos click en Editar

      $('body').on('click', '.editar', function(){
        var persona_id = $(this).data("id"); //data-id
        window.location.href = "{{ route('personas.index') }}"+'/'+persona_id+'/edit';  //personas.edit
      });

      //Cuando hacemos click en Eliminar

      $('body').on('click', '.eliminar', function(){
        var persona_id = $(this).data("id"); //data-id
        $.ajax({
          type: "DELETE",
          url: "personas/"+persona_id,
          data: {
            "id": persona_id,
            "_token": "{{csrf_token()}}"
          },
          success: function (respuesta) {  //Problema: hay que recargar la página para ver los cambios. Se intentó con locatiom.reload(), table.reload(), table.ajax.reload(), etc.
            alert(respuesta.success);
          }
        });
      });
  });
</script>
</div>
</div>
</body>
</html>