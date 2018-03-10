@extends('school.layouts.main')
@section('style')
    <link rel="stylesheet" href={{ asset( 'vendor/iCheck/all.css') }}>
@endsection
@section('content')

    @include('layouts.message_errors')
    @include('layouts.message_success')

    <div class="box box-solid box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Agregar nuevo alumno
                <small class="text-yellow">antes de agregar un alumno, agregue al tutor</small>
            </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            {!! Form::open(['method' => 'POST','route' => ['estudiantes.store'],'style'=>'display:inline','enctype' => 'multipart/form-data']) !!}
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <div class="form-group">
                        <input class="form-control input-lg" type="text" placeholder="Nombre" name="nombre"
                               value="{{old('nombre')}}" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control input-lg" type="text" placeholder="Apellido" name="apellido"
                               value="{{old('apellido')}}" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control input-lg" type="text" placeholder="DNI" name="dni" value="{{old('dni')}}" required>
                    </div>
                    <div class="form-group">
                        <label>Sexo</label>
                        <div class="radio" required>
                            <label>
                                <input type="radio" name="sexo" class="minimal" value="NENE">
                                Nene
                            </label>
                            <label>
                                <input type="radio" name="sexo" class="minimal" value="NENA">
                                Nena
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Fecha de nacimiento</label>
                        <input type="date" name="fecha" class="form-control input-lg" value="{{old('fecha')}}" required>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="form-group">
                        <select name="room_id" class="form-control input-lg" required>
                            <option value="">Asignar una sala</option>

                            @foreach ($rooms as $room)
                                <option value="{{$room->id}}">{{$room->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="tutor_id" class="form-control input-lg" required>
                            <option value="">Asignar un tutor</option>

                            @foreach ($tutors as $tutor)
                                <option value="{{$tutor->id}}">{{$tutor->name}} {{$tutor->last_name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <textarea name="observation" class="form-control input-lg" rows="5"
                                  placeholder="Observaciones">{{old('observation')}}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" name="file" id="exampleInputFile" class="form-control input-lg">
                    </div>

                </div>

                <div class="form-group col-md-6 col-md-offset-4">
                    <button type="submit" class="btn  btn-primary btn-lg">Crear Alumno</button>
                    <button type="button" class="btn  btn-primary btn-lg">Cancelar</button>
                </div>
            </div>
            {{ Form::Close() }}
        </div>
    </div>
@endsection
@section('scripts')
    <script src={{ asset( '/vendor/iCheck/icheck.min.js') }}></script>
    <script>
        $(function () {
            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            });
        });
    </script>
@endsection