<div class="modal fade" id="roomDeleteModal-{{ $room->id }}" tabindex="-1" role="dialog">
    {!! Form::open(['method' => 'DELETE','route' => ['salas.destroy', $room->id],'style'=>'display:inline']) !!}
    {{ Form::token() }}
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-danger">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">¡Eliminar Sala!</h4>
            </div>
            <div class="modal-body">
                ¿Esta seguro de eliminar la sala <b>{{ $room->id }}</b>?

                Al eliminar la sala se eliminaran los estudiantes y profesores asignados a esta sala. <b>Asegurese de haber
                sacado los alumnos y profesores antes de eliminar.</b>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline">Eliminar</button>
                <button type="button" class="btn btn-outline"data-dismiss="modal">Cancelar</button>   
            </div>
        </div>
    </div>
    {!! Form::Close() !!}
</div>