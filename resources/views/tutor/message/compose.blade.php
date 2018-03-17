@extends('tutor.layouts.main')
@section('style')
    <link rel="stylesheet" href={{ asset( 'vendor/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}>
    <link rel="stylesheet" href={{ asset( 'vendor/select2/select2.min.css') }}>
@endsection
@section('content')

    @include('layouts.message_errors')
    @include('layouts.message_success')

    <div class="box box-solid box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Enviar Mensaje</h3>
        </div>
        <div class="box-body">
            {!! Form::open(['method' => 'POST','route' => ['mensajes.store'],'style'=>'display:inline']) !!}
            {{ csrf_field() }}
            <div class="form-group">
                <div class="form-group">
                    <div class="form-group">
                        <input class="form-control" name="to" placeholder="To:" value="{{ $school->name }}" readonly>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input class="form-control" name="subject" placeholder="Asunto:" value="{{old('subject')}}">
            </div>
            <div class="form-group">
                    <textarea id="compose-textarea" name="body" class="form-control" style="height: 200px">
                        {{old('body')}}
                    </textarea>
            </div>
        </div>
        <div class="box-footer">
            <div class="pull-right">
                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Enviar</button>
            </div>
            <a href="{{url('tutor/mensajes')}}" class="btn btn-default"><i class="fa fa-times"></i> Canceler</a>
        </div>
        {!! form::close() !!}
    </div>
@endsection
@section('scripts')
    <script src={{ asset( '/vendor/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}></script>
    <script src={{ asset( '/vendor/select2/select2.full.min.js') }}></script>
    <script>
        $(function () {
            //Add text editor
            $("#compose-textarea").wysihtml5();
            $(".select2").select2();
        });
    </script>
@endsection