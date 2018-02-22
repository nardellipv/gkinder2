<div class="box box-solid box-warning">
  <div class="box-header">
    <h3 class="box-title">Listado de salas</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body table-responsive no-padding">
    <table class="table table-hover">
      <tr>
        <th>Nombre Sala</th>
        <th>Cantidad Alumnos</th>
        <th>Docente a cargo</th>
        <th>Creada</th>
        <th>Acciones</th>
      </tr>
      @foreach ($rooms as $room)
      <tr>
        <td>{{ $room->name }} </td>
        <td>{{ $room->cantidad }}</td>
        <td>{{ $room->nameTeacher }}</td>
        <td>{{ $room->created_at->format('d/m/y') }}</td>
        <td>
          <div class="btn-group">
            <button type="button" class="btn btn-primary">Editar</button>
            <button type="button" class="btn btn-danger">Eliminar</button>
          </div>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>