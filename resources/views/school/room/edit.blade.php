<div class="modal fade in" id="roomEditModal-{{$room->id}}" tabindex="-1" role="dialog">
    {!! Form::model($room, ['method' => 'PATCH','route' => ['salas.update', $room->id]]) !!} {{ csrf_field() }}
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-primary">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Nombre de la sala: {{$room->name}}</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <div class="form-group">
                        <label>Editar nombre de la sala</label>
                        <input type="text" class="form-control" name="name" value="{{old('name',$room->name)}}">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline">Actualizar</button>
                <button type="button" class="btn btn-outline"data-dismiss="modal">Cancelar</button>            
            </div>
        </div>
    </div>
    {{Form::close()}}
</div>