<table id="bukuTable" class="table table-bordered table-striped">
    <tr>
        <th>No</th>
        <th>ID</th>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Penerbit</th>
        <th>Tahun</th>
        <th>Kategori</th>
        @role('admin')
            <th>Aksi</th>
        @endrole
    </tr>
    @foreach ($buku as $b)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $b->id }}</td>
            <td>
                <a href="{{ route('buku.detail', $b->id) }}">{{ $b->judul }}</a>
            </td>
            <td>{{ $b->penulis }}</td>
            <td>{{ $b->penerbit }}</td>
            <td>{{ $b->tahun_terbit }}</td>
            <td>
                @foreach ($b->kategoris as $k)
                    <span class="badge bg-primary">{{ $k->nama }}</span>
                @endforeach
            </td>
            @role('admin')
                <td>
                    <div class="d-flex">

                        <a href="{{ route('buku.edit', $b->id) }}">
                            <button class="btn btn-sm mr-2 btn-primary">Edit</button>

                        </a>
                        @include('pertemuan3.buku.form.hapus', [
                            'buku' => $b,
                            'class' => 'btn-sm',
                            'text' => 'Hapus',
                        ])

                    </div>
                </td>
            @endrole
        </tr>
    @endforeach
</table>

{{-- scripts --}}
@push('scripts')
    <script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/adminlte/plugins/jszip/jszip.min.js"></script>
    <script src="/adminlte/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/adminlte/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
@endpush
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#bukuTable').DataTable({
                responsive: true
                paging: true,
                searching: true,
                ordering: true,
                // buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
            });
        });
    </script>
@endpush
