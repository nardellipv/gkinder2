<div class="row">
    @foreach($students as $student)
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    @if($student->photo)
                        <a href="{{asset ($student->photo)}}" target="_blank">
                            <img class="img-responsive img-rectangle" src="{{asset ($student->photo)}}"
                                 alt="fotoUsuario">
                        </a>
                    @else
                        <img class="img-responsive" src="{{asset ('dist/img/boy.png')}}" alt="fotoUsuario">
                    @endif
                    <h3 class="profile-username text-center">{{$student->name}}</h3>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Nombre</b> <a class="pull-right">{{$student->name}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Apellido</b> <a class="pull-right">{{$student->last_name}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>DNI</b> <a class="pull-right">{{$student->dni}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Años</b> <a class="pull-right">{{ Date::parse($student->birth_date)->age }} años</a>
                        </li>
                        <li class="list-group-item">
                            <b>Cumpleaños</b> <a
                                    class="pull-right">{{ Date::parse($student->birth_date)->format('d/m/y') }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Sala</b> <a class="pull-right">{{$student->room->name}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
</div>