@extends('layout.base')

@section('title', 'Manage Pengembalian')

@section('content')

    <div class="card">
        <div class="card-header">
            @include('pertemuan5.pinjaman.partial.search', [
                'pinjaman' => $data['pinjaman'],
                'url' => route('pinjaman.pengembalian'),
            ])
        </div>

        <div class="card-body">
            <div class="overflow-auto">

                @include('pertemuan5.pinjaman.table.pengembalian', ['pinjaman' => $data['pinjaman']])
            </div>
        </div>
    </div>

@endSection
