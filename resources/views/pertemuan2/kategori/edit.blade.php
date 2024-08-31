@extends('layout.base')

@section('title', 'Edit Kategori')

@section('content')
    <div class="card">
        <div class="card-body">
            <form id="updateForm" action="{{ route('crud-kategori.update', $data['kategori']->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Menandakan bahwa ini adalah request untuk update -->

                <div class="form-group">
                    <label for="judul">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                        name="nama" value="{{ old('nama', $data['kategori']->nama) }}" required>
                    @error('judul')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </form>
            <button id="submitBtn" type="submit" class="btn btn-primary">Update Kategori</button>
            <a href="{{ route('crud-kategori.index') }}" class="btn btn-warning">Kembali ke Daftar Kategori</a>
            <a href="{{ route('crud-kategori.show', $data['kategori']->id) }}" class="btn btn-warning">
                Kembali ke Detail Kategori</a>
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
@push('scripts')
    <script>
        document.getElementById('submitBtn').addEventListener('click', function() {
            document.getElementById('updateForm').submit();
        });
    </script>
@endpush
