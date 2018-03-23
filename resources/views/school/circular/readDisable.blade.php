<div class="modal fade" id="readDisableModal-{{ $circularDisable->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-warning">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">{{ $circularDisable->title }}</h4>
            </div>
            <div class="modal-body">
                {!! $circularDisable->body !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>