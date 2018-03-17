@extends('tutor.layouts.main')
@section('style')
    <link rel="stylesheet" href={{ asset( 'vendor/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}>
@endsection
@section('content')

    @include('layouts.message_errors')
    @include('layouts.message_success')

    <div class="box box-solid box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Mensajes Recibidos</h3>
        </div>
        {!! Form::model($message, ['method' => 'PATCH','route' => ['mensajes.update', $message->id]]) !!}
        {{ csrf_field() }}
        <div class="box-body">
            <div class="form-group">
                <input class="form-control" name="to" placeholder="To:" value="{{$message->tutor->name}}" readonly>
            </div>

            <div class="form-group">
                <input class="form-control" name="subject" placeholder="Asunto:" value="RE: {{$message->title}}">
            </div>
            <div class="form-group">
                    <textarea id="compose-textarea" name="body" class="form-control" style="height: 200px">
                        <br><br>
                        {!! $message->body !!}
                    </textarea>
            </div>
        </div>
        <div class="box-footer">
            <div class="pull-right">
                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Enviar</button>
            </div>
            <a href="{{url('tutor/mensajes')}}" class="btn btn-default"><i class="fa fa-times"></i> Canceler</a>
        </div>
        {!! Form::Close() !!}
    </div>
@endsection
@section('scripts')
    <script src={{ asset( '/vendor/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}></script>
    <script>
        $(function () {
            //Add text editor
            $("#compose-textarea").wysihtml5();
        });
    </script>
@endsection