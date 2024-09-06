@extends('layout.base')

@section('title', 'Manage Peminjaman')

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="d-flex">
                <button type="button" class="btn btn-primary mr-2" onclick="window.history.back()">Kembali</button>
            </div>
        </div>

        <div class="card-body">
            <div class="overflow-auto">

                @include('pertemuan3.pinjaman.table.manage', ['pinjaman' => $data['pinjaman']])
            </div>
        </div>
    </div>

@endSection
