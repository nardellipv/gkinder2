@extends('school.layouts.main')
@section('content')

    @include('layouts.message_errors')
    @include('layouts.message_success')

<div class="box box-solid box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Datos Tutor</h3>
    </div>
    <div class="box-body">
        <section class="content">
            <div class="row">
                <div class="col-md-3">
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <h3 class="profile-username text-center">{{$tutor->name}}</h3>
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Nombre</b> <a class="pull-right">{{$tutor->name}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Apellido</b> <a class="pull-right">{{$tutor->last_name}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Teléfono</b> <a class="pull-right">{{$tutor->phone}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>EMail</b> <a class="pull-right">{{ $tutor->email }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Dirección</b> <a class="pull-right">{{ $tutor->address }}</a>
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
                            <li><a href="#data" data-toggle="tab">Alumnos a cargo</a></li>
                            <li><a href="#edit" data-toggle="tab">Editar Datos</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="active tab-pane" id="observation">
                                @if($tutor->observation)
                                    <p>
                                        {!! $tutor->observation !!}
                                    </p>
                                @else
                                    <p class="text-light-blue">Este tutor no posee observaciones</p>
                                @endif
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="data">
                                <div class="box-body">
                                    <dl class="dl-horizontal">
                                        @foreach ($students as $student)
                                            <dt>Alumno Nombre:</dt>
                                            <dd>{{$student->name}} {{$student->last_name}}</dd>
                                            <dt>Sala:</dt>
                                            <dd>{{$student->room->name}}</dd>
                                            <dd><a href="{{url('school/estudiantes', $student->id)}}"
                                                   class="btn btn-primary">Ir al Perfil del alumno</a></dd>
                                            <br/> @endforeach
                                    </dl>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="edit">
                                {!! Form::model($tutor, ['method' => 'PATCH','route' => ['tutores.update', $tutor->id],'enctype' => 'multipart/form-data'])
                                !!} {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Nombre</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="nombre"
                                               value="{{$tutor->name}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-sm-2 control-label">Apellido</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="lastname" name="apellido"
                                               value="{{$tutor->last_name}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="col-sm-2 control-label">Teléfono</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="telefono" class="form-control" id="phone"
                                               value="{{$tutor->phone}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="col-sm-2 control-label">DNI</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="dni" class="form-control" id="phone"
                                               value="{{$tutor->dni}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address" class="col-sm-2 control-label">Dirección</label>
                                    <div class="col-sm-10">
                                        <textarea name="direccion" class="form-control"
                                                  rows="3">{{$tutor->address}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">EMail</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" value="{{$tutor->email}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="student_id" class="col-sm-2 control-label">Alumnos</label>
                                    <div class="col-sm-10">
                                        <select name="student_id" class="form-control">
                                            <option value="">Asignar otro alumno</option>
                                            <optgroup>
                                                @foreach ($otherStudent as $oStudent)
                                                    <option value="{{$oStudent->id}}">{{$oStudent->name}} {{$oStudent->last_name}}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="observation" class="col-sm-2 control-label">Observaciones</label>
                                    <div class="form-group">
                                        <textarea name="observation" class="form-control"
                                                  rows="10">{{$tutor->observation}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                        <a href="{{url('school/estudiantes')}}" class="btn btn-primary">Cancelar</a>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection