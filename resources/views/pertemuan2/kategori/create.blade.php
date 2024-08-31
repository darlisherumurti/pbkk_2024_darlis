@extends('layout.base')

@section('title', 'Tambah Kategori')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('crud-kategori.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama kategori</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                        value="{{ old('nama') }}" required>
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Tambah Kategori</button>
                <a href="{{ route('crud-kategori.index') }}" class="btn btn-warning">Kembali</a><a href="#"></a>
            </form>
        </div>
    </div>
@endsection
