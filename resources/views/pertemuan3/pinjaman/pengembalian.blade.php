@extends('layout.base')

@section('title', 'Manage Pengembalian')

@section('content')

    <div class="card">
        <div class="card-header">
            @include('pertemuan3.pinjaman.partial.search', [
                'pinjaman' => $data['pinjaman'],
                'url' => route('pinjaman.pengembalian'),
            ])
        </div>

        <div class="card-body">
            <div class="overflow-auto">

                @include('pertemuan3.pinjaman.table.pengembalian', ['pinjaman' => $data['pinjaman']])
            </div>
        </div>
    </div>

@endSection
