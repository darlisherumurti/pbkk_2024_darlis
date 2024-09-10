<button type="button" data-id="{{ $buku->id }}"
    class="btn btn-danger delete-button {{ $class ?? '' }}">{{ $text ?? 'Hapus Buku' }}</button>

@pushOnce('scripts')
    <script>
        $(document).ready(function() {
            $('.delete-button').on('click', function() {
                const id = $(this).data('id'); // Get the ID of the item to delete

                Swal.fire({
                    title: 'Are you sure?',
                    text: `You won't be able to revert this!`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Swal.fire({
                            title: 'Deleting...',
                            text: 'Please wait while we process your request.',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });


                        var form = document.createElement('form');
                        form.action = '/pertemuan4/buku/' + id; // The delete route
                        form.method =
                            'POST';
                        var csrfInput = document.createElement('input');
                        csrfInput.type = 'hidden';
                        csrfInput.name = '_token';
                        csrfInput.value = "{{ csrf_token() }}"
                        form.appendChild(csrfInput);
                        var methodInput = document.createElement('input');
                        methodInput.type = 'hidden';
                        methodInput.name = '_method';
                        methodInput.value = 'DELETE';
                        form.appendChild(methodInput);
                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            });
        });
    </script>
@endPushOnce
