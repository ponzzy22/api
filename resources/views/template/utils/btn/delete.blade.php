<form action="{{ $url }}" method="post" class="d-inline">
    @csrf
    @method('delete')
    <button class="btn btn-danger" onclick="return confirm('apakah ingin menghapus artikel ini?')"><i
            class="fa fa-trash"></i></button>
</form>
