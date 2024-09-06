@extends('layout.base')
@section('title', 'Jelajahi Buku')
@section('content')
    <div class="card">
        <div class="card-header">
            {{-- <div class="row">
                <div class="col">
                    {{ $data['buku']->links() }}
                </div>
                <div class="col-auto">
                    <p>showing {{ $data['buku']->firstItem() }} to {{ $data['buku']->lastItem() }} of
                        {{ $data['buku']->total() }}
                        entries</p>
                </div>
            </div> --}}
            <div class="row">
                <div class="col">
                    <div class="w-100 ">
                        <form action="{{ route('buku.index') }}" class="w-100" method="GET" class="form-inline mb-4">
                            <div class="row gap-2 ">
                                <div class="col col-12 col-md-6 ">
                                    <div class="input-group  flex-grow-1">
                                        <input type="text" name="search" class="form-control" id="search"
                                            placeholder="id, judul, penulis, penerbit, isbn, kategori, deskripsi etc."
                                            value="{{ request()->get('search') }}">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">Cari</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mt-2 mt-md-0 col-md-2">
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
                                <div class="col mt-2 mt-md-0 col-md-2">
                                    <div class="form-group">
                                        <select name="limit" id="limit" class="form-control">
                                            <option value="10" @if (request()->get('limit') == 10) selected @endif>10
                                            </option>
                                            <option value="25" @if (request()->get('limit') == 25) selected @endif>25
                                            </option>
                                            <option value="50" @if (request()->get('limit') == 50) selected @endif>50
                                            </option>
                                            <option value="100" @if (request()->get('limit') == 100) selected @endif>100
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col mt-2 mt-md-0 col-md-2">
                                    {{ $data['buku']->links() }}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row row-cols-lg-4 row-cols-md-2 row-cols-1">
                @foreach ($data['buku'] as $buku)
                    <div class="col">
                        <div class="card overflow-auto position-relative">
                            <img loading="lazy" src="{{ $buku->image_url }}" class="card-img-top" alt="{{ $buku->judul }}">
                            <div class="card-body">
                                <h5 class="card-title"><b>{{ $buku->judul }}</b></h5><br>
                            </div>
                            <div class="card-footer">
                                <div class="">
                                    <a href="{{ route('buku.show', $buku->id) }}">
                                        <button class="btn btn-primary">Lihat</button>
                                    </a>
                                    <a href="{{ route('pinjam.create', $buku->id) }}">
                                        <button class="btn btn-secondary">Pinjam</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="card-footer">
            {{ $data['buku']->links() }}
        </div>
    </div>
@endsection
