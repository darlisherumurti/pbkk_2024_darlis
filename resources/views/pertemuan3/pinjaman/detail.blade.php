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
                @if ($data['pinjaman']->status_persetujuan == 'Menunggu Persetujuan')
                    <div class="dropdown">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
                            -- Butuh Tindakan --</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Setujui</a>
                            <a class="dropdown-item" href="#">Tolak</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID Peminjaman</th>
                    <td>{{ $data['pinjaman']->id }}</td>
                </tr>
                <tr>
                    <th>Username</th>
                    <td>{{ $data['pinjaman']->user->name }}</td>
                </tr>
                <tr>
                    <th>Nama Lengkap</th>
                    <td>{{ $data['pinjaman']->nama_lengkap }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $data['pinjaman']->alamat }}</td>
                </tr>
                <tr>
                    <th>Keterangan</th>
                    <td>{{ $data['pinjaman']->keterangan }}</td>
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
                        @include('pertemuan3.pinjaman.table.persetujuan', [
                            'status' => $data['pinjaman']->status_persetujuan,
                        ])
                    </td>
                </tr>
                <tr>
                    <th>Status Pengembalian</th>
                    <td>
                        @include('pertemuan3.pinjaman.table.pengembalian', [
                            'status' => $data['pinjaman']->status_pengembalian,
                        ])
                    </td>
                </tr>
                <tr>
                    <th>Tanggal Peminjaman</th>
                    <td>{{ $data['pinjaman']->tanggal_peminjaman }}</td>
                </tr>
                <tr>
                    <th>Tanggal Pengembalian</th>
                    <td>{{ $data['pinjaman']->tanggal_pengembalian }}</td>
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
            </table>
        </div>
    </div>
    @include('pertemuan3.pinjaman.partial.buku', ['buku' => $data['pinjaman']->buku])
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
@endpush
