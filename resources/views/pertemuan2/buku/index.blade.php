@extends('layout.base')


@section('title', 'List Buku')

@section('content')
    <div class="card p-3 overflow-auto">
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
        <a href="{{ route('crud-buku.create') }}" class="text-white mb-2">
            <button class="btn btn-success">
                Tambah Buku
            </button>
        </a>
        <table id="bukuTable" class="table table-bordered">
            <thead>
                <tr>
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
                @foreach ($data['buku'] as $b)
                    <tr>
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
                            <a href="{{ route('crud-buku.edit', $b->id) }}" class="btn btn-primary btn-sm mr-2">Edit</a>
                            <form class="border-0" action="{{ route('crud-buku.destroy', $b->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
