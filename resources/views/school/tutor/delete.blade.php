<div class="modal fade" id="deleTetutorModal-{{ $tutor->id }}" tabindex="-1" role="dialog">
    {!! Form::open(['method' => 'DELETE','route' => ['tutores.destroy', $tutor->id],'style'=>'display:inline']) !!} {{
    Form::token() }}
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-danger">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">¡Eliminar Tutor!</h4>
            </div>
            <div class="modal-body">
                ¿Está seguro de eliminar al tutor <b>{{ $tutor->name }} {{ $tutor->last_name}}</b>?

                Si el tutor tiene alumnos asignados estos también se borraran. Para no borrar los alumnos cambielo de tutor.
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline">Eliminar</button>
                <button type="button" class="btn btn-outline" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
    {!! Form::Close() !!}
</div>