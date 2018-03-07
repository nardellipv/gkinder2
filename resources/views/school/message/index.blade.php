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
                            <td class="mailbox-name"><b>{{$message->tutor->name}}</b></td>
                            <td class="mailbox-subject">{{$message->title}}</td>
                            <td class="mailbox-attachment"></td>
                            <td class="mailbox-date">{{Date::parse($message->date)->diffForHumans()}}</td>
                            <td class="mailbox-date">
                                <div class="btn-group">
                                    <a href="{{url('school/mensajes', $message->id)}}" class="btn btn-info btn-flat"><i
                                                class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{url('school/mensajes/responder', $message->id)}}"
                                       class="btn btn-info btn-flat"><i class="fa fa-mail-reply"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-flat" data-toggle="modal"
                                            data-target="#deleteMessageModal-{{$message->id}}"><i
                                                class="fa fa-trash-o"></i>
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