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
                <div class="btn-group">
                    @include('school.menu.menu-message')
                </div>
            </div>
            <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                    <tbody>
                    @foreach($comunications as $comunication)
                        <tr>
                            <td class="mailbox-name"><b>{{$comunication->tutor->name}}</b></td>
                            <td class="mailbox-subject">{{$comunication->title}}</td>
                            <td class="mailbox-attachment"></td>
                            <td class="mailbox-date">{{Date::parse($comunication->date)->diffForHumans()}}</td>
                            <td class="mailbox-date">
                                <div class="btn-group">
                                    <a href="{{url('school/correo/enviados', $comunication->id)}}" class="btn btn-info btn-flat"><i
                                                class="fa fa-eye"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-flat" data-toggle="modal"
                                            data-target="#deleteMessageSentModal-{{$comunication->id}}"><i
                                                class="fa fa-trash-o"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @include('school.message.delete-sent')
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                {!! $comunications->render() !!}
            </div>
        </div>
    </div>
@endsection