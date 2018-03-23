<div class="modal fade" id="disableModal-{{ $circularActive->id }}" tabindex="-1" role="dialog">
    {!! Form::open(['method' => 'PATCH','route' => ['disable.circular', $circularActive->id],'style'=>'display:inline']) !!}
    {{ Form::token() }}
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-danger">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">{{ $circularActive->title }}</h4>
            </div>
            <div class="modal-body">
                <p>¿Está seguro desea desactivar esta circular?</p>
                <p>Al desactivar la circular, esta se encontrará en la sección de circulares Archivadas.</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline">Despublicar</button>
                <button type="button" class="btn btn-outline" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
    {!! Form::Close() !!}
</div>