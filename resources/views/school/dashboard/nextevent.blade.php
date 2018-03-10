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
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>sala</th>
                <th>Acción</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($nextEvents as $event)
                <tr>
                    <td>{{ $event->activity }}</td>
                    <td>{{ substr($event->description,0,100) }}...</td>
                    <td>{{Date::parse($event->date_start)->format('l j F Y H:i')}}</td>
                    <td>{{Date::parse($event->date_end)->format('l j F Y H:i')}}</td>
                    <td>{{$event->Room->name}}</td>
                    <td>
                        {!! Form::open(['method' => 'DELETE','route' => ['calendario.destroy', $event->id],'style'=>'display:inline']) !!}
                        {{Form::token() }}
                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        {{Form::Close()}}

                        <a href="{{url('school/calendario', $event->id)}}" class="btn btn-info"><i
                                    class="fa fa-pencil"></i></a>
                    </td>
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