@extends('school.layouts.main')
@section('content') @if (Session::has('message'))
    <p class="alert alert-success">{!! Session::get('message') !!}</p>
@endif
<div class="box box-solid box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Agregar nuevo tutor</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        {!! Form::open(['method' => 'POST','route' => ['salas.store'],'style'=>'display:inline']) !!}
        {{ csrf_field() }}
        <div class="form-group">
            <label for="fecha" class="col-sm-2 control-label">Nombre Sala</label>
            <div class="col-sm-10">
                <input type="text" name="nombre" class="form-control" value="">
            </div>
        </div>
        <div class="form-group">
            <label for="teacher_id" class="col-sm-2 control-label">Profesor a cargo</label>
            <div class="col-sm-10">
                <select name="teacher_id" class="form-control">
                    <option value="">Elija un profesor a cargo</option>
                    <optgroup label="Profesores">
                        @foreach ($teachers as $teacher)
                            <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                        @endforeach
                    </optgroup>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Crear Sala</button>
                <a href="{{url('school/home')}}" class="btn btn-primary">Cancelar</a>
            </div>
        </div>
        {{ Form::Close() }}
    </div>
</div>
@endsection