@extends('school.layouts.main')
@section('style')
    <link rel="stylesheet" href={{ asset( 'vendor/datatables/dataTables.bootstrap.css') }}>
@endsection
@section('content')

    @include('layouts.message_errors')
    @include('layouts.message_success')


    <div class="box box-solid box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Circulares</h3>
        </div>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Circulares Activas</a></li>
                <li><a href="#tab_2" data-toggle="tab">Circulares Archivadas</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="box">
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Contenido</th>
                                    <th>Fecha</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($circularesActive as $circularActive)
                                    <tr>
                                        <td>{{ substr(($circularActive->title),0,50) }}</td>
                                        <td>{!! substr(($circularActive->body), 0, 100) !!}</td>
                                        <td>{{ Date::parse($circularActive->date)->format('d/m/Y') }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#readModal-{{$circularActive->id}}">
                                                    Ver
                                                </button>
                                                <a href="{{ url('school/circulares', $circularActive->id) }}" type="button" class="btn btn-primary">
                                                    Editar
                                                </a>
                                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#disableModal-{{$circularActive->id}}">
                                                    Despublicar
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @include('school.circular.read')
                                @include('school.circular.disable')
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="tab_2">
                    <div class="box">
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Contenido</th>
                                    <th>Fecha</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($circularesDisable as $circularDisable)
                                    <tr>
                                        <td>{{ substr(($circularDisable->title),0,50) }}</td>
                                        <td>{!! substr(($circularDisable->body), 0, 100) !!}</td>
                                        <td>{{ Date::parse($circularDisable->date)->format('d/m/Y') }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#readDisableModal-{{$circularDisable->id}}">
                                                    Ver
                                                </button>
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#activeModal-{{$circularDisable->id}}">
                                                    Activar
                                                </button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#deleteModal-{{$circularDisable->id}}">
                                                    Borrar
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @include('school.circular.readDisable')
                                @include('school.circular.active')
                                @include('school.circular.delete')
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src={{ asset( '/vendor/datatables/jquery.dataTables.min.js') }}></script>
    <script src={{ asset( '/vendor/datatables/dataTables.bootstrap.min.js') }}></script>
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable();
        });
    </script>
@endsection