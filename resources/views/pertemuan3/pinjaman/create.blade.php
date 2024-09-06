@extends('layout.base')
@section('title', 'Formulir Pengajuan Pinjaman')
@section('content')
    <div class="card">
        <div class="card-body">
            @include('pertemuan3.pinjaman.form.create', ['buku' => $data['buku']])
        </div>
    </div>
@endsection
