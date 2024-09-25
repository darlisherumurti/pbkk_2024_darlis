@extends('layout.base')

@section('title', 'Manage Persetujuan')

@section('content')

    <div class="card">
        <div class="card-header">
            @include('pertemuan5.pinjaman.partial.search', [
                'pinjaman' => $data['pinjaman'],
                'url' => route('pinjaman.persetujuan'),
            ])
        </div>
        <div class="card-body">
            <div class="overflow-auto">
                @include('pertemuan5.pinjaman.table.persetujuan', ['pinjaman' => $data['pinjaman']])
            </div>
        </div>
    </div>

@endSection
