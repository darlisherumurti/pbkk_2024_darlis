@extends('layout.base')
@section('title', 'Detail Peminjaman')
@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
@endpush
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex">
                <button type="button" class="btn btn-primary mr-2" onclick="window.history.back()">Kembali</button>
                @role('admin|petugas')
                    <a href="{{ route('pinjaman.detail', $data['pinjaman']->id) }}" class="btn btn-warning mr-2">Lebih Lengkap</a>
                @endrole

            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID Peminjaman</th>
                    <td>{{ $data['pinjaman']->id }}</td>
                </tr>
                <tr>
                    <th>Buku</th>
                    <td> <a href="{{ route('buku.detail', $data['pinjaman']->buku->id) }}">
                            {{ $data['pinjaman']->buku->judul }}
                        </a>
                    </td>
                </tr>
                <tr>
                    <th>Status Persetujuan</th>
                    <td>
                        @include('pertemuan5.pinjaman.table.status_persetujuan', [
                            'status' => $data['pinjaman']->status_persetujuan,
                        ])
                    </td>
                </tr>
                <tr>
                    <th>Status Pengembalian</th>
                    <td>
                        @include('pertemuan5.pinjaman.table.status_pengembalian', [
                            'status' => $data['pinjaman']->status_pengembalian,
                        ])
                    </td>
                </tr>
                <tr>
                    <th>Tanggal Peminjaman</th>
                    <td>{{ $data['pinjaman']->tanggal_peminjaman }}</td>
                </tr>
                <tr>
                    <th>Tanggal Disetujui</th>
                    <td>{{ $data['pinjaman']->tanggal_disetujui ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Durasi Peminjaman</th>
                    <td>{{ $data['pinjaman']->durasi_peminjaman }} Hari</td>
                </tr>
                <tr>
                    <th>Tanggal Pengembalian</th>
                    <td>{{ $data['pinjaman']->tanggal_pengembalian }}</td>
                </tr>
                <tr>
                    <th>Tanggal Dikembalikan</th>
                    <td>{{ $data['pinjaman']->tanggal_dikembalikan ?? '-' }}</td>
                </tr>
                <tr>
            </table>
        </div>
    </div>
    @include('pertemuan5.pinjaman.partial.buku', ['buku' => $data['pinjaman']->buku])
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
@endpush
