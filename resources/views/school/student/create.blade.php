@extends('school.layouts.main') 
@section('content')
@if (Session::has('message'))
<p class="alert alert-success">{!! Session::get('message') !!}</p>
@endif
<div class="box box-solid box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Agregar nuevo alumno <small class="text-yellow">antes de agregar un alumno, agregue al tutor</small></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
            {!! Form::open(['method' => 'POST','route' => ['estudiantes.store'],'style'=>'display:inline','enctype' => 'multipart/form-data']) !!} 
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
                        <input class="form-control input-lg" type="text" placeholder="DNI" name="dni" required>
                    </div>
                    <div class="form-group">
                        <label>Sexo</label>
                        <div class="radio" required>
                            <label>
                                <input type="radio" name="sexo" id="optionsRadios1" value="NENE" >
                                    Nene                                
                            </label>
                            <label>
                                <input type="radio" name="sexo" id="optionsRadios1" value="NENA">
                                    Nena
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Fecha de nacimiento</label>
                        <input type="date" name="fecha" class="form-control input-lg" value="" required>
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
                            <textarea name="observation" class="form-control input-lg" rows="5" placeholder="Observaciones"></textarea>
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