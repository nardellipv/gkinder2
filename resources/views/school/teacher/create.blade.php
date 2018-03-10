@extends('school.layouts.main')
<<<<<<< HEAD
@section('content') @if (Session::has('message'))
    <p class="alert alert-success">{!! Session::get('message') !!}</p>
@endif
<div class="box box-solid box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Agregar nuevo docente</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        {!! Form::open(['method' => 'POST','route' => ['profesores.store'],'style'=>'display:inline','enctype' => 'multipart/form-data' ]) !!}
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-4 col-md-offset-2">
                <div class="form-group">
                    <input class="form-control input-lg" type="text" placeholder="Nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <input class="form-control input-lg" type="text" placeholder="Apellido" name="apellido" required>
                </div>
                <div class="form-group">
                    <input class="form-control input-lg" type="text" placeholder="Teléfono" name="telefono" required>
                </div>
                <div class="form-group">
                    <input class="form-control input-lg" type="email" placeholder="EMail" name="email" required>
                </div>
                <div class="form-group">
                    <select name="room_id" class="form-control input-lg" required>
                        <option value="">Asignar una sala</option>

                        @foreach ($rooms as $room)
                            <option value="{{$room->id}}">{{$room->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="form-group">
                    <textarea name="direccion" class="form-control input-lg" rows="2" placeholder="Direccion"
                              required></textarea>
                </div>
                <div class="form-group">
                    <textarea name="observation" class="form-control input-lg" rows="5"
                              placeholder="Observaciones"></textarea>
                </div>
                <div class="form-group">
                    <input type="file" name="file" id="exampleInputFile" class="form-control input-lg">
=======
@section('content')

    @include('layouts.message_errors')
    @include('layouts.message_success')

    <div class="box box-solid box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Agregar nuevo docente</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            {!! Form::open(['method' => 'POST','route' => ['profesores.store'],'style'=>'display:inline','enctype' => 'multipart/form-data' ]) !!}
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
                        <input class="form-control input-lg" type="text" placeholder="Teléfono" name="telefono"
                               value="{{old('telefono')}}" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control input-lg" type="email" placeholder="EMail" name="email"
                               value="{{old('email')}}" required>
                    </div>
                    <div class="form-group">
                        <select name="room_id" class="form-control input-lg" required>
                            <option value="">Asignar una sala</option>

                            @foreach ($rooms as $room)
                                <option value="{{$room->id}}">{{$room->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="form-group">
                        <textarea name="direccion" class="form-control input-lg" rows="2" placeholder="Direccion"
                                  required>{{old('direccion')}}</textarea>
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
                    <button type="submit" class="btn  btn-primary btn-lg">Crear Tutor</button>
                    <a href="{{route('home')}}" class="btn btn-primary btn-lg">Cancelar</a>
>>>>>>> request
                </div>
            </div>
            {{ Form::Close() }}
        </div>
    </div>
@endsection