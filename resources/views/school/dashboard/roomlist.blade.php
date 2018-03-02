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
            <a href="{{url('school/salas', $room->id)}}" class="btn btn-primary">Editar</a>
            <button type="button" class="btn bg-red waves-effect waves-light" data-toggle="modal" data-target="#roomDeleteModal-{{$room->id}}">Eliminar</button>
          </div>
        </td>
      </tr>

      @include('school.room.delete')
      @endforeach
    </table>
  </div>
</div>