@extends('layout.base')
@section('title', 'Pinjaman Saya')

@section('content')
    <div class="card">
        <div class="card-header">
            {{-- <div class="d-flex mb-3">
                <button onclick="window.history.back()" class="btn btn-primary mr-2">Kembali</button>
                {{ $data['pinjaman']->appends(['search' => request()->get('search'), 'limit' => request()->get('limit')])->links() }}
                <div class="ml-auto">showing {{ $data['pinjaman']->firstItem() }} to {{ $data['pinjaman']->lastItem() }}
                    of
                    {{ $data['pinjaman']->total() }} entries</div>
            </div>
            <div class="w-100 ">
                <form action="{{ route('pinjaman.peminjaman') }}" class="w-100" method="GET" class="form-inline">
                    <div class="row gap-2 ">
                        <div class="col col-12 col-md-6 ">
                            <div class="input-group  flex-grow-1">
                                <input type="text" name="search" class="form-control" id="search"
                                    placeholder="id, judul buku, nama user, status, tanggal, alamat, keterangan etc."
                                    value="{{ request()->get('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                        </div>
                        <div class="col mt-2 mt-md-0 col-4 col-md-2">
                            <div class="form-group ">
                                <select name="status_pengembalian" id="status_pengembalian" class="form-control">
                                    <option value="">Status Pengembalian</option>
                                    <option value="Sudah dikembalikan" @if (request()->get('status_pengembalian') == 'Sudah dikembalikan') selected @endif>
                                        Sudah dikembalikan
                                    </option>
                                    <option value="Belum dikembalikan" @if (request()->get('status_pengembalian') == 'Belum dikembalikan') selected @endif>
                                        Belum dikembalikan
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col mt-2 mt-md-0 col-4 col-md-2">
                            <div class="form-group ">
                                <select name="status_persetujuan" id="status_persetujuan" class="form-control">
                                    <option value="">Status Persetujuan</option>
                                    <option value="Menunggu Persetujuan" @if (request()->get('status_persetujuan') == 'Menunggu Persetujuan') selected @endif>
                                        Menunggu Persetujuan
                                    </option>
                                    <option value="Disetujui" @if (request()->get('status_persetujuan') == 'Disetujui') selected @endif>
                                        Disetujui
                                    </option>
                                    <option value="Ditolak" @if (request()->get('status_persetujuan') == 'Ditolak') selected @endif>
                                        Ditolak
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col mt-2 mt-md-0 col-4 col-md-2">
                            <div class="form-group">
                                <select name="limit" id="limit" class="form-control">
                                    <option value="10" @if (request()->get('limit') == 10) selected @endif>10</option>
                                    <option value="30" @if (request()->get('limit') == 30 || !request()->get('limit')) selected @endif>30
                                    </option>
                                    <option value="50" @if (request()->get('limit') == 50) selected @endif>50</option>
                                    <option value="100" @if (request()->get('limit') == 100) selected @endif>100
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div> --}}
            @include('pertemuan3.pinjaman.partial.search', [
                'pinjaman' => $data['pinjaman'],
                'url' => route('pinjaman.me'),
            ])
        </div>
        <div class="card-body">
            @include('pertemuan3.pinjaman.table.list', ['pinjaman' => $data['pinjaman']])
        </div>
    </div>
@endsection
