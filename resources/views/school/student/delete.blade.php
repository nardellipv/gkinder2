<div class="modal fade" id="deleteStudentModal-{{ $student->id }}" tabindex="-1" role="dialog">
    {!! Form::open(['method' => 'DELETE','route' => ['estudiantes.destroy', $student->id],'style'=>'display:inline']) !!} {{
    Form::token() }}
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-danger">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">¡Eliminar Estudiante!</h4>
            </div>
            <div class="modal-body">
                ¿Esta seguro de eliminar al Estudiante <b>{{ $student->name }} {{ $student->last_name}}</b>?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline">Eliminar</button>
                <button type="button" class="btn btn-outline" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
    {!! Form::Close() !!}
</div>