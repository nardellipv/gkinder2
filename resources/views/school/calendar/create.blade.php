@extends('school.layouts.main')
@section('style')
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href={{ asset( 'vendor/daterangepicker/daterangepicker.css') }}>
@endsection
@section('content')
    @if (Session::has('message'))
        <p class="alert alert-success">{!! Session::get('message') !!}</p>
    @endif
    <div class="box box-solid box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Agregar Evento al calendario</h3>
        </div>
        {!! Form::open(['method' => 'POST','route' => ['calendario.store'],'style'=>'display:inline']) !!}
        {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group">
                    <label for="activity">Actividad</label>
                    <input type="text" class="form-control" id="activity" name="activity" placeholder="Actividad">
                </div>
                <div class="form-group">
                    <label>Descripción</label>
                    <textarea class="form-control" name="description" rows="3" placeholder="Descripción"></textarea>
                </div>
                <div class="form-group">
                    <label for="activity">Rango de Fecha</label>
                    <input type="text" id="date_range" name="date_range" class="form-control" value="">
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Crear Evento</button>
            </div>
        {!! Form::Close() !!}
    </div>
@endsection
@section('scripts')
    <script src={{ asset( '/vendor/datepicker/moment.js') }}></script>
    <script src={{ asset( '/vendor/datepicker/daterangepicker.js') }}></script>

    <script type="text/javascript">
        $('#date_range').daterangepicker();
        $(function() {
            $('input[name="date_range"]').daterangepicker({
                timePicker: true,
                "startDate": false,
                "endDate": false,
                "drops": "down",
                locale: {
                    format: 'YYYY/MM/DD h:mm A',
                    "applyLabel": "Guardar",
                    "cancelLabel": "Cancelar",
                    "fromLabel": "Desde",
                    "toLabel": "Hasta",
                    "customRangeLabel": "Personalizar",
                    "daysOfWeek": [
                        "Do",
                        "Lu",
                        "Ma",
                        "Mi",
                        "Ju",
                        "Vi",
                        "Sa"
                    ],
                    "monthNames": [
                        "Enero",
                        "Febrero",
                        "Marzo",
                        "Abril",
                        "Mayo",
                        "Junio",
                        "Julio",
                        "Agosto",
                        "Setiembre",
                        "Octubre",
                        "Noviembre",
                        "Diciembre"
                    ],
                }
            });
        });
    </script>
@endsection