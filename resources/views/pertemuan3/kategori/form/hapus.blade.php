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
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('deleteButton').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the form from submitting immediately

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, submit the form
                    document.getElementById('deleteForm').submit();
                }
            });
        });
    </script>
@endpush
