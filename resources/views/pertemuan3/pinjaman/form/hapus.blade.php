@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
@endpush
<form id="deleteForm" class="border-0" action="{{ route('kategori.destroy', $kategori->id) }}" method="POST"
    style="display:inline-block;">
    @csrf
    @method('DELETE')
    <button id="deleteButton" type="submit"
        class="btn btn-danger {{ $class ?? '' }}">{{ $text ?? 'Hapus Kategori' }}</button>
</form>
