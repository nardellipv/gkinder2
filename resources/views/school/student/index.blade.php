@extends('school.layouts.main')
@section('style')
    <link rel="stylesheet" href={{ asset( 'vendor/datatables/dataTables.bootstrap.css') }}>
@endsection
@section('content')
    @if (Session::has('message'))
        <p class="alert alert-danger">{!! Session::get('message') !!}</p>
    @endif
    <div class="box box-solid box-success">
        <div class="box-header">
            <h3 class="box-title">Listado de alumnos</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th width="100">Nombre</th>
                    <th>Apellido</th>
                    <th>DNI</th>
                    <th>Años</th>
                    <th>Sala</th>
                    <th>Tutor</th>
                    <th>Tel de contacto</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->last_name }}</td>
                        <td>{{ $student->dni }}</td>
                        <td>{{ Date::parse($student->birth_date)->age }}</td>
                        <td>{{ $student->room->name }}</td>
                        <td>{{$student->tutor->name}}</td>
                        <td>{{$student->tutor->phone}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{url('school/estudiantes', $student->id)}}" class="btn btn-primary">Perfil</a>
                                <button type="button" class="btn bg-red waves-effect waves-light" data-toggle="modal"
                                        data-target="#deleteStudentModal-{{$student->id}}">Eliminar
                                </button>
                            </div>
                        </td>
                    </tr>
                @include('school.student.delete')
                @endforeach
            </table>
        </div>
        <!-- /.box-body -->
    </div>
@endsection
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
