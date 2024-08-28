@extends('layout.base')


@section('title', 'List Buku')

@section('content')
    <style>

    </style>
    <div class="card p-3">
        <div class="">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        <div class="d-flex flex-column flex-md-row gap-2 mb-md-0 mb-2">
            <form action="{{ route('crud-buku.index') }}" method="GET" class="mr-md-2 mr-0 mb-2 mb-md-0 flex-grow-1">
                <div class="input-group ">
                    <input type="text" name="search" class="form-control" id="search"
                        placeholder="id, judul, penulis, penerbit, isbn, kategori, deskripsi etc."
                        value="{{ request()->get('search') }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </div>
            </form>
            <div class="d-flex">
                {{ $data['buku']->appends(['search' => $search, 'limit' => $limit])->links() }}
                <div class="ml-2">
                    <a href="{{ route('crud-buku.create') }}" class="text-white">
                        <button class="btn btn-success">
                            Tambah Buku
                        </button>
                    </a>
                </div>
            </div>

        </div>
        <div class="overflow-auto">`
            <table id="bukuTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Jumlah Halaman</th>
                        <th>ISBN</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data['buku'] as $b)
                        <tr>
                            <td>
                                {{ $b->id }}
                            </td>
                            <td>
                                <a href="{{ route('crud-buku.show', $b->id) }}">
                                    {{ Str::limit($b->judul, 20, '...') }}
                                </a>
                            </td>
                            <td>{{ $b->penulis }}</td>
                            <td>{{ $b->penerbit }}</td>
                            <td>{{ $b->tahun_terbit }}</td>
                            <td>{{ $b->jumlah_halaman }}</td>
                            <td>{{ $b->isbn }}</td>
                            <td>{{ $b->kategori }}</td>
                            <td>{{ Str::limit($b->deskripsi, 30, '...') }}</td>
                            <td class="d-flex">
                                <a href="{{ route('crud-buku.edit', $b->id) }}"
                                    class="btn btn-primary btn-sm mr-2">Edit</a>
                                <form class="border-0" action="{{ route('crud-buku.destroy', $b->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No records found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#bukuTable').DataTable({
                paging: true,
                searching: true,
                ordering: true
            });
        });
    </script>
@endsection
