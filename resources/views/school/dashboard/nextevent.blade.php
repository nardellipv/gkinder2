@section('style')
<link rel="stylesheet" href={{ asset( 'vendor/datatables/dataTables.bootstrap.css') }}>
@endsection
<div class="box box-solid box-success">
    <div class="box-header">
        <h3 class="box-title">Próximos Eventos</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Actividad</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>sala</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nextEvents as $event)
                <tr>
                    <td>{{ $event->activity }}</td>
                    <td>{{ substr($event->description,0,100) }}...</td>
                    <td>{{ $event->date }}</td>
                    <td>{{ $event->name }}</td>
                </tr>
                @endforeach
        </table>
    </div>
    <!-- /.box-body -->
</div>
@section('scripts')
<script src={{ asset( '/vendor/datatables/jquery.dataTables.min.js') }}></script>
<script src={{ asset( '/vendor/datatables/dataTables.bootstrap.min.js') }}></script>
<script>
    $(function () {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });
    });
</script>
@endsection