@extends('school.layouts.main') 
@section('content') 
@section('style')
<link rel="stylesheet" href={{ asset( 'vendor/datatables/dataTables.bootstrap.css') }}>
@endsection
@section('content') @if (Session::has('message'))
<p class="alert alert-danger">{!! Session::get('message') !!}</p>
@endif
<div class="box box-solid box-success">
    <div class="box-header">
        <h3 class="box-title">Listado de profesores</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="100">Nombre</th>
                    <th>Apellido</th>
                    <th>teléfono</th>                    
                    <th width="100">dirección</th>                    
                    <th>Email</th>
                    <th>room</th>                    
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->last_name }}</td>
                    <td>{{ $teacher->phone }}</td>                    
                    <td>{{ substr ($teacher->address,0,60) }}</td>                    
                    <td>{{ $teacher->email }}</td>                    
                    <td>{{ $teacher->room->name }}</td>                    
                    <td>
                        <div class="btn-group">
                        <a href="{{url('school/profesores', $teacher->id)}}" class="btn btn-primary">Perfil</a>
                        <button type="button" class="btn bg-red waves-effect waves-light" data-toggle="modal" 
                            data-target="#deleteTeacherModal-{{$teacher->id}}">Eliminar</button>
                        </div>
                    </td>
                </tr>
                @include('school.teacher.delete')
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
@endsection