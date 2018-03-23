<div class="modal fade" id="activeModal-{{ $circularDisable->id }}" tabindex="-1" role="dialog">
    {!! Form::open(['method' => 'PATCH','route' => ['active.circular', $circularDisable->id],'style'=>'display:inline']) !!}
    {{ Form::token() }}
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-info">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">{{ $circularDisable->title }}</h4>
            </div>
            <div class="modal-body">
                {!! $circularDisable->body !!}
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline">Publicar</button>
                <button type="button" class="btn btn-outline" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
    {!! Form::Close() !!}
</div>