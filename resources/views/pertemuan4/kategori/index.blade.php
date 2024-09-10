@extends('layout.base')
@section('title', 'Jelajahi Kategori')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row row-cols-lg-4 row-cols-md-2 row-cols-1">
                @foreach ($data['kategori'] as $kategori)
                    <div class="col">
                        <a href="{{ route('buku.index', ['kategori' => $kategori->id]) }}">
                            <div class="card">
                                <div class="card-body">

                                    <h1>{{ $kategori->nama }}</h1>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
