@extends('school.layouts.main')
@section('content')
    <script type="text/javascript">
        function myFunction() {
            window.print();
        }
    </script>
    <div class="box box-solid box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Mensajes Recibidos</h3>
        </div>
        <section class="content">

            <div class="box box-primary">
                <div class="box-body no-padding">
                    <div class="mailbox-read-info">
                        <h3><b>Asunto: </b>{{$comunication->title}}</h3>
                        <h5><b>De: </b> {{$comunication->tutor->name}}
                            <span class="mailbox-read-time pull-right">{{Date::parse($comunication->date)->format('l j F Y')}}</span>
                        </h5>
                    </div>
                    <div class="mailbox-read-message">
                        {!! $comunication->body !!}
                    </div>
                </div>

                <div class="box-footer">
                    <a href="{{url('school/correo/enviados')}}" class="btn btn-default"><i class="fa fa-times"></i> Canceler</a>
                    <button type="button" class="btn btn-default" data-toggle="modal"
                            data-target="#deleteMessageSentModal-{{$comunication->id}}"><i class="fa fa-trash-o"></i> Borrar</button>
                    <button type="button" onclick="myFunction()" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</button>
                </div>
            </div>
            @include('school.message.delete-sent')
        </section>
    </div>
@endsection