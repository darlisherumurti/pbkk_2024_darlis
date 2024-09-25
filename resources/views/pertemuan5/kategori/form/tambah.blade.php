@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
@endpush

<form id="kategoriForm" action="{{ route('kategori.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nama">Nama</label>
        <input class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
            value="{{ old('nama') }}" required>
        @error('nama')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Tambah Kategori</button>
    <button class="btn btn-warning" onclick="window.history.back()">Kembali</button>
    <button type="reset" class="btn btn-danger">Reset</button>
</form>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('kategoriForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to submit this form?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, submit it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, submit the form
                    this.submit();
                }
            });
        });

        $('#kategoriForm').on('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to submit this form?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, submit it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // User confirmed the action
                    let form = $(this);
                    let formData = new FormData(this);

                    Swal.fire({
                        title: 'Submitting...',
                        text: 'Please wait while we process your request.',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    $.ajax({
                        url: form.attr('action'),
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: response.message,
                                showCancelButton: true,
                                confirmButtonText: 'Add Another',
                                cancelButtonText: 'Back to List',
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    form[0].reset();
                                    form.find('input:first').focus();
                                } else if (result.isDismissed) {
                                    window.location.href =
                                        "{{ route('kategori.list') }}";
                                }
                            });
                        },
                        error: function(xhr) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'There was an issue with your submission.',
                                footer: `<a href>${xhr.responseJSON.message}</a>`
                            });

                            // Optionally, handle validation errors
                            if (xhr.responseJSON.errors) {
                                let errors = xhr.responseJSON.errors;
                                let errorMessages = '';
                                $.each(errors, function(key, value) {
                                    errorMessages += value[0] + '<br>';
                                });
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Validation Errors!',
                                    html: errorMessages
                                });
                            }
                        }
                    });
                }
            });
        });
    </script>
@endpush
