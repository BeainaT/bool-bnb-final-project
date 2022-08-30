<form action="{{route('user.houses.destroy', $house->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('delete')
    <div class="modal fade" id="ModalDelete{{$house->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('Elimina casa') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal body">Sei sicuro di voler cancellare <b>{$house->id}}</b>?</div>
            <div class="modal-footer">
                <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">{{ __('Annulla') }}</button>
                <button type="button" class="btn btn-outline-danger">{{  __('Elimina') }}</button>
            </div>
        </div>
    </div>
</div>
</form>