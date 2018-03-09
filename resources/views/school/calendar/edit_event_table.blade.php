@if (Session::has('message'))
    <p class="alert alert-danger">{!! Session::get('message') !!}</p>
@endif
<div class="row col-md-offset-2">
    <div class="col-md-9">
        <div class="box box-default collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Eventos</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Actividad</th>
                            <th width="170">Fecha inicio</th>
                            <th width="170">Fecha Fin</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($calendarsEdit as $calendarEdit)
                            <tr>
                                <td>{{substr($calendarEdit->activity,0,20)}}</td>
                                <td>{{Date::parse($calendarEdit->date_start)->format('l j F Y H:i:s')}}</td>
                                <td>{{Date::parse($calendarEdit->date_end)->format('l j F Y H:i:s')}}</td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE','route' => ['calendario.destroy', $calendarEdit->id],'style'=>'display:inline']) !!}
                                    {{Form::token() }}
                                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    {{Form::Close()}}
                                    <a href="{{url('school/calendario', $calendarEdit->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>