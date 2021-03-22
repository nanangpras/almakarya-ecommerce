{{-- !-- Delete Warning Modal -->  --}}
<form action="{{ route('book.destroy', $item->id) }}" method="post">
    <div class="modal-body">
        @csrf
        @method('DELETE')
        <h5 class="text-center">Apakah anda ingin hapus {{ $item->title }} ?</h5>
    </div>
    <div class="modal-footer">
        <button type="button" onclick="javascript:window.location.reload()" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <button type="submit" class="btn btn-danger">Ya</button>
    </div>
</form>