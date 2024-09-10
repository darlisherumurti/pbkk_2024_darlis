@extends('layout.base')

@section('title', 'Edit Buku')
@section('content')
    <div class="card">
        <div class="card-body">
            @include('pertemuan4.buku.form.edit', ['buku' => $data['buku'], 'buku_kategori' => $data['buku-kategori'], 'kategori' => $data['kategori']])
        </div>
    </div>
@endsection
