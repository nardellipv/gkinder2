@extends('school.layouts.main') 
@section('content') @if (Session::has('message'))
<p class="alert alert-info">{!! Session::get('message') !!}</p>
@endif
<div class="box box-solid box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Datos Alumno</h3>
    </div>
    <div class="box-body">
        <section class="content">
            <div class="row">
                <div class="col-md-3">
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
                            <h3 class="profile-username text-center">{{$student->name}}</h3>
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Nombre</b> <a class="pull-right">{{$student->name}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Apellido</b> <a class="pull-right">{{$student->last_name}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>DNI</b> <a class="pull-right">{{$student->dni}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Años</b> <a class="pull-right">{{ Date::parse($student->birth_date)->age }} años</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Cumpleaños</b> <a class="pull-right">{{ Date::parse($student->birth_date)->format('d/m/y') }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Sala</b> <a class="pull-right">{{$student->room->name}}</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#observation" data-toggle="tab">Observacion</a></li>
                            <li><a href="#data" data-toggle="tab">Datos del Tutor</a></li>
                            <li><a href="#edit" data-toggle="tab">Editar Datos</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="active tab-pane" id="observation">
                                @if($student->observation)
                                <p>
                                    {!! $student->observation !!}
                                </p>
                                @else
                                <p class="text-light-blue">Este alumno no posee observaciones</p>
                                @endif
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="data">
                                <div class="box-body">
                                    <dl class="dl-horizontal">
                                        <dt>Nombre</dt>
                                        <dd>{{$student->tutor->name}}</dd>
                                        <dt>Apellido</dt>
                                        <dd>{{$student->tutor->last_name}}</dd>
                                        <dt>Teléfono</dt>
                                        <dd>{{$student->tutor->phone}}</dd>
                                        <dt>DNI</dt>
                                        <dd>{{$student->tutor->dni}}</dd>
                                        <dt>Dirección</dt>
                                        <dd>{{$student->tutor->address}}</dd>
                                        <dt>EMail</dt>
                                        <dd>{{$student->tutor->email}}</dd>
                                        <br /> @if($student->tutor->observation)
                                        <div class="box box-default collapsed-box">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Observaciones</h3>
                                                <div class="box-tools pull-right">
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                                        <i class="fa fa-plus"></i>
                                                </button>
                                                </div>
                                            </div>
                                            <div class="box-body" style="display: none;">
                                                {{$student->tutor->observation}}
                                            </div>
                                        </div>
                                        @endif
                                    </dl>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="edit">
                                {!! Form::model($student, ['method' => 'PATCH','route' => ['estudiantes.update', $student->id]]) !!} {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Nombre</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name" value="{{$student->name}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-sm-2 control-label">Apellido</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="lastname" name="last_name" value="{{$student->last_name}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="dni" class="col-sm-2 control-label">DNI</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="dni" class="form-control" id="dni" value="{{$student->dni}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="fecha" class="col-sm-2 control-label">Nacimiento</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="fecha" class="form-control"  value="{{$student->birth_date}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="dni" class="col-sm-2 control-label">Salas</label>
                                    <div class="col-sm-10">
                                        <select name="room_id" class="form-control" required>
                                                <optgroup label="Sala actual">
                                                    <option value="{{$student->room->id}}">{{$student->room->name}}</option> 
                                                </optgroup>                                               
                                                <optgroup label="Salas disponibles">
                                                @foreach ($rooms as $room)
                                                    <option value="{{$room->id}}">{{$room->name}}</option>
                                                @endforeach
                                                </optgroup>                       
                                            </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="dni" class="col-sm-2 control-label">Tutor</label>
                                    <div class="col-sm-10">
                                        <select name="tutor_id" class="form-control" required>
                                                <optgroup label="Tutor">
                                                    <option value="{{$student->tutor->id}}">{{$student->tutor->name}} {{$student->tutor->last_name}}</option> 
                                                </optgroup>                                               
                                                <optgroup label="Cambiar tutor">                                                        
                                                @foreach ($tutors as $tutor)                                                
                                                    <option value="{{$tutor->id}}">{{$tutor->name}} {{$tutor->last_name}}</option>
                                                @endforeach
                                                </optgroup>                       
                                            </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="dni" class="col-sm-2 control-label">Foto</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <input type="file" id="exampleInputFile">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="dni" class="col-sm-2 control-label">Observaciones</label>
                                        <div class="form-group">
                                            <textarea name="observation" class="form-control" rows="10">{{$student->observation}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary">Actualizar</button>
                                            <a href="{{url('school/estudiantes')}}" class="btn btn-primary">Cancelar</a>
                                        </div>
                                    </div>
                                    {!! form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        </div>
    </div>
@endsection