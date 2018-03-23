@extends('school.layouts.main')
@section('style')
    <link rel="stylesheet" href={{ asset( 'vendor/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}>
    <link rel="stylesheet" href={{ asset( 'vendor/select2/select2.min.css') }}>
@endsection
@section('content')

    @include('layouts.message_errors')
    @include('layouts.message_success')

    <div class="box box-solid box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Crear circular</h3>
        </div>
        {!! Form::open(['method' => 'POST','route' => ['circulares.store'],'style'=>'display:inline']) !!}
        {{ csrf_field() }}
        <div class="box-body">
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Título" value="{{old('title')}}" required>
            </div>
            <div class="form-group">
                <label for="body">Circular</label>
                <textarea id="compose-textarea" name="body" class="form-control" style="height: 200px">
                        {{old('body')}}
                    </textarea>
            </div>

        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Crear Circular</button>
        </div>
        {!! Form::Close() !!}
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