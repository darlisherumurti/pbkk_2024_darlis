@extends('layout.base')

@section('title', 'Detail Kategori')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <p id="id">{{ $data['kategori']->id }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <p id="judul">{{ $data['kategori']->nama }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="count">Jumlah Buku</label>
                        <p id="judul">{{ count($data['kategori']->bukus) }}</p>
                    </div>
                </div>
            </div>

            <a href="{{ route('crud-kategori.index') }}" class="btn btn-primary">Kembali ke Daftar Kategori</a>
            <a href="{{ route('crud-kategori.edit', $data['kategori']->id) }}" class="btn btn-warning">Edit Kategori</a>
            <form class="border-0" action="{{ route('crud-kategori.destroy', $data['kategori']->id) }}" method="POST"
                style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Hapus
                    Kategori</button>
            </form>
        </div>
    </div>
@endsection
