@extends('layout.base')
@section('title', 'Manage Buku')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="w-100">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
            <div class="d-flex mb-3">
                <button onclick="window.history.back()" class="btn btn-primary mr-2">Kembali</button>
                @role('admin')
                    <a href="{{ route('buku.create') }}" class="text-white">
                        <button class="btn btn-success mr-2">
                            Tambah Buku
                        </button>
                    </a>
                @endrole
                {{ $data['buku']->appends(['search' => request()->get('search'), 'limit' => request()->get('limit')])->links() }}
            </div>
            <div class="w-100 ">
                <form action="{{ route('buku.list') }}" class="w-100" method="GET" class="form-inline">
                    <div class="row gap-2 ">
                        <div class="col col-12 col-md-8 ">
                            <div class="input-group  flex-grow-1">
                                <input type="text" name="search" class="form-control" id="search"
                                    placeholder="id, judul, penulis, penerbit, isbn, kategori, deskripsi etc."
                                    value="{{ request()->get('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                        </div>
                        <div class="col mt-2 mt-md-0 col-4 col-md-2">
                            <div class="form-group ">
                                <select name="kategori" id="kategori" class="form-control">
                                    <option value="">-- Semua Kategori --</option>
                                    @foreach ($data['kategori'] as $kategori)
                                        <option value="{{ $kategori->id }}"
                                            @if (request()->get('kategori') == $kategori->id) selected @endif>
                                            {{ $kategori->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col mt-2 mt-md-0 col-4 col-md-2">
                            <div class="form-group">
                                <select name="limit" id="limit" class="form-control">
                                    <option value="10" @if (request()->get('limit') == 10) selected @endif>10</option>
                                    <option value="25" @if (request()->get('limit') == 25) selected @endif>25</option>
                                    <option value="50" @if (request()->get('limit') == 50) selected @endif>50</option>
                                    <option value="100" @if (request()->get('limit') == 100) selected @endif>100</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card-body overflow-auto">
            @include('pertemuan4.buku.table.manage', [
                'buku' => $data['buku'],
            ])
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-auto">
                    {{ $data['buku']->appends(['search' => request()->get('search'), 'limit' => request()->get('limit')])->links() }}

                </div>
                <div class="col-auto">
                    <p>
                        showing {{ $data['buku']->firstItem() }} to {{ $data['buku']->lastItem() }} of
                        {{ $data['buku']->total() }}
                        entries
                    </p>
                </div>
            </div>
        </div>


    </div>
@endsection
