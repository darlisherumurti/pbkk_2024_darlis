@extends('layout.base')

@section('title', 'Edit Buku')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('crud-buku.update', $data['buku']->id) }}" method="POST">
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
                            <input type="text" class="form-control @error('kategori') is-invalid @enderror"
                                id="kategori" name="kategori" value="{{ old('kategori', $data['buku']->kategori) }}">
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
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi', $data['buku']->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update Buku</button>
                <a href="{{ route('crud-buku.index') }}" class="btn btn-warning">Kembali ke Daftar Buku</a>
                <a href="{{ route('crud-buku.show', $data['buku']->id) }}" class="btn btn-warning">
                    Kembali ke Detail Buku</a>
                <form class="border-0" action="{{ route('crud-buku.destroy', $data['buku']->id) }}" method="POST"
                    style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Hapus
                        Buku</button>
                </form>
            </form>
        </div>
    </div>
@endsection
