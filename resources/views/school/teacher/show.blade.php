@extends('school.layouts.main')
@section('content')

    @include('layouts.message_errors')
    @include('layouts.message_success')

<div class="box box-solid box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Datos Profesor</h3>
    </div>
    <div class="box-body">
        <section class="content">
            <div class="row">
                <div class="col-md-3">
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            @if($teacher->photo)
                                <a href="{{asset ($teacher->photo)}}" target="_blank">
                                    <img class="img-responsive img-rectangle" src="{{asset ($teacher->photo)}}"
                                         alt="fotoUsuario">
                                </a>
                            @else
                                <img class="img-responsive" src="{{asset ('dist/img/docente.png')}}" alt="fotoUsuario">
                            @endif
                            <h3 class="profile-username text-center">{{$teacher->name}}</h3>
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Nombre</b> <a class="pull-right">{{$teacher->name}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Apellido</b> <a class="pull-right">{{$teacher->last_name}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Teléfono</b> <a class="pull-right">{{$teacher->phone}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>EMail</b> <a class="pull-right">{{$teacher->email}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Sala</b> <a class="pull-right">{{$teacher->room->name}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>addres</b> <a class="pull-right">{{$teacher->address}}</a>
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
                            <li><a href="#edit" data-toggle="tab">Editar Datos</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="active tab-pane" id="observation">
                                @if($teacher->observation)
                                    <p>
                                        {!! $teacher->observation !!}
                                    </p>
                                @else
                                    <p class="text-light-blue">Este profesor no posee observaciones</p>
                                @endif
                            </div>
                            <div class="tab-pane" id="edit">
                                {!! Form::model($teacher, ['method' => 'PATCH','route' => ['profesores.update', $teacher->id],'enctype' => 'multipart/form-data'])
                                !!} {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Nombre</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="nombre"
                                               value="{{$teacher->name}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-sm-2 control-label">Apellido</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="lastname" name="apellido"
                                               value="{{$teacher->last_name}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="col-sm-2 control-label">Teléfono</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="telefono" class="form-control" id="telefono"
                                               value="{{$teacher->phone}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address" class="col-sm-2 control-label">Dirección</label>
                                    <div class="col-sm-10">
                                        <textarea name="direccion" class="form-control"
                                                  rows="3">{{$teacher->address}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">EMail</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control"
                                               value="{{$teacher->email}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="room_id" class="col-sm-2 control-label">Salas</label>
                                    <div class="col-sm-10">
                                        <select name="room_id" class="form-control" required>
                                            <optgroup label="Sala actual">
                                                <option value="{{$teacher->room->id}}">{{$teacher->room->name}}</option>
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
                                    <label for="dni" class="col-sm-2 control-label">Foto</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <input type="file" name="file" id="exampleInputFile">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="dni" class="col-sm-2 control-label">Observaciones</label>
                                        <div class="form-group">
                                            <textarea name="observation" class="form-control"
                                                      rows="10">{{$teacher->observation}}</textarea>
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