@extends('layout.base')

@section('title', 'Detail Buku')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label for="judul">Judul</label>
                <p id="judul">{{ $data['buku']->judul }}</p>
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
                        <p id="kategori">{{ $data['buku']->kategori }}</p>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <p id="deskripsi">{{ $data['buku']->deskripsi }}</p>
            </div>

            <a href="{{ route('crud-buku.index') }}" class="btn btn-primary">Kembali ke Daftar Buku</a>
            <a href="{{ route('crud-buku.edit', $data['buku']->id) }}" class="btn btn-warning">Edit Buku</a>
            <form class="border-0" action="{{ route('crud-buku.destroy', $data['buku']->id) }}" method="POST"
                style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Hapus Buku</button>
            </form>
        </div>
    </div>
@endsection
