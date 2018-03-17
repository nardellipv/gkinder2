@extends('school.layouts.main')
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
                @include('school.menu.menu-message')
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
                                    <a href="{{url('school/mensajes', $message->id)}}" class="btn btn-info btn-flat"><i
                                                data-toggle="tooltip" data-original-title="Ver Mensaje" class="fa fa-envelope-o"></i>
                                    </a>
                                    <a href="{{url('school/mensajes/responder', $message->id)}}"
                                       class="btn btn-info btn-flat"><i
                                                data-toggle="tooltip" data-original-title="Responder" class="fa fa-mail-reply"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-flat" data-toggle="modal"
                                            data-target="#deleteMessageModal-{{$message->id}}"><i
                                                data-toggle="tooltip" data-original-title="Eliminar" class="fa fa-trash-o"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @include('school.message.delete')
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