@extends('layout.base')

@section('title', 'Detail Buku')

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
@endpush
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <p id="id">{{ $data['buku']->id }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <p id="judul">{{ $data['buku']->judul }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="image_url">Image URL</label>
                        <p id="image_url">{{ $data['buku']->image_url }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="image_preview">Image Preview</label>
                        <div id="imagePreviewContainer" class="border p-2" style="min-height: 200px;">
                            <a href="{{ $data['buku']->image_url }}" data-lightbox="book-image"
                                data-title="{{ $data['buku']->judul }}">
                                <img loading="lazy" id="imagePreview" src="{{ $data['buku']->image_url }}"
                                    alt="Image Preview" class="img-fluid" style="max-height: 180px;">
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="penulis">Penulis</label>
                        <p id="penulis">{{ $data['buku']->penulis }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="penerbit">Penerbit</label>
                        <p id="penerbit">{{ $data['buku']->penerbit }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tahun_terbit">Tahun Terbit</label>
                        <p id="tahun_terbit">{{ $data['buku']->tahun_terbit }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jumlah_halaman">Jumlah Halaman</label>
                        <p id="jumlah_halaman">{{ $data['buku']->jumlah_halaman }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="isbn">ISBN</label>
                        <p id="isbn">{{ $data['buku']->isbn }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <br>
                        @foreach ($data['buku']->kategoris as $k)
                            <span class="badge badge-primary">{{ $k->nama }}</span>
                            <!-- Adjust field name as needed -->
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <p id="deskripsi">{{ $data['buku']->deskripsi }}</p>
            </div>

            <button class="btn btn-primary" onclick="window.history.back()">Kembali</button>
            {{-- <a href="{{ route('buku.list') }}" class="btn btn-primary">Kembali ke Daftar Buku</a> --}}
            @role('admin')
                <a href="{{ route('buku.edit', $data['buku']->id) }}" class="btn btn-warning">Edit Buku</a>
                @include('pertemuan4.buku.form.hapus', ['buku' => $data['buku']])
            @endrole
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
@endpush
