<table id="peminjamanTable" class="table table-bordered table-striped">
    <tr>
        <th>ID</th>
        <th>Buku</th>
        @if (!request()->is('pertemuan5/pinjaman/me'))
            <th>Username</th>
        @endif
        <th>Status Persetujuan</th>
        <th>Status Pengembalian</th>
        <th>Tanggal Peminjaman</th>
        <th>Tanggal Pengembalian</th>
        <th>Durasi Peminjaman</th>
        @role('admin|petugas')
            <th>
                Aksi
            </th>
        @endrole
    </tr>
    @foreach ($pinjaman as $p)
        <tr>
            <td>
                <a href="{{ route('pinjaman.show', $p->id) }}">{{ $p->id }}</a>
            </td>
            <td>
                <a href="{{ route('buku.show', $p->buku->id) }}">{{ Str::limit($p->buku->judul, 18, '...') }}</a>
            </td>
            @if (!request()->is('pertemuan5/pinjaman/me'))
                <td>{{ Str::limit($p->user->name, 16, '...') }}</td>
            @endif
            <td>
                @include('pertemuan5.pinjaman.table.status_persetujuan', [
                    'status' => $p->status_persetujuan,
                ])
            </td>
            <td>@include('pertemuan5.pinjaman.table.status_pengembalian', [
                'status' => $p->status_pengembalian,
            ])
            </td>
            <td>{{ $p->tanggal_peminjaman }}</td>
            <td>{{ $p->tanggal_pengembalian }}</td>
            <td>{{ $p->durasi_peminjaman }} Hari</td>
            @role('admin|petugas')
                <td>
                    <div class="d-flex">
                        <a class="btn btn-sm btn-primary mr-2" href="{{ route('pinjaman.detail', $p->id) }}">Detail</a>
                        @if ($p->status_persetujuan == 'Menunggu Persetujuan')
                            <form class="actionForm" action="{{ route('pinjaman.setujui', $p->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-sm mr-2 btn-success">Setujui</button>
                            </form>
                            <form class="actionForm" action="{{ route('pinjaman.tolak', $p->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-sm mr-2 btn-danger">Tolak</button>
                            </form>
                        @endif
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
@role('admin|petugas')
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.actionForm').forEach(form => {
                    form.addEventListener('submit', function(event) {
                        event.preventDefault(); // Prevent the form from submitting immediately

                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes!',
                            cancelButtonText: 'Cancel'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Submit the form
                                form.submit();
                            }
                        });
                    });
                });
            })
        </script>
    @endpush
@endrole
