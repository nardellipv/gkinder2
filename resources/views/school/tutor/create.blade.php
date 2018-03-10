@extends('school.layouts.main') 
@section('content')

    @include('layouts.message_errors')
    @include('layouts.message_success')

<div class="box box-solid box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Agregar nuevo tutor</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        {!! Form::open(['method' => 'POST','route' => ['tutores.store'],'style'=>'display:inline']) !!} {{ csrf_field() }}
        <div class="row">
            <div class="col-md-4 col-md-offset-2">
                <div class="form-group">
                    <input class="form-control input-lg" type="text" placeholder="Nombre" name="nombre" value="{{old('nombre')}}" required>
                </div>
                <div class="form-group">
                    <input class="form-control input-lg" type="text" placeholder="Apellido" name="apellido" value="{{old('apellido')}}" required>
                </div>
                <div class="form-group">
                    <input class="form-control input-lg" type="text" placeholder="Teléfono" name="telefono" value="{{old('telefono')}}" required>
                </div>
                <div class="form-group">
                    <input class="form-control input-lg" type="text" placeholder="DNI" name="dni" value="{{old('dni')}}" required>
                </div>
                <div class="form-group">
                    <input class="form-control input-lg" type="email" placeholder="EMail" name="email" value="{{old('dni')}}" required>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="form-group">
                    <textarea name="direccion" class="form-control input-lg" rows="4" placeholder="Direccion" required>{{old('direccion')}}</textarea>
                </div>
                <div class="form-group">
                    <textarea name="observation" class="form-control input-lg" rows="6" placeholder="Observaciones">{{old('observation')}}</textarea>
                </div>
            </div>
            <div class="form-group col-md-6 col-md-offset-4">
                <button type="submit" class="btn  btn-primary btn-lg">Crear Tutor</button>
            <a href="{{route('home')}}" class="btn btn-primary btn-lg">Cancelar</a>
            </div>
        </div>
        {{ Form::Close() }}
    </div>
</div>
@endsection