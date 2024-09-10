@push('styles')
    <link rel="stylesheet" href="/css/bootstrap-select.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
@endpush
<form id="updateForm" action="{{ route('buku.update', $buku->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Menandakan bahwa ini adalah request untuk update -->

    <div class="form-group">
        <label for="judul">Judul</label>
        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"
            name="judul" value="{{ old('judul', $buku->judul) }}" required>
        @error('judul')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-group">
                <label for="image_url">Image URL</label>
                <div class="input-group">
                    <input type="text" class="form-control @error('image_url') is-invalid @enderror"
                        id="image_url" name="image_url" value="{{ old('image_url', $buku->image_url) }}"
                        required>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-secondary"
                            onclick="previewImage()">Preview</button>
                    </div>
                </div>
                @error('image_url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <label>Image Preview</label>
            <div id="imagePreviewContainer" class="border p-2" style="min-height: 200px;">
                <a href="{{ $buku->image_url }}" data-lightbox="book-image"
                    data-title="{{ $buku->judul }}">
                    <img loading="lazy" id="imagePreview" src="{{ old('image_url', $buku->image_url) }}"
                        alt="No image" class="img-fluid" style="max-height: 180px;">
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="penulis">Penulis</label>
                <input type="text" class="form-control @error('penulis') is-invalid @enderror" id="penulis"
                    name="penulis" value="{{ old('penulis', $buku->penulis) }}" required>
                @error('penulis')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="penerbit">Penerbit</label>
                <input type="text" class="form-control @error('penerbit') is-invalid @enderror"
                    id="penerbit" name="penerbit" value="{{ old('penerbit', $buku->penerbit) }}"
                    required>
                @error('penerbit')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit</label>
                <input type="number" class="form-control @error('tahun_terbit') is-invalid @enderror"
                    id="tahun_terbit" name="tahun_terbit"
                    value="{{ old('tahun_terbit', $buku->tahun_terbit) }}">
                @error('tahun_terbit')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="jumlah_halaman">Jumlah Halaman</label>
                <input type="number" class="form-control @error('jumlah_halaman') is-invalid @enderror"
                    id="jumlah_halaman" name="jumlah_halaman"
                    value="{{ old('jumlah_halaman', $buku->jumlah_halaman) }}">
                @error('jumlah_halaman')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" class="form-control @error('isbn') is-invalid @enderror" id="isbn"
                    name="isbn" value="{{ old('isbn', $buku->isbn) }}" required>
                @error('isbn')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select class="selectpicker w-100 @error('kategori') is-invalid @enderror" id="kategori"
                    name="kategori[]" multiple>
                    @foreach ($kategori as $k)
                        <option value="{{ $k->id }}"
                            {{ in_array($k->id, old('kategori', $buku_kategori)) ? 'selected' : '' }}>
                            {{ $k->nama }}
                        </option>
                    @endforeach
                </select>
                @error('kategori')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi"
            rows="4">{{ old('deskripsi', $buku->deskripsi) }}</textarea>
        @error('deskripsi')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Update Buku</button>
    <a href="{{ route('buku.index') }}" class="btn btn-warning">Kembali ke Daftar Buku</a>
    <a href="{{ route('buku.show', $buku->id) }}" class="btn btn-warning">
    Kembali ke Detail Buku</a>
    @include('pertemuan4.buku.form.hapus', ['buku' => $buku])
</form>
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script src="/js/bootstrap-select.min.js"></script>
@endpush
@push('scripts')
    <script>
        function previewImage() {
            var imageUrl = document.getElementById('image_url').value;
            var imagePreview = document.getElementById('imagePreview');

            if (imageUrl) {
                imagePreview.src = imageUrl;
                imagePreview.style.display = 'block';
            } else {
                imagePreview.src = '#';
                imagePreview.style.display = 'none';
            }
        }

        document.getElementById('updateForm').addEventListener('submit', function(event) {
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

        $('#updateForm').on('submit', function(event) {
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
                                confirmButtonText: 'Continue Editing',
                                cancelButtonText: 'Back to List',
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    form[0].reset();
                                    previewImage();
                                    form.find('input:first').focus();
                                } else if (result.isDismissed) {
                                    window.history.back();
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
