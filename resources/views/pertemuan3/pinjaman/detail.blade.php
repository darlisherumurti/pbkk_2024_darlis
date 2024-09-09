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
                        @include('pertemuan4.pinjaman.table.persetujuan', [
                            'status' => $data['pinjaman']->status_persetujuan,
                        ])
                    </td>
                </tr>
                <tr>
                    <th>Status Pengembalian</th>
                    <td>
                        @include('pertemuan4.pinjaman.table.pengembalian', [
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
            </table>
        </div>
        <div class="card-footer">
            <div class="d-flex">
                @if ($data['pinjaman']->status_persetujuan == 'Menunggu Persetujuan')
                    <form class="actionForm" action="{{ route('pinjaman.setujui', $data['pinjaman']->id) }}"
                        method="post">
                        @csrf
                        <button type="submit" class="btn mr-2 btn-success">Setujui</button>
                    </form>
                    <form class="actionForm" action="{{ route('pinjaman.tolak', $data['pinjaman']->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn mr-2 btn-danger">Tolak</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
    @include('pertemuan4.pinjaman.partial.buku', ['buku' => $data['pinjaman']->buku])
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.actionForm').forEach(form => {
                form.addEventListener('submit', function(event) {
                    event.preventDefault(); // Prevent the form from submitting immediately

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes!',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Submit the form
                            form.submit();
                        }
                    });
                });
            });
        })
    </script>
@endpush
