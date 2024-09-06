@extends('layout.base')
@section('title', 'Detail Buku')
@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
@endpush
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex">
                <a href="{{ route('buku.index') }}" class="btn btn-primary mr-2">Kembali</a>
                @role('admin|petugas')
                    <a href="{{ route('buku.detail', $data['buku']->id) }}" class="btn btn-warning mr-2">Lebih Lengkap</a>
                @endrole
                {{-- @role('pengunjung') --}}
                <a href="{{ route('buku.pinjam.show', $data['buku']->id) }}">
                    <div class="btn btn-success mr-2">Ajukan Pinjaman</div>
                </a>
                {{-- @endrole --}}
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <a href="{{ $data['buku']->image_url }}" data-lightbox="book-image"
                        data-title="{{ $data['buku']->judul }}">
                        <img id="imagePreview" src="{{ $data['buku']->image_url }}" alt="Image Preview" class="img-fluid">
                    </a>
                </div>
                <div class="col-8">
                    <h3 class=""><b>{{ $data['buku']->judul }}</b></h3>
                    <p class="card-text">Deskripsi : {{ $data['buku']->deskripsi }}</p>
                    <p class="card-text">Penulis : {{ $data['buku']->penulis }}</p>
                    <p class="card-text">Penerbit : {{ $data['buku']->penerbit }}</p>
                    <p class="card-text">Tahun Terbit : {{ $data['buku']->tahun_terbit }}</p>
                    <div>Kategori :
                        @foreach ($data['buku']->kategoris as $kategoris)
                            <span class="badge bg-primary">{{ $kategoris->nama }}</span>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
@endpush
