@extends('school.layouts.main')
@section('content')

    @include('layouts.message_errors')
    @include('layouts.message_success')

    <div class="box box-solid box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Perfil Colegio</h3>
        </div>

        <div class="box-body">

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Datos del Colegio</a></li>
                    <li><a href="#tab_2" data-toggle="tab">Datos del Usuario</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        {!! Form::model($school, ['method' => 'PATCH','route' => ['actualizar.colegio', $school->id]]) !!}
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-4 col-md-offset-2">
                                <div class="form-group">
                                    <input class="form-control input-lg" type="text" placeholder="Nombre del Colegio"
                                           value="{{$school->name}}"
                                           name="nombre"
                                           required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control input-lg" type="text" placeholder="Código Postal"
                                           value="{{$school->cp}}"
                                           name="cp"
                                           required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control input-lg" type="text" placeholder="Teléfono"
                                           value="{{$school->phone}}"
                                           name="telefono"
                                           required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control input-lg" type="url" placeholder="Dirreción web"
                                           value="{{$school->url}}"
                                           name="url">
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="form-group">
                                    <input class="form-control input-lg" type="email" placeholder="Email" name="email"
                                           value="{{$school->email}}"
                                           required>
                                </div>
                                <div class="form-group">
                        <textarea class="form-control input-lg" rows="3" name="direccion" placeholder="Dirección"
                                  required>{{$school->address}}</textarea>
                                </div>
                                <div class="form-group">
                                    <input class="form-control input-lg" type="text" placeholder="Ciudad" name="ciudad"
                                           value="{{$school->city}}"
                                           required>
                                </div>
                            </div>

                            <div class="form-group col-md-6 col-md-offset-4">
                                <button type="submit" class="btn  btn-primary btn-lg">Actualizar</button>
                                <a href="{{url('school/home')}}" class="btn  btn-primary btn-lg">Cancelar</a>
                            </div>
                        </div>
                        {{ Form::Close() }}
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        {!! Form::model($user, ['method' => 'PATCH','route' => ['actualizar.usuario', $user->id]]) !!}
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-7 col-md-offset-3">
                                <div class="form-group">
                                    <input class="form-control input-lg" type="text" placeholder="Nombre y Apellido"
                                           value="{{$user->name}}" name="nombre"
                                           required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control input-lg" type="email" placeholder="Email" name="email"
                                           value="{{$user->email}}" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control input-lg" type="password"
                                           placeholder="Modificar Password" name="password">
                                </div>

                            </div>
                            <div class="form-group col-md-6 col-md-offset-5">
                                <button type="submit" class="btn  btn-primary btn-lg">Actualizar</button>
                                <a href="{{url('school/home')}}" class="btn  btn-primary btn-lg">Cancelar</a>
                            </div>
                        </div>
                        {{ Form::Close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
