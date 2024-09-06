@extends('layout.base')
@section('title', 'Jelajahi Buku')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    {{ $data['buku']->links() }}
                </div>
                <div class="col-auto">
                    <p>showing {{ $data['buku']->firstItem() }} to {{ $data['buku']->lastItem() }} of
                        {{ $data['buku']->total() }}
                        entries</p>
                </div>
            </div>

        </div>
        <div class="card-body">
            <div class="row row-cols-lg-4 row-cols-md-2 row-cols-1">
                @foreach ($data['buku'] as $buku)
                    <div class="col">
                        <div class="card overflow-auto position-relative">
                            <img src="{{ $buku->image_url }}" class="card-img-top" alt="{{ $buku->judul }}">
                            <div class="card-body">
                                <h5 class="card-title"><b>{{ $buku->judul }}</b></h5><br>
                            </div>
                            <div class="card-footer">
                                <div class="">
                                    <a href="{{ route('buku.show', $buku->id) }}">
                                        <button class="btn btn-primary">Lihat</button>
                                    </a>
                                    <a href="{{ route('buku.pinjam.show', $buku->id) }}">
                                        <button class="btn btn-secondary">Pinjam</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
