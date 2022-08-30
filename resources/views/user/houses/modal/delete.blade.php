<form action="{{route('user.houses.destroy', $house->id)}}" method="POST" enctype="multipart/form-data">
    {{ method_field('delete')}}
    {{ csrf_field() }}
    <div class="modal fade" id="ModalDelete{{$house->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __("Confermi l'eliminazione di ".$house->name."?") }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">{{ __('Annulla') }}</button>
                <button type="submit" class="btn btn-outline-danger">{{  __('Elimina') }}</button>
            </div>
        </div>
    </div>
</div>
</form>