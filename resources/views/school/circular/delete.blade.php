<div class="modal fade" id="deleteModal-{{ $circularDisable->id }}" tabindex="-1" role="dialog">
    {!! Form::open(['method' => 'DELETE','url' => ['school/circulares', $circularDisable->id],'style'=>'display:inline']) !!}
    {{ Form::token() }}
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-danger">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">{{ $circularDisable->title }}</h4>
            </div>
            <div class="modal-body">
                <p>¿Está seguro desea eliminar esta circular?</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline">Eliminar</button>
                <button type="button" class="btn btn-outline" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
    {!! Form::Close() !!}
</div>