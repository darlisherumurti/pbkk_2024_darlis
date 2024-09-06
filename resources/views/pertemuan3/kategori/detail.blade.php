@extends('layout.base')

@section('title', 'Detail Kategori')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Detail</div>
        </div>
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
                        <label for="nama">Nama Kategori</label>
                        <p id="nama">{{ $data['kategori']->nama }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nama">Jumlah Buku</label>
                        <p id="nama">{{ $data['kategori']->bukus->count() }}</p>
                    </div>
                </div>

            </div>
            <button class="btn btn-primary" onclick="window.history.back()">Kembali</button>
            {{-- <a href="{{ route('kategori.list') }}" class="btn btn-primary">Kembali ke Daftar Kategori</a> --}}
            @role('admin')
                <a href="{{ route('kategori.edit', $data['kategori']->id) }}" class="btn btn-warning">Edit Kategori</a>
                @include('pertemuan3.kategori.form.hapus', ['kategori' => $data['kategori']])
            @endrole
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="card-title">Buku</div>
        </div>
        <div class="card-body">
            @include('pertemuan3.buku.table.manage', ['buku' => $data['kategori']->bukus])
        </div>
    </div>
@endsection
