@extends('layout.base')
@section('title', 'Pinjaman Saya')

@section('content')
    <div class="card">
        <div class="card-body">
            @include('pertemuan3.pinjaman.table.list', ['pinjaman' => $data['pinjaman']])
        </div>
    </div>
@endsection
