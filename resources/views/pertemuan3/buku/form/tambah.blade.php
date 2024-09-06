@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
@endpush

<form id="bukuForm" action="{{ route('buku.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="judul">Judul</label>
        <textarea class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul"
            value="{{ old('judul') }}" required></textarea>
        @error('judul')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="row mb-3">
        <!-- Image URL Input -->
        <div class="col-md-6">
            <div class="form-group">
                <label for="image_url">Image URL</label>
                <div class="input-group">
                    <input type="url" class="form-control @error('image_url') is-invalid @enderror" id="image_url"
                        name="image_url" value="{{ old('image_url') }}" placeholder="Enter image URL" required>
                    @error('image_url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="input-group-append">
                        <button type="button" class="btn btn-secondary" onclick="previewImage()">Preview</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Image Preview -->
        <div class="col-md-6">
            <label>Image Preview</label>
            <div id="imagePreviewContainer" class="border p-2" style="min-height: 200px;">
                <a id="imagePreviewLightBox" href="" data-lightbox="book-image" data-title="preview">
                    <img id="imagePreview" src="#" alt="No image" class="img-fluid"
                        style="display: none; max-height: 180px;">
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="penulis">Penulis</label>
                <input type="text" class="form-control @error('penulis') is-invalid @enderror" id="penulis"
                    name="penulis" value="{{ old('penulis') }}" required>
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
                <input type="text" class="form-control @error('penerbit') is-invalid @enderror" id="penerbit"
                    name="penerbit" value="{{ old('penerbit') }}" required>
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
                <input type="number" class="form-control @error('tahun_terbit') is-invalid @enderror" id="tahun_terbit"
                    name="tahun_terbit" value="{{ old('tahun_terbit') }}">
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
                    id="jumlah_halaman" name="jumlah_halaman" value="{{ old('jumlah_halaman') }}">
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
                <input maxlength="13" type="text" class="form-control @error('isbn') is-invalid @enderror"
                    id="isbn" name="isbn" value="{{ old('isbn') }}" required>
                @error('isbn')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="kategori">Kategori</label><br>
                <select class="selectpicker w-100" id="kategori" name="kategori[]"
                    class="form-control @error('kategori') is-invalid @enderror" multiple>
                    @foreach ($kategori as $k)
                        <option value="{{ $k->id }}"
                            {{ in_array($k->id, old('kategori', [])) ? 'selected' : '' }}>
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
            rows="4">{{ old('deskripsi') }}</textarea>
        @error('deskripsi')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Tambah Buku</button>
    <a href="{{ route('buku.list') }}" class="btn btn-warning">Kembali</a><a href="#"></a>
    <button type="reset" class="btn btn-danger">Reset</button>
    <button type="button" class="btn btn-secondary" onclick="randomizeForm()">Randomize</button>
</form>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/faker@5.5.3/dist/faker.min.js"></script>
    <script>
        function previewImage() {
            var imageUrl = document.getElementById('image_url').value;
            var imagePreview = document.getElementById('imagePreview');
            var lightbox = document.getElementById('imagePreviewLightBox');

            if (imageUrl) {
                imagePreview.src = imageUrl;
                imagePreview.style.display = 'block';
                lightbox.href = imageUrl;
            } else {
                imagePreview.src = '#';
                imagePreview.style.display = 'none';
            }
        }

        function randomizeForm() {
            document.getElementById('judul').value = faker.lorem.words(5);
            document.getElementById('deskripsi').value = faker.lorem.words(48);
            document.getElementById('penulis').value = faker.name.findName();
            document.getElementById('penerbit').value = faker.company.companyName();
            document.getElementById('tahun_terbit').value = faker.date.past(100).getFullYear();
            document.getElementById('jumlah_halaman').value = faker.datatype.number({
                min: 50,
                max: 1000
            });
            document.getElementById('isbn').value = faker.random.alphaNumeric(13).toUpperCase();
            const imageUrl =
                `https://via.placeholder.com/640x480.webp/0055cc?text=${faker.lorem.words(3).replace(/\s+/g, '+')}`;
            document.getElementById('image_url').value = imageUrl;

            let kategoriSelect = $('#kategori'); // Using jQuery for Bootstrap-Select
            let kategoriOptions = kategoriSelect.find('option');
            let selectedKategori = [];
            let totalKategori = Math.floor(Math.random() * Math.min(kategoriOptions.length, 3)) +
                1; // Select 1-3 categories

            kategoriSelect.selectpicker('deselectAll');

            for (let i = 0; i < totalKategori; i++) {
                let randomIndex = Math.floor(Math.random() * kategoriOptions.length);
                selectedKategori.push(kategoriOptions[randomIndex].value);
            }

            kategoriSelect.selectpicker('val', selectedKategori);

            kategoriSelect.selectpicker('refresh');

            previewImage();
        }

        document.getElementById('bukuForm').addEventListener('submit', function(event) {
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

        $('#bukuForm').on('submit', function(event) {
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
                                    previewImage();
                                    form.find('input:first').focus();
                                } else if (result.isDismissed) {
                                    window.location.href = '/pertemuan3/buku/list';
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
