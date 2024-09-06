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
    <div class="card">
        <div class="card-header">
            <div class="card-title">Detail Buku</div>
        </div>
        <div class="card-body">
            <div class="row">

                <?php
                $buku = $data['pinjaman']->buku;
                ?>

                <div class="col-4">
                    <a href="{{ $buku->image_url }}" data-lightbox="book-image" data-title="{{ $buku->judul }}">
                        <img id="imagePreview" src="{{ $buku->image_url }}" alt="Image Preview" class="img-fluid">
                    </a>
                </div>
                <div class="col-8">
                    <h3 class=""><b>{{ $buku->judul }}</b></h3>
                    <p class="card-text">Deskripsi : {{ $buku->deskripsi }}</p>
                    <p class="card-text">Penulis : {{ $buku->penulis }}</p>
                    <p class="card-text">Penerbit : {{ $buku->penerbit }}</p>
                    <p class="card-text">Tahun Terbit : {{ $buku->tahun_terbit }}</p>
                    <p class="card-text">Jumlah Halaman : {{ $buku->jumlah_halaman }}</p>
                    <div>Kategori :
                        @foreach ($buku->kategoris as $kategoris)
                            <span class="badge bg-primary">{{ $kategoris->nama }}</span>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
@endpush
