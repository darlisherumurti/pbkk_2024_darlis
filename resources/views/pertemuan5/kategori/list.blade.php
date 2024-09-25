@extends('layout.base')
@section('title', 'Manage kategori')
@section('content')
    <div class="card p-3">
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
                <a href="{{ route('kategori.create') }}" class="text-white">
                    <button class="btn btn-success mr-2">
                        Tambah Kategori
                    </button>
                </a>
            @endrole
            {{ $data['kategori']->appends(['search' => request()->get('search'), 'limit' => request()->get('limit')])->links() }}

        </div>
        <div class="w-100 ">
            <form action="{{ route('kategori.list') }}" class="w-100" method="GET" class="form-inline mb-4">
                <div class="row gap-2 ">
                    <div class="col col-12 col-md-8 ">
                        <div class="input-group  flex-grow-1">
                            <input type="text" name="search" class="form-control" id="search"
                                placeholder="nama kategori" value="{{ request()->get('search') }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </div>
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
        <div class="overflow-auto">
            @include('pertemuan5.kategori.table.manage', [
                'kategori' => $data['kategori'],
            ])
        </div>
        <div class="row">
            <div class="col-auto">
                {{ $data['kategori']->appends(['search' => request()->get('search'), 'limit' => request()->get('limit')])->links() }}
            </div>
            <div class="col-auto">
                <p>
                    showing {{ $data['kategori']->firstItem() }} to {{ $data['kategori']->lastItem() }} of
                    {{ $data['kategori']->total() }}
                    entries
                </p>
            </div>
        </div>
    </div>
@endsection
