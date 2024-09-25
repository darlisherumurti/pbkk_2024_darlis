<table id="kategoriTable" class="table table-bordered table-striped">
    <tr>
        <th>No</th>
        <th>ID</th>
        <th>Nama</th>
        <th>Jumlah Buku</th>
        @role('admin')
            <th>Aksi</th>
        @endrole
    </tr>
    @foreach ($kategori as $k)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $k->id }}</td>
            <td>
                <a href="{{ route('kategori.detail', $k->id) }}">
                    {{ $k->nama }}
                </a>
            </td>
            <td>{{ $k->bukus->count() }}</td>
            @role('admin')
                <td>
                    <div class="d-flex">

                        <a href="{{ route('kategori.edit', $k->id) }}">
                            <button class="btn btn-sm mr-2 btn-primary">Edit</button>

                        </a>

                        @include('pertemuan5.kategori.form.hapus', [
                            'kategori' => $k,
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
            $('#kategoriTable').DataTable({
                responsive: true
                paging: true,
                searching: true,
                ordering: true,
                // buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
            });
        });
    </script>
@endpush
