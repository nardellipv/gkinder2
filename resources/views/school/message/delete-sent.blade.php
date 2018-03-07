<div class="modal fade" id="deleteMessageSentModal-{{ $comunication->id }}" tabindex="-1" role="dialog">
    {!! Form::open(['method' => 'DELETE','route' => ['enviados.destroy', $comunication->id],'style'=>'display:inline']) !!} {{
    Form::token() }}
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-danger">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">¡Eliminar Mensaje!</h4>
            </div>
            <div class="modal-body">
                ¿Está seguro de eliminar el mensaje <b>{{ $comunication->title }} </b>?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline">Eliminar</button>
                <button type="button" class="btn btn-outline" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
    {!! Form::Close() !!}
</div>