@extends('tutor.layouts.main')
@section('style')
    <link rel="stylesheet" href={{ asset( 'vendor/datatables/dataTables.bootstrap.css') }}>
@endsection
@section('content')

    <div class="box box-solid box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Circulares</h3>
        </div>

        <div class="tab-content">

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
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#readModal-{{$circularActive->id}}">
                                        Ver Circular
                                    </button>
                                </td>
                            </tr>
                        @include('school.circular.read')
                        @endforeach
                    </table>
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