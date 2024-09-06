<table id="peminjamanTable" class="table table-bordered table-striped">
    <tr>
        <th>ID</th>
        <th>Buku</th>
        <th>Username</th>
        <th>Alamat</th>
        <th>Status Persetujuan</th>
        <th>Tanggal Peminjaman</th>
        <th>Durasi Peminjaman</th>
        <th>Tgl. Dikembalikan</th>
        <th>
            Aksi
        </th>
    </tr>
    @foreach ($pinjaman as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>
                <a href="{{ route('buku.show', $p->buku->id) }}">{{ Str::limit($p->buku->judul, 18, '...') }}</a>
            </td>
            <td>{{ Str::limit($p->user->name, 16, '...') }}</td>
            <td>{{ $p->alamat }}</td>
            <td>
                @include('pertemuan3.pinjaman.table.persetujuan', [
                    'status' => $p->status_persetujuan,
                ])
            </td>
            <td>{{ $p->tanggal_peminjaman }}</td>
            <td>{{ $p->durasi_peminjaman }} Hari</td>
            <td>{{ $p->tanggal_dikembalikan ?? '-' }}</td>
            <td>
                <div class="d-flex">
                    <a href="{{ route('pinjaman.detail', $p->id) }}" class="btn btn-sm mr-2 btn-primary">Detail</a>
                    @role('admin')
                        @if ($p->status_persetujuan == 'Menunggu Persetujuan')
                            <a href="{{ route('pinjaman.setujui', $p->id) }}">
                                <button class="btn btn-sm mr-2 btn-success">Setujui</button>
                            </a>
                            <a href="{{ route('pinjaman.tolak', $p->id) }}">
                                <button class="btn btn-sm mr-2 btn-danger">Tolak</button>
                            </a>
                        @endif
                    @endrole
                </div>
            </td>

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
            $('#peminjamanTable').DataTable({
                responsive: true
                paging: true,
                searching: true,
                ordering: true,
                // buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
            });
        });
    </script>
@endpush
