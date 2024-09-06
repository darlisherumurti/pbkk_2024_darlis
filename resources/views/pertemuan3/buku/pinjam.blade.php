@extends('layout.base')
@section('title', 'Formulir Pengajuan Pinjaman')
@section('content')
    <div class="card">
        <div class="card-body">
            @include('pertemuan3.buku.form.pinjaman', ['buku' => $data['buku']])
        </div>
    </div>
@endsection
