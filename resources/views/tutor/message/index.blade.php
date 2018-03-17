@extends('tutor.layouts.main')
@section('content')
    @if (Session::has('message'))
        <p class="alert alert-danger">{!! Session::get('message') !!}</p>
    @endif
    <div class="box box-solid box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Mensajes Recibidos</h3>
        </div>
        <div class="box-body no-padding">
            <div class="mailbox-controls">
                @include('tutor.menu.menu-message')
            </div>
            <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                    <tbody>
                    @foreach($messages as $message)
                        <tr>
                            @if($message->read == 'READ')
                                <td class="mailbox-name">{{$message->tutor->name}}</td>
                                <td class="mailbox-subject">{{$message->title}}</td>
                                <td class="mailbox-read-info"><span class="label label-success">Leído</span></td>
                            @else
                                <td class="mailbox-name"><b>{{$message->tutor->name}}</b></td>
                                <td class="mailbox-subject"><b>{{$message->title}}</b></td>
                                <td class="mailbox-read-info"><span class="label label-danger">No Leído</span></td>
                            @endif
                            <td class="mailbox-date">{{Date::parse($message->date)->diffForHumans()}}</td>
                            <td class="mailbox-date">
                                <div class="btn-group">
                                    <a href="{{url('tutor/mensajes', $message->id)}}" class="btn btn-info btn-flat"><i
                                                data-toggle="tooltip" data-original-title="Ver Mensaje" class="fa fa-envelope-o"></i>
                                    </a>
                                    <a href="{{url('tutor/mensajes/responder', $message->id)}}"
                                       class="btn btn-info btn-flat"><i
                                                data-toggle="tooltip" data-original-title="Responder" class="fa fa-mail-reply"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                {!! $messages->render() !!}
            </div>
        </div>
    </div>
@endsection