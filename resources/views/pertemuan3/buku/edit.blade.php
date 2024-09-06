@extends('layout.base')

@section('title', 'Edit Buku')

@push('styles')
    <link rel="stylesheet" href="/css/bootstrap-select.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <form id="updateForm" action="{{ route('buku.update', $data['buku']->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Menandakan bahwa ini adalah request untuk update -->

                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"
                        name="judul" value="{{ old('judul', $data['buku']->judul) }}" required>
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
                                    id="image_url" name="image_url" value="{{ old('image_url', $data['buku']->image_url) }}"
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
                            <a href="{{ $data['buku']->image_url }}" data-lightbox="book-image"
                                data-title="{{ $data['buku']->judul }}">
                                <img loading="lazy" id="imagePreview" src="{{ old('image_url', $data['buku']->image_url) }}"
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
                                name="penulis" value="{{ old('penulis', $data['buku']->penulis) }}" required>
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
                                id="penerbit" name="penerbit" value="{{ old('penerbit', $data['buku']->penerbit) }}"
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
                                value="{{ old('tahun_terbit', $data['buku']->tahun_terbit) }}">
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
                                value="{{ old('jumlah_halaman', $data['buku']->jumlah_halaman) }}">
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
                                name="isbn" value="{{ old('isbn', $data['buku']->isbn) }}" required>
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
                                @foreach ($data['kategori'] as $k)
                                    <option value="{{ $k->id }}"
                                        {{ in_array($k->id, old('kategori', $data['buku-kategori'])) ? 'selected' : '' }}>
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
                        rows="4">{{ old('deskripsi', $data['buku']->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            </form>
            <button id="submitBtn" type="submit" class="btn btn-primary">Update Buku</button>
            <a href="{{ route('buku.index') }}" class="btn btn-warning">Kembali ke Daftar Buku</a>
            <a href="{{ route('buku.show', $data['buku']->id) }}" class="btn btn-warning">
                Kembali ke Detail Buku</a>
            @include('pertemuan3.buku.form.hapus', ['buku' => $data['buku']])
        </div>
    </div>
@endsection
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
        document.getElementById('submitBtn').addEventListener('click', function() {
            document.getElementById('updateForm').submit();
        });
    </script>
@endpush
